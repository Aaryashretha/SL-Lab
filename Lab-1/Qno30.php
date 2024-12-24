<?php
// Initialize variables for error and success messages
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file is uploaded
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['profile_image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = mime_content_type($fileTmpName);
        $allowedTypes = ['image/png', 'image/jpeg'];

        // Check file type
        if (!in_array($fileType, $allowedTypes)) {
            $error = 'Invalid file type';
        }
        // Check file size (less than 500 KB)
        elseif ($fileSize > 500 * 1024) {
            $error = 'File size exceeds 500 KB.';
        } else {
            // Set upload directory
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
            }

            // Generate a unique file name to avoid overwriting
            $newFileName = uniqid('profile_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = $uploadDir . $newFileName;

            // Move uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $success = 'Profile image uploaded successfully!';
            } else {
                $error = 'Error uploading ';
            }
        }
    } else {
        $error = 'No file uploaded ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Image</title>
    <style>
       
        form {
            margin-top: 50px;
            display: inline-block;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            display: block;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
       }
        .message {
            font-size: 14px;
            margin-top: 10px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Upload Profile Image</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="profile_image"> Image:</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>
        <div class="form-group">
            <input type="submit" name="upload" value="Upload">
        </div>
        <div class="message">
            <?php
            if (!empty($error)) {
                echo "<p class='error'>$error</p>";
            } elseif (!empty($success)) {
                echo "<p class='success'>$success</p>";
            }
            ?>
        </div>
    </form>
</body>
</html>
