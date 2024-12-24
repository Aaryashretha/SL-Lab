<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aarya_20";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST['rollno'];
    $english = $_POST['english'];
    $science = $_POST['science'];
    $mathematics = $_POST['mathematics'];

    $sql = "INSERT INTO marks (rollno, english, science, mathematics) 
            VALUES ('$rollno', '$english', '$science', '$mathematics')";

    if ($conn->query($sql) === TRUE) {
        echo "Marks added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_rollno = "SELECT id,name FROM students";
$result_rollno = $conn->query($sql_rollno);
?>

<html>
<head>
    <title>Add Student Marks</title>
</head>
<body>
    <h2>Add Student Marks</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Roll Number: 
        <select name="rollno" required onchange="updateName(this)">
            <option value="">Select Roll Number</option>
            <?php
            while($row = $result_rollno->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "' data-name='" . $row['name'] . "'>" . $row['id'] . "</option>";
            }
            ?>
        </select><br><br>
        Name: <input type="text" name="name" id="name" readonly><br><br>
        English: <input type="number" name="english"  min="0" max="60" required><br><br>
        Science: <input type="number" name="science" min="0" max="60"  required><br><br>
        Mathematics: <input type="number" name="mathematics" min="0" max="60"  required><br><br>
        <input type="submit" value="Add Marks">
    </form>

    <script>
    function updateName(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        document.getElementById('name').value = selectedOption.getAttribute('data-name');
    }
    </script>
</body>
</html>
