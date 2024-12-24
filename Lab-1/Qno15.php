<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['index']) && !empty(trim($_POST['index']))) {
        $index = intval($_POST['index']);
        
        // Define an array with some values
        $array = ["aarav", "aarya", "subin", "shreya", "perisha"];
        
        // Check if the index is valid
        if ($index >= 0 && $index < count($array)) {
            $value = $array[$index];
            echo "The value at index $index is: $value.<br/>";
        } else {
            echo "Invalid index.<br/>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Index</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="index">Index</label>
        <input type="number" name="index" value="<?php echo isset($index) ? $index : ''; ?>" />
     <br/>
    </div>
    <input type="submit" value="Get Value">
</form> 
</body>
</html>
