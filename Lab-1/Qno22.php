<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ins']) && !empty(trim($_POST['ins']))) {
        $ins = trim($_POST['ins']);

        // Function to add first 3 characters at both ends of the string
        function mds($str) {
            $prefix = strlen($str) < 3 ? $str : substr($str, 0, 3);
            return $prefix . $str . $prefix;
        }

        $mdfs = mds($ins);
        echo "Modified String: $mdfs<br/>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Modification</title>
</head>
<body>
    <form method="POST">
        <div class="form-group">
            <label for="ins">Enter String:</label>
            <input type="text" name="ins"  value="<?php echo isset($ins) ? ($ins) : ''; ?>"/>
        </div>
        <input type="submit" value="Modify String">
    </form> 
</body>
</html>
