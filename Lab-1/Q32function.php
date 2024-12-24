<?php
date_default_timezone_set('Asia/Kathmandu');
function checkRequiredField($index){
    if (isset($_POST[$index]) && !empty($_POST[$index]) && trim($_POST[$index])) {
        return true;
    } else {
        return false;
    }
}

function displayErrorMessage($error,$index){
    if (array_key_exists($index,$error)) {
        return "<span class='error'>" . $error[$index] . " </span>";
    }
    return false;
}

function matchPattern($var,$pattern){
    if (preg_match($pattern,$var)) {
        return true;
    }
    return false;
}

function validateEmail($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function displaySuccessMessage($error,$index){
    if (array_key_exists($index,$error)) {
        return "<span class='success'>" . $error[$index] . " </span>";
    }
    return false;
}
function addCategory($n,$r,$i,$s){
    try {
        $cby= $_SESSION['name'];
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "insert into record( name, rank, image,  status, created_by, created_at) values ('$n',$r,'$i',$s,'$cby','$cdate')";
        $connect->query($sql);
        if ($connect->insert_id > 0 && $connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}
function getAllBookCategory(){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "select * from record";
        $result = $connect->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            //fetch data
            while ($record= $result->fetch_assoc()) {
                array_push($data,$record);
            }
        }
        return $data;
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}

function getBookCategoryById($id){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "select * from record where id=$id";
        $result = $connect->query($sql);
        if ($result->num_rows == 1) {
            $record= $result->fetch_assoc();
            return $record;
        }
        return false;
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}


function deleteCategory($id){
    try {
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "delete from record where id=$id";
        $connect->query($sql);
        if ($connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}

function updateCategory($i,$n,$r,$s){
    try {
        $uby = $_SESSION['name'];
        $ud = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "update record set name='$n',rank='$r',status='$s',updated_by='$uby',updated_at='$ud' where id=$i";
        $connect->query($sql);
        if ($connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}

function printStatus($s)  {
    if ($s == 1) {
        return 'Active';
    } else {
        return 'DeActive';
    }
}