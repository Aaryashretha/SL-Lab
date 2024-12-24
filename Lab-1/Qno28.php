<?php
// Initialize error array
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Username validation
    if (!empty(trim($_POST['username']))) {
        $username = ($_POST['username']);
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_.@]{2,}$/', $username)) {
            $error['username'] = 'Enter a valid username';
        }
    } else {
        $error['username'] = 'Enter username.';
    }

    // Password validation
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = md5(trim($_POST['password'])); 
    } else {
        $error['password'] = 'Enter password.';
    }

    // If no errors, process the login
    if (empty($error)) {
        echo "<h2 style='text-align:center;color:green;'>Login Successful!</h2>";
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .error {
            color: red;
           
        }
        
        fieldset {
            width: 50%;
            margin: auto;
            border: 1px solid black;
            border-radius: 5px;
            padding: 20px;
        }
        
       
        .form-group input.btn {
            width: auto;
            background-color: #28a745;
            color: white;
            
        }
       
    </style>
</head>
<body>
    
    <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <legend>Login Form</legend>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter username" value="<?php echo isset($username) ? $username : ''; ?>">
                <span class="error"><?php echo $error['username'] ?? ''; ?></span>
              <br><br>
          
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter password">
                <span class="error"><?php echo $error['password'] ?? ''; ?></span>
               <br><br>
               <input type="checkbox" class='btn' name="remember" value="remember" />remember me for 7 days<br><br>
                <input type="submit" class="btn" name="login" value="Login">
                <input type="reset" class="btn" value="Clear">
            </div>
        </fieldset>
    </form>
</body>
</html>
