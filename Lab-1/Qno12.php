<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['si']) && !empty(trim($_POST['si']))) {
        $si = $_POST['si'];

        // Recursive function to calculate the length of a string
        function string($str) {
            if ($str == '') {
                return 0;
            } else {
                return 1 + string(substr($str, 1));
            }
        }

        $length = string($si);
        echo "Length  is: $length characters.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Length</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="si">Input String</label>
        <input type="text" name="si" value="<?php echo isset($si) ? ($si) : ''; ?>"/>
        
    </div>
    <input type="submit" value="Calculate String Length"> 
</form> 
</body>
</html>
