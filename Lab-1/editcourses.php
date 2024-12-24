<?php
require_once 'function.php';
$err = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['edtid'];
    if (checkRequiredField('title')) {
        $title = $_POST['title'];
    } else {
        $err['title'] = 'Enter title';
    }

    if (checkRequiredField('duration')) {
        $duration = $_POST['duration'];
    } else {
        $err['duration'] = 'Enter duration';
    }

    $status = $_POST['status'];

    if (count($err) == 0) {
        if (updateCategory($id,$title,$duration,$status)) {
              $err['success'] =  'Category update success';
        } else {
              $err['failed'] = 'Category updated Failed';
        }
      }
}

if (isset($_GET['edtid']) && is_numeric($_GET['edtid'])) {
    $record = getBookCategoryById($_GET['edtid']);
    if (!$record) {
        die('Category not found');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
        <legend>Edit Category Information</legend>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $record['title'] ?>">
            <?php  echo displayErrorMessage($err,'title')?>
        </div>
        <div class="form-group">
            <label for="duration">duration</label>
            <input type="number" name="duration" class="form-control" value="<?php echo $record['duration'] ?>">
            <?php  echo displayErrorMessage($err,'duration')?>
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
            <input type="submit" name="save" value="Update Category" class="form-control">
        </div>
    </fieldset>
 </form>
</body>
</html>