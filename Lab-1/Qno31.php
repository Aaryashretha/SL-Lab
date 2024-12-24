<?php
// Initialize error array
$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Username validation
    if (!empty(trim($_POST['username']))) {
        $username = ($_POST['username']);
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_.@]{2,}$/', $username)) {
            $err['username'] = 'Enter a valid username';
        }
    } else {
        $err['username'] = 'Enter username.';
    }
    if (isset($_POST['dob']) && !empty($_POST['dob']) && trim($_POST['dob'])) {
        $dob = $_POST['dob'];
    } else {
        $err['dob'] = 'Enter dob';
    }
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err['email'] = 'Invalid email ';
        }
    } else {
        $err['email'] = 'Enter email';
    }
    if (!empty(trim($_POST['phone']))) {
        $phone = $_POST['phone'];
        if (!preg_match('/^(98|97)\d{8}$/', $phone)) {
            $err['phone'] = 'Invalid length';
        }
        
    } else {
        $err['phone'] = 'Enter phone.';
    }
    if(count($err) == 0){ // Corrected variable name
        try{
            $connection = mysqli_connect('localhost','root','','aarya_20');
            $insertsql = "INSERT INTO form (username,  phone, email, dob) 
                          VALUES ('$username',  '$phone', '$email', '$dob')"; // Enclose variables in quotes
            mysqli_query($connection, $insertsql);
            if(mysqli_affected_rows($connection) == 1 && mysqli_insert_id($connection) > 0){ //
                echo 'Record insert success';
            } else {
                echo "Record Insert Failed";
            }
        }catch(Exception $ex){
            echo "Database error: " . $ex->getMessage();
        }
    }
}
?>
<style>
        .error {
            color: red;
           
        }
        
        fieldset {
            width: 50%;
            margin: auto;
            border: 1px solid green;
            border-radius: 5px;
            padding: 20px;
        }
        
       
        .form-group input.btn {
            width: auto;
            background-color: #28a745;
            color: white;
            
        }
       
    </style>
<form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
<fieldset>
<div class="username-container">
                <label class="required" for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter username" value="<?php echo ($username ?? ''); ?>" />
                <span class="error"><?php echo $err['username'] ?? ''; ?></span><br><br>
            </div>     
            <div class="form-group">
                <label class="required" for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="abc@gmail.com" value="<?php echo isset($email) ? ($email) : ''; ?>" />
                <span class='error'><?php echo isset($err['email']) ? ($err['email']) : ''; ?></span><br><br>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo isset($dob) ? ($dob) : ''; ?>" />
                <span class='error'><?php echo isset($err['dob']) ? ($err['dob']) : ''; ?></span><br><br>
            </div>
        <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter phone" value="<?php echo isset($phone) ? ($phone) : ''; ?>" />
                <span class='error'><?php echo isset($err['phone']) ? ($err['phone']) : ''; ?></span><br><br>
            </div>
            <div class="form-group">
                <input type="submit" class='btn' name="Login" value="Login" />
                <input type="reset" class='btn' name="reset" value="Clear" />
            </div>
</fieldset>
</form>

           
            
            