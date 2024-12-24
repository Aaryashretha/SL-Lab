<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ins']) && !empty(trim($_POST['ins']))) {
        $ins = $_POST['ins'];
        
      
        function con($string) {
            $length = strlen($string);
            
          
            if ($length < 3) {
                return strtoupper($string);
            }
            
           
            $lt = strtoupper(substr($string, -3));
            $swt = substr($string, 0, $length - 3);
            
            
            return $swt . $lt;
        }

      
        $mds = con($ins);
        echo "Converted String: $mds<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Conversion</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="ins">Enter String</label>
        <input type="text" name="ins"  value="<?php echo isset($ins) ? $ins : ''; ?>" />
        
    </div>
    <input type="submit" value="Convert String"> 
</form>
</body>
</html>
