<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['string1']) && isset($_POST['string2']) && !empty(trim($_POST['string1'])) && !empty(trim($_POST['string2']))) {
        $string1 = $_POST['string1'];
        $string2 = $_POST['string2'];
        
        // Function to check if the lengths of both strings are equal
        function checkEqualLength($str1, $str2) {
            return strlen($str1) == strlen($str2);
        }

        $result = checkEqualLength($string1, $string2);
        if ($result) {
            echo "The two strings have equal lengths.<br/>";
        } else {
            echo "The two strings do not have equal lengths.<br/>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Length Comparison</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="string1">First String</label>
        <input type="text" name="string1"  value="<?php echo isset($string1) ? ($string1) : ''; ?>"/><br><br>
       
   
        <label for="string2">Second String</label>
        <input type="text" name="string2"  value="<?php echo isset($string2) ? ($string2) : ''; ?>"/><br><br>
       
    </div>
    <input type="submit" value="Check Lengths"> 
</form> 
</body>
</html>