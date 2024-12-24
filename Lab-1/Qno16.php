<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['people']) && !empty(trim($_POST['people']))) {
        $people = intval($_POST['people']);
        
        function calculateCars($num_people) {
            // Each car can hold 5 people
            return ceil($num_people / 5);
        }

        $cars_needed = calculateCars($people);
        echo "For $people people, you will need $cars_needed cars.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Calculation</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="people">Number of People</label>
        <input type="number" name="people"   value="<?php echo isset($people) ? ($people) : ''; ?>"/>
    
    </div>
    <input type="submit" value="Calculate Cars">
</form>
</body>
</html>
