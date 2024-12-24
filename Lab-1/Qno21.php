<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['string']) && !empty(trim($_POST['string']))) {
        $string = $_POST['string'];
        
        // Function to modify the string as per the requirement
        function modifyString($str) {
            // Get the last character of the string
            $lastChar = $str[strlen($str) - 1];
            // Return the string with the last character added at the front and back
            return $lastChar . $str . $lastChar;
        }
        
        // Get the modified string
        $modifiedString = modifyString($string);
        echo "Modified string: $modifiedString";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify String</title>
</head>
<body>
    <form method="POST">
        <div class="form-group">
            <label for="string">Enter a string:</label>
            <input type="text" name="string" placeholder="Enter string" value="<?php echo isset($string) ? $string : ''; ?>" required/><br/>
        </div>
        <input type="submit" value="Modify String">
    </form>
</body>
</html>
