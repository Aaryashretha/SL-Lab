<?php
function calculateSI($principle, $rate, $time) {
    return ($principle * $rate * $time) / 100;
}

// Initialize variables to store input values and result
$principle = $rate = $time = $simple_interest = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values from the form
    $principle = isset($_POST["principle"]) ? $_POST["principle"] : "";
    $rate = isset($_POST["rate"]) ? $_POST["rate"] : "";
    $time = isset($_POST["time"]) ? $_POST["time"] : "";

    // Validate input
    if (!empty($principle) && !empty($rate) && !empty($time)) {
        // Calculate simple interest
        $simple_interest = calculateSI($principle, $rate, $time);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
    <style>
        body {
            display: flex;
            justify-content: left;
            align-items: left;
            background: indigo;
        }
.h2{
    align text : left;
}
        .container {
            width: 300px;
            height: 450px;
          
            place-items: left;
            background: white;
            border-radius: 10px;
            padding: 30px;
          
        }

        .form-group input {
            width: 300px;
            height: 30px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid black;
            font-size: 18px;
            padding: 5px;
        }


    </style>
</head>
<body>

    <div class="container">
    <span><h2>Simple Interest Calculator</h2></span>
        <div class="result">
                <?php if (!empty($simple_interest)) : ?>
                    <p>Simple Interest: RS <?php echo number_format($simple_interest, 2); ?></p>
                <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
            
        <label  for="principle">Principle:</label>
          <input type="number" name="principle"   value="<?php echo isset($principle) ? ($principle) : ''; ?>"/>
       

        <label  for="rate">Rate of Interest:</label>
          <input type="number" name="rate"   value="<?php echo isset($rate) ? ($rate) : ''; ?>"/>
      

        <label  for="time">Time</label>
          <input type="number" name="time"   value="<?php echo isset($time) ? ($time) : ''; ?>"/>
      
</div>
            
            
                <input type="submit" name="calculate_simple" value="Calculate">
            
           
            </div>
        </form>
    </div>
</body>
</html>