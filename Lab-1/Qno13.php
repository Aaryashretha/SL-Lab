<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['base']) && !empty(trim($_POST['base'])) && isset($_POST['height']) && !empty(trim($_POST['height'])) && isset($_POST['shape']) && !empty(trim($_POST['shape']))) {
        
        $base = floatval($_POST['base']);
        $height = floatval($_POST['height']);
        $shape = $_POST['shape'];

        // Function to calculate area based on shape
        function calculateArea($base, $height, $shape) {
            if ($shape == "triangle") {
                return 0.5 * $base * $height;
            } elseif ($shape == "parallelogram") {
                return $base * $height;
            } else {
                return "Invalid shape";
            }
        }

        // Calculate the area
        $area = calculateArea($base, $height, $shape);
        echo "The area of the $shape is: $area square units.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Calculation</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="base">Base:</label>
        <input type="number" name="base"  value="<?php echo isset($base) ? ($base) : ''; ?>" step="any"/><br/>
    
        <label for="height">Height:</label>
        <input type="number" name="height"  value="<?php echo isset($height) ? ($height) : ''; ?>" step="any"/><br/>
   
        <label for="shape">Shape:</label>
        <select name="shape">
            <option value="triangle" <?php echo isset($shape) && $shape == 'triangle' ? 'selected' : ''; ?>>Triangle</option>
            <option value="parallelogram" <?php echo isset($shape) && $shape == 'parallelogram' ? 'selected' : ''; ?>>Parallelogram</option>
        </select><br/>
    </div>
    <input type="submit" value="Calculate Area"> 
</form> 
</body>
</html>
