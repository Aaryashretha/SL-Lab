<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['voltage']) && !empty(trim($_POST['voltage'])) && isset($_POST['current']) && !empty(trim($_POST['current']))) {
        $voltage = floatval($_POST['voltage']);
        $current = floatval($_POST['current']);
        
        // Function to calculate power
        function calculatePower($voltage, $current) {
            return $voltage * $current;
        }
        
        $power = calculatePower($voltage, $current);
        echo "Power: $power watts.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power Calculation</title>
</head>
<body>
<form method="POST">
<div class="form-group">
        <label  for="voltage">Voltage</label>
        <input type="number" name="voltage" placeholder="Enter voltage" value="<?php echo isset($voltage) ? $voltage : ''; ?>" />
        <span class='error'><?php echo isset($err['voltage']) ? $err['voltage'] : ''; ?></span><br/>
    </div>
    <div class="form-group">
        <label  for="current">Current</label>
        <input type="number" name="current" placeholder="Enter current" value="<?php echo isset($current) ? $current : ''; ?>" />
        <span class='error'><?php echo isset($err['current']) ? $err['current'] : ''; ?></span><br/>
    </div>
    <input type="submit" value="Calculate Power"> 
</form> 
</body>
</html>