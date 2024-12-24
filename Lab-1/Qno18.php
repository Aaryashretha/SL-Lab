<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['num']) && !empty(trim($_POST['num']))) {
        $n = intval($_POST['num']);
        
        // Function to calculate the absolute difference
        function diff($n) {
            $difference = abs($n - 51); 
            if ($n > 51) {
                return $difference * 3; 
            }
            return $difference; 
        }

        // Calculate the result
        $result = diff($n);
        echo "The result is: $result<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Difference</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="num">Enter num</label>
        <input type="number" name="num" placeholder="Enter num" value="<?php echo isset($n) ? ($n) : ''; ?>"/>
       
    </div>
    <input type="submit" value="Calculate Difference"> 
</form> 
</body>
</html>
