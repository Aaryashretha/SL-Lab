<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['age']) && !empty(trim($_POST['age']))) {
        $age = intval($_POST['age']);

        // Function to check if the number is divisible by 5
        function isDivisibleByFive($num) {
            return $num % 5 == 0;
        }

        $divisible = isDivisibleByFive($age);

        if ($divisible) {
            echo "The number $age is evenly divisible by 5.<br/>";
        } else {
            echo "The number $age is not divisible by 5.<br/>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Divisibility</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label for="age">Enter a number</label>
        <input type="number" name="age" placeholder="Enter number" value="<?php echo isset($age) ? ($age) : ''; ?>"/>
  
    </div>
    <input type="submit" value="Check Divisibility"> 
</form>
</body>
</html>
