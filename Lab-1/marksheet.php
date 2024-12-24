<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px auto;
            width: 90%;
            max-width: 1000px;
            border: 2px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px #ccc;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1, h2 {
            margin: 5px;
        }
        .school-details {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .table-container {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-top: 10px;
        }
        .table-container th, .table-container td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 12px;
        }
        .table-container th {
            background-color: #f2f2f2;
        }
        .gradesheet {
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php
    
    if(isset($_GET['id'])) {
        $student_id = $_GET['id'];
        $conn = new mysqli('localhost', 'root', '', 'aarya_20'); // Adjust database credentials
        // Fetch student details
        $student_query = "SELECT * FROM students WHERE id = $student_id";
        $student_result = mysqli_query($conn, $student_query);
        $student = mysqli_fetch_assoc($student_result);
        
        // Fetch marks
        $marks_query = "SELECT * FROM marks WHERE rollno = $student_id";
        $marks_result = mysqli_query($conn, $marks_query);
        $marks = mysqli_fetch_assoc($marks_result);
        
        function grade($marks) {
            $total_marks = $marks + 35;
            if($total_marks >= 90) {
                $grade = 'A+';
                $grade_point = 4.0;
            } elseif($total_marks >= 80) {
                $grade = 'A';
                $grade_point = 3.6;
            } elseif($total_marks >= 70) {
                $grade = 'B+';
                $grade_point = 3.2;
            } else {
                $grade = 'B';
                $grade_point = 2.8;
            }
            return array($total_marks, $grade, $grade_point);
        }
    ?>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h2>First Terminal Examination - 2081</h2>
            <h1>Gradesheet</h1>
        </div>

        <!-- School Details -->
        <div class="school-details">
            <p><strong>Kawashi Municipality</strong></p>
            <p>Namajagrishi (East of Barhaghari Sastra)</p>
            <p>Est. 2081</p>
            <p>(World Bank of Hazard Certified School)</p>
        </div>

        <!-- Personal Details -->
        <div>
            <p><strong>Name:</strong> <?php echo $student['name']; ?></p>   
            <p><strong>Roll No:</strong> <?php echo $student['rollno']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $student['dob']; ?></p>
        </div>

        <!-- Subject Marks Table -->
        <div class="gradesheet">
            <table class="table-container">
                <tr>
                    <th rowspan="2">SN</th>
                    <th rowspan="2">Subjects</th>
                    <th rowspan="2">Credit Hour</th>
                    <th colspan="2">Full Marks</th>
                    <th rowspan="2">Obtained Marks</th>
                    <th rowspan="2">Grade</th>
                    <th rowspan="2">Grade Point</th>
                </tr>
                <tr>
                    <th>TH</th>
                    <th>PR</th>
                </tr>
                <tr>
                <?php
                $sn = 1;
                $grade_info = grade($marks['english']);
                ?>
                    <td><?php echo $sn++; ?></td>
                    <td>English</td>
                    <td>4</td>
                    <td>60</td>
                    <td>40</td>
                    <td><?php echo $marks['english']; ?></td>
                    <td><?php echo $grade_info[1]; ?></td>
                    <td><?php echo $grade_info[2]; ?></td>
                </tr>
                <?php
                $grade_info = grade($marks['mathematics']);
                ?>
                    <td><?php echo $sn++; ?></td>
                    <td>mathematics</td>
                    <td>4</td>
                    <td>60</td>
                    <td>40</td>
                    <td><?php echo $marks['mathematics']; ?></td>
                    <td><?php echo $grade_info[1]; ?></td>
                    <td><?php echo $grade_info[2]; ?></td>
                </tr>
                <?php
                $grade_info = grade($marks['science']);
                ?>
                    <td><?php echo $sn++; ?></td>
                    <td>science</td>
                    <td>4</td>
                    <td>60</td>
                    <td>40</td>
                    <td><?php echo $marks['science']; ?></td>
                    <td><?php echo $grade_info[1]; ?></td>
                    <td><?php echo $grade_info[2]; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>
</body>
</html>