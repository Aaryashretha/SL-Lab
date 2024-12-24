<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['value1']) && isset($_POST['value2'])) {
        $value1 = intval($_POST['value1']);
        $value2 = intval($_POST['value2']);
        
        function calculateSum($val1, $val2) {
            if ($val1 == $val2) {
                return 3 * ($val1 + $val2); // Triple their sum if values are the same
            } else {
                return $val1 + $val2; // Return normal sum
            }
        }
        
        $sum = calculateSum($value1, $value2);
        echo "The result is: $sum.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum Calculator</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="value1">Enter first value:</label>
        <input type="number" name="value1"  value="<?php echo isset($value1) ? ($value1) : ''; ?>" /><br/>
   
        <label for="value2">Enter second value:</label>
        <input type="number" name="value2"  value="<?php echo isset($value2) ? ($value2) : ''; ?>"/> <br/>
    </div>
    <input type="submit" value="Calculate Sum">
</form>
</body>
</html>
