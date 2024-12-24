<?php
// Function to calculate area of a triangle
function Area($base, $height) {
    return 0.5 * $base * $height;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $base = isset($_POST["base"]) ? intval($_POST["base"]) : 0;
    $height = isset($_POST["height"]) ? intval($_POST["height"]) : 0;
    $area = Area($base, $height);
    echo "<p>Area: $area</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Area</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="base">Base</label>
        <input type="number" name="base" placeholder="Enter base" value="<?php echo isset($base) ? $base : ''; ?>" />
        <span class='error'><?php echo isset($err['base']) ? $err['base'] : ''; ?></span><br/><br/>
    </div>
    <div class="form-group">
        <label  for="height">Height</label>
        <input type="number" name="height" placeholder="Enter height" value="<?php echo isset($height) ? $height : ''; ?>" />
        <span class='error'><?php echo isset($err['height']) ? $err['height'] : ''; ?></span><br/><br/>
    </div>
    <input type="submit" value="Calculate Area">
</form>


</body>
</html>