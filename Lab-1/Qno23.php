<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3'])) {
        // Get the three integers from the form input
        $num1 = intval($_POST['num1']);
        $num2 = intval($_POST['num2']);
        $num3 = intval($_POST['num3']);

        // Function to find the largest number
        function largestNumber($a, $b, $c) {
            if ($a >= $b && $a >= $c) {
                return $a;
            } elseif ($b >= $a && $b >= $c) {
                return $b;
            } else {
                return $c;
            }
        }

        // Get the largest number
        $largest = largestNumber($num1, $num2, $num3);
        echo "The largest number among $num1, $num2, and $num3 is: $largest.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Largest Number</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" placeholder="Enter first number" value="<?php echo isset($num1) ? $num1 : ''; ?>" required/>
    </div>
    <div class="form-group">
        <label for="num2">Number 2:</label>
        <input type="number" name="num2" placeholder="Enter second number" value="<?php echo isset($num2) ? $num2 : ''; ?>" required/>
    </div>
    <div class="form-group">
        <label for="num3">Number 3:</label>
        <input type="number" name="num3" placeholder="Enter third number" value="<?php echo isset($num3) ? $num3 : ''; ?>" required/>
    </div>
    <input type="submit" value="Find Largest Number">
</form> 
</body>
</html>
