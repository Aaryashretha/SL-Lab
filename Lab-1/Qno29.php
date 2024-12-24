<?php
// Initialize variables
$error = [];
$success = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file is uploaded
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        // File properties
        $file_name = $_FILES['cv']['name'];
        $file_tmp = $_FILES['cv']['tmp_name'];
        $file_size = $_FILES['cv']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed_extensions = ['pdf', 'doc', 'docx'];

        // Validate file type
        if (!in_array($file_ext, $allowed_extensions)) {
            $error[] = "Invalid file type";
        }

        // Validate file size (1 MB = 1048576 bytes)
        if ($file_size > 1048576) {
            $error[] = "File size must be less than 1 MB.";
        }

        // Process the upload if no errors
        if (empty($error)) {
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true); // Create directory if not exists
            }
            $upload_path = $upload_dir . basename($file_name);

            if (move_uploaded_file($file_tmp, $upload_path)) {
                $success = "File uploaded successfully! Path: $upload_path";
            } else {
                $error[] = "Failed to upload the file.";
            }
        }
    } else {
        $error[] = "Please select a file to upload.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="file"] {
            padding: 5px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Upload Your CV</h1>
    <?php
    if (!empty($error)) {
        echo '<div class="error"><ul>';
        foreach ($error as $err) {
            echo "<li>$err</li>";
        }
        echo '</ul></div>';
    }
    if (!empty($success)) {
        echo "<div class='success'>$success</div>";
    }
    ?>
    <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="cv">Upload CV :</label>
            <input type="file" name="cv" id="cv">
        </div>
        <div class="form-group">
            <input type="submit" value="Upload CV">
        </div>
    </form>
</body>
</html>
