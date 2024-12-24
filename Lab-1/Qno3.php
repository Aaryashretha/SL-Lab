<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['minute']) && !empty(trim($_POST['minute']))) {
        $minute = intval($_POST['minute']);
        function Seconds($minutes) {
            return $minutes * 60;
        }
        $seconds = Seconds($minute);
        echo "The $minute minutes is: $seconds seconds.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minute into Second</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="minute">Minute</label>
        <input type="number" name="minute" placeholder="Enter minute" value="<?php echo isset($minute) ? ($minute) : ''; ?>"/>
        
    </div>
    <input type="submit" value="Convert to Seconds">
</form> 
</body>
</html>