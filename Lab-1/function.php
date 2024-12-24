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
function addCategory($t,$d,$s){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "insert into courses( title, duration,  status, created_at) values ('$t',$d,$s,'$cdate')";
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
        $sql = "select * from courses";
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
        $sql = "select * from courses where id=$id";
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
function getStudentById($id){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "select * from students where id=$id";
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
function getAllCourses() {
    $connect = new mysqli('localhost','root','','aarya_20');
    $sql = "SELECT id FROM courses WHERE status = 1";
    $result = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return false;
}
function getAllStudents() {
    $connect = new mysqli('localhost','root','','aarya_20');
    $sql = "SELECT * FROM students WHERE status = 1";
    $result = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return false;
}


function deleteCategory($id){
    try {
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "delete from courses where id=$id";
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

function deleteStudent($id){
    try {
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "delete from students where id=$id";
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

function updateCategory($i,$t,$d,$s){
    try {
        $ud = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "update courses set title='$t',duration='$d',status='$s',updated_at='$ud' where id=$i";
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
function updateStudent($i,$n,$c,$f,$r,$p,$a,$d,$s){
    try {
        $ud = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','aarya_20');
        $sql = "update students set name='$n',course_id='$c',fee='$f',rollno='$r',phone='$p',address='$a',dob='$d',status='$s',updated_at='$ud' where id=$i";
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
function checkLogin(){
    session_start();
    if (!isset($_SESSION['name'])) {
    header('location:Q32login.php');
    }
}

function addStudent($name, $course_id, $fee, $rollno, $phone, $address, $dob, $status) {

    $conn = mysqli_connect('localhost', 'root', '', 'aarya_20');
    $cdate = date('Y-m-d H:i:s');
    $sql = "INSERT INTO students (name, course_id, fee, rollno, phone, address, dob, status,created_at) 
            VALUES ('$name', '$course_id', '$fee', '$rollno', '$phone', '$address', '$dob', '$status', '$cdate')";
    
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        return true;
    }
    return false;
}
