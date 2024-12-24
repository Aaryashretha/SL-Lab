<?php
require_once 'function.php';

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Name Validation
    if (checkRequiredField('name')) {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'Enter name';
    }
    // Course Validation
    if (checkRequiredField('course_id')) {
        $course_id = $_POST['course_id'];
    } else {
        $err['course_id'] = 'Please select a course';
    }
    // Fee Validation
    if (checkRequiredField('fee')) {
        $fee = ($_POST['fee']);
        if (!is_numeric($fee) || $fee < 0) {
            $err['fee'] = 'Enter valid fee amount';
        }
    } else {
        $err['fee'] = 'Enter fee amount';
    }

    // Roll Number Validation
    if (checkRequiredField('rollno')) {
        $rollno = $_POST['rollno'];
    } else {
        $err['rollno'] = 'Enter roll number';
    }

    // Phone Validation
    if (checkRequiredField('phone')) {
        $phone = $_POST['phone'];
        if (strlen($phone) != 10 || !is_numeric($phone)) {
            $err['phone'] = 'Enter valid 10-digit phone number';
        }
    } else {
        $err['phone'] = 'Enter phone number';
    }

    // Address Validation (optional field)
    $address = isset($_POST['address']) ?trim($_POST['address']) : '';

    // Date of Birth Validation
    if (checkRequiredField('dob')) {
        $dob = ($_POST['dob']);
        if (!strtotime($dob)) {
            $err['dob'] = 'Enter valid date of birth';
        }
    } else {
        $err['dob'] = 'Enter date of birth';
    }


    // Status Validation
    $status =$_POST['status'];

  // If no errors, add record
    if (count($err) == 0) {
        if (addStudent($name, $course_id, $fee, $rollno, $phone, $address, $dob, $status)) {
            $err['success'] = 'Student added successfully';
        } else {
            $err['failed'] = 'Student addition failed';
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
                <label for="course_id">Select Course</label>
                <select name="course_id" class="form-control">
                    <option value="">--Select Course--</option>
                    <?php
                    $courses = getAllCourses(); // You'll need to create this function in function.php
                    if($courses){
                        foreach($courses as $course){
                            echo "<option value='".$course['id']."'>".$course['id']."</option>";
                        }
                    }
                    ?>
                </select>
                <?php echo displayErrorMessage($err, 'course_id'); ?>
            </div>

            <div class="form-group">
                <label for="fee">Fee Amount</label>
                <input type="number" step="0.01" name="fee" class="form-control">
                <?php echo displayErrorMessage($err, 'fee'); ?>
            </div>

            <div class="form-group">
                <label for="rollno">Roll Number</label>
                <input type="number" name="rollno" class="form-control">
                <?php echo displayErrorMessage($err, 'rollno'); ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" maxlength="10" class="form-control">
                <?php echo displayErrorMessage($err, 'phone'); ?>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" class="form-control">
                <?php echo displayErrorMessage($err, 'dob'); ?>
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
