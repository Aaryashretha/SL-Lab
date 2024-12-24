<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'aarya_20'); // Adjust database credentials

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch marks data
$sql = "SELECT s.id, s.rollno, s.name 
        FROM students s"; 
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
       
    </style>
</head>
<body>
    <h2>Students List</h2>
    <table width="100%" border="1"> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Fetch and display data row by row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['rollno']}</td>
                            <td>{$row['name']}</td>
                            <td><a href='marksheet.php?id={$row['id']}' class='btn'>View Marksheet</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>