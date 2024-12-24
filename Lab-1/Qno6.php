<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['age']) && !empty(trim($_POST['age']))) {
        $age = intval($_POST['age']);

        // Function to calculate age in days
        function ageInDays($years) {
            return $years * 365;
        }

        $days = ageInDays($age);
        echo "The age of $age years is approximately $days days.<br/>";
    } else {
        echo "Please enter a valid age.<br/>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age in Days</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label class="required" for="age">Age (in years)</label>
        <input type="number" name="age" placeholder="Enter age in years" value="<?php echo isset($age) ?($age) : ''; ?>" />

    </div>
    <input type="submit" value="Calculate Age in Days"> 
</form> 
</body>
</html>