<?php
require_once 'function.php';

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Name Validation
    if (checkRequiredField('title')) {
        $title = trim($_POST['title']);
    } else {
        $err['title'] = 'Enter title';
    }

    // Rank Validation
    if (checkRequiredField('duration')) {
        $duration = trim($_POST['duration']);
    } else {
        $err['duration'] = 'Enter duration';
    }

    // Status Validation
    $status =$_POST['status'];

    // If no errors, add record
    if (count($err) == 0) {
        if (addCategory($title, $duration, $status)) {
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
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                <?php echo displayErrorMessage($err, 'title'); ?>
            </div>
            <div class="form-group">
                <label for="duration">duration</label>
                <input type="number" name="duration" class="form-control">
                <?php echo displayErrorMessage($err, 'duration'); ?>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="radio" name="status" value="1"> Active
                <input type="radio" name="status" value="0" checked> Inactive
            </div>

            <div class="form-group">
                <input type="submit" name="save" value="Save " class="form-control">
            </div>
        </fieldset>
    </form>
</body>
</html>
