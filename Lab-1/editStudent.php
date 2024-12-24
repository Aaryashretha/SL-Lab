<?php
require_once 'function.php';
$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_id = $_GET['edtid'];
    if (checkRequiredField('file_name')) {
        $file_name = $_POST['file_name'];
    } else {
        $err['file_name'] = 'Enter file_name';
    }

    if (checkRequiredField('file_description')) {
        $file_description = $_POST['file_description'];
    } else {
        $err['file_description'] = 'Enter course';
    }

    if (checkRequiredField('file')) {
        $file = $_POST['file'];
    } else {
        $err['file'] = 'Enter file';
    }

   
    if (count($err) == 0) {
        if (updateNotes($id, $file_name, $file_description, $file)) {
            $err['success'] = 'Notes update success';
        } else {
            $err['failed'] = 'Notes update failed';
        }
    }
}

if (isset($_GET['edtid']) && is_numeric($_GET['edtid'])) {
    $record = getNotesById($_GET['edtid']);
    if (!$record) {
        die('Notes not found');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        .form-group{
            border-bottom: 1px solid green;
            padding:10px;
        }
        .form-group label{
            display:inline-block;
            width:100px;
        }
        .form-group input{
            width: 60%;
        } 
        .form-group input[type=radio]{
            width: 5%;
        }

        .form-group input[type=submit]{
            width:125px;
            height:25px;
            border:none;
            background:#3366aa;
            color:white;
        }
        .error{
            color:red;
            border-bottom: 1px red dashed;
        }
        .success{
            color:green;
            border-bottom: 1px green dashed;
        }
    </style>
</head>
<body>
   
 <?php  echo displayErrorMessage($err,'failed')?>
 <?php  echo displaySuccessMessage($err,'success')?>
 <form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Edit Student Information</legend>
        <div class="form-group">
            <label for="file_name">file_name</label>
            <input type="text" name="file_name" class="form-control" value="<?php echo $record['file_name'] ?>">
            <?php  echo displayErrorMessage($err,'name')?>
        </div>
        <div class="form-group">
            <label for="course_id">Course</label>
            <input type="number" name="course_id" class="form-control" value="<?php echo $record['course_id'] ?>">
            <?php  echo displayErrorMessage($err,'course_id')?>
        </div>
        <div class="form-group">
            <label for="fee">Fee</label>
            <input type="number" name="fee" class="form-control" value="<?php echo $record['fee'] ?>">
            <?php  echo displayErrorMessage($err,'fee')?>
        </div>
        <div class="form-group">
            <label for="rollno">Roll No</label>
            <input type="text" name="rollno" class="form-control" value="<?php echo $record['rollno'] ?>">
            <?php  echo displayErrorMessage($err,'rollno')?>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $record['phone'] ?>">
            <?php  echo displayErrorMessage($err,'phone')?>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $record['address'] ?>">
            <?php  echo displayErrorMessage($err,'address')?>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="<?php echo $record['dob'] ?>">
            <?php  echo displayErrorMessage($err,'dob')?>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <?php if ($record['status'] == 1) { ?>
                <input type="radio" name="status" value="1" class="form-control" checked>Active
                <input type="radio" name="status" value="0" class="form-control" >De-Active
            <?php } else { ?>
                <input type="radio" name="status" value="1" class="form-control">Active
                <input type="radio" name="status" value="0" class="form-control" checked>De-Active
            <?php } ?>
            <?php  echo displayErrorMessage($err,'status')?>
        </div>
        <div class="form-group">
            <input type="submit" name="save" value="Update Student" class="form-control">
        </div>
    </fieldset>
 </form>
</body>
</html>