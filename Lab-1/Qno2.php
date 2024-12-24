<?php
const PI = 3.14;
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['radius']) && !empty(trim($_POST['radius']))) {
        $radius = floatval($_POST['radius']);
        $area = PI * $radius * $radius;
        echo "The area of the circle with radius $radius is: $area<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate </title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="Radius">Radius</label>
        <input type="number" name="radius" placeholder="Enter radius" value="<?php echo isset($radius) ? ($radius) : ''; ?>"/>
        
    </div>
    <input type="submit" value="Calculate ">
</form> 
</body>
</html>