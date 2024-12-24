<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['chickens']) && !empty(trim($_POST['chickens'])) &&
        isset($_POST['cows']) && !empty(trim($_POST['cows'])) &&
        isset($_POST['pigs']) && !empty(trim($_POST['pigs']))) {

        $chickens = intval($_POST['chickens']);
        $cows = intval($_POST['cows']);
        $pigs = intval($_POST['pigs']);

        // Calculate the total number of legs
        $total_legs = ($chickens * 2) + ($cows * 4) + ($pigs * 4);

        echo "Total number of legs among all the animals is: $total_legs legs.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Legs Calculator</title>
</head>
<body>
    
    <form method="POST">
        <div class="form-group">
            <label for="chickens"> Chickens:</label>
            <input type="number" name="chickens" placeholder="Enter number of chickens" value="<?php echo isset($chickens) ? $chickens : ''; ?>" /><br><br>
             
        </div>
        <div class="form-group">
            <label for="cows">Cows:</label>
            <input type="number" name="cows" placeholder="Enter number of cows" value="<?php echo isset($cows) ? $cows : ''; ?>" /><br><br>
     
        </div>
        <div class="form-group">
            <label for="pigs">Pigs:</label>
            <input type="number" name="pigs" placeholder="Enter number of pigs" value="<?php echo isset($pigs) ? $pigs : ''; ?>" /><br><br>
            
        </div>
        <input type="submit" value="Calculate Total Legs" />
    </form>
</body>
</html>