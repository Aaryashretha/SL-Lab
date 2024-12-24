<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['wins']) && isset($_POST['draws']) && isset($_POST['losses'])) {
        $wins = intval($_POST['wins']);
        $draws = intval($_POST['draws']);
        $losses = intval($_POST['losses']);
        
        function calculatePoints($wins, $draws, $losses) {
            // 3 points for each win, 1 point for each draw, 0 points for each loss
            return ($wins * 3) + ($draws * 1) + ($losses * 0);
        }

        $totalPoints = calculatePoints($wins, $draws, $losses);
        echo "Total points: $totalPoints points.<br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
<form method="POST">
    <div class="form-group">
        <label  for="wins">Wins</label>
        <input type="number" name="wins"  value="<?php echo isset($wins) ? ($wins) : ''; ?>"/>
       
    
   
        <label  for="draws">Draws</label>
        <input type="number" name="draws"  value="<?php echo isset($draws) ? ($draws) : ''; ?>"/>
        
   
   
        <label  for="losses">Losses</label>
        <input type="number" name="losses"  value="<?php echo isset($losses) ? ($losses) : ''; ?>"/>
       
    </div>
    <input type="submit" value="Calculate Points"> 
</form> 
</body>
</html>