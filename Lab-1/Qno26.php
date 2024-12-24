<?php
    // With the numeric multidimensional array and for loop..
    $studentinfo = [
        ["1", "Rajesh", "25","56", "89","57","64","98","364","pass"],
        ["2", "hari", "5", "56", "89","57","64","98","364","pass"],
        ["3", "Shyam", "6","54", "79","57","69","98","357","pass"],
        ["4", "Rita", "10","16", "89","56","64","98","323","fail"],
        ["5", "Gita", "4", "56","89","57","69","98","369","pass"],
        ["6", "Sita", "24","56", "99","57","24","98","334","fail"],
        ["7", "Sita", "24","56", "99","57","24","98","334","fail"],
        ["8", "Sita", "24","56", "99","57","24","98","334","fail"]
    ];
    
    echo "<table>";
    echo "<tr>
        <th> SN </th>
        <th> Name </th>
        <th> Roll </th>
        <th> Web Tech II </th>
        <th> DBMS </th>
        <th> Economics </th>
        <th> DSA </th>
        <th> Account </th>
        <th> Total </th>
        <th> Result </th>";
    
    for ($i = 0; $i<count($studentinfo); $i++){
        echo "<tr>";
        for($j = 0; $j < count($studentinfo[$i]); $j++){
            // Add class for pass/fail dynamically
            if ($j == count($studentinfo[$i]) - 1) { 
                $class = ($studentinfo[$i][$j] === 'pass') ? 'pass' : 'fail';
                echo "<td class='$class'>" . $studentinfo[$i][$j] . "</td>";
            } else {
                echo "<td>" . $studentinfo[$i][$j] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 12px;
        text-align: left;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color:white ;
        color: black;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: black;
        color:white;
    }
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
   
    td.pass {
        background-color: #b5f5b6;
        color: #004d00;
        font-weight: bold;
    }
    td.fail {
        background-color: #f5b6b6;
        color: #800000;
        font-weight: bold;
    }
</style>
