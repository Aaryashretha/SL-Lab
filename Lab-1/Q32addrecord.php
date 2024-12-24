<?php
require_once 'Q32function.php';

$err = [];
session_start();
if (!isset($_SESSION['name'])) {
    header('location:Q32login.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Name Validation
    if (checkRequiredField('name')) {
        $name = trim($_POST['name']);
    } else {
        $err['name'] = 'Enter name';
    }

    // Rank Validation
    if (checkRequiredField('rank')) {
        $rank = trim($_POST['rank']);
    } else {
        $err['rank'] = 'Enter rank';
    }

    // Status Validation
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $err['status'] = 'Select status';
    }

    // Image Validation
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageSize = $_FILES['image']['size'];
        $imageType = mime_content_type($imageTmpPath);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($imageType, $allowedTypes) && $imageSize <= 2 * 1024 * 1024) { // Max 2MB
            $image = 'uploads/' . $imageName;
            if (!move_uploaded_file($imageTmpPath, $image)) {
                $err['image'] = 'Failed to upload image';
            }
        } else {
            $err['image'] = 'Invalid image type or size exceeds 2MB';
        }
    } else {
        $err['image'] = 'Upload an image';
    }

    // If no errors, add record
    if (count($err) == 0) {
        if (addCategory($name, $rank, $image, $status)) {
            $err['success'] = 'Category added successfully';
        } else {
            $err['failed'] = 'Category addition failed';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <style>
        .form-group {
            border-bottom: 1px solid green;
            padding: 10px;
        }
        .form-group label {
            display: inline-block;
            width: 100px;
        }
        .form-group input {
            width: 60%;
        }
        .form-group input[type=radio] {
            width: 5%;
        }
        .form-group input[type=submit] {
            width: 75px;
            height: 25px;
            border: none;
            background: #3366aa;
            color: white;
        }
        .error {
            color: red;
            border-bottom: 1px red dashed;
        }
        .success {
            color: green;
            border-bottom: 1px green dashed;
        }
    </style>
</head>
<body>
    <h1>Add Category</h1>
    <?php echo displayErrorMessage($err, 'failed'); ?>
    <?php echo displaySuccessMessage($err, 'success'); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Category Information</legend>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
                <?php echo displayErrorMessage($err, 'name'); ?>
            </div>
            <div class="form-group">
                <label for="rank">Rank</label>
                <input type="number" name="rank" class="form-control">
                <?php echo displayErrorMessage($err, 'rank'); ?>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="radio" name="status" value="1" class="form-control">Active
                <input type="radio" name="status" value="0" class="form-control" checked>De-Active
                <?php echo displayErrorMessage($err, 'status'); ?>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                <?php echo displayErrorMessage($err, 'image'); ?>
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="Save " class="form-control">
            </div>
        </fieldset>
    </form>
</body>
</html>
