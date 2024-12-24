<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ins']) && !empty(trim($_POST['ins']))) {
        $ins = $_POST['ins'];
        $fir = substr($ins, 0, 2); 

        if (strlen($ins) < 2) {
            echo $ins; 
        } else {
            
            $result = str_repeat($fir . " ", 4);
            echo rtrim($result); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Repetition</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="ins">Enter String</label>
        <input type="text" name="ins"  value="<?php echo isset($ins) ? ($ins) : ''; ?>"/>
    </div>
    <input type="submit" value="Generate String">
</form>
</body>
</html>
