<?php
$info = [
    'name' => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email' => 'info@ram.com',
    'phone' => 98454545,
    'website' => 'www.ram.com'
];
print_r($info);
echo "<table border='1' cellspacing='0' cellpadding='5' style='border-collapse: collapse; width: 50%; text-align: left;'>";
echo "<thead>";
echo "<tr><th>Field</th><th>Value</th></tr>";
echo "</thead>";
echo "<tbody>";

foreach ($info as $key => $value) {
    echo "<tr>";
    echo "<td>" . ucfirst($key) . "</td>"; // Capitalize the first letter of the field name
    echo "<td>" . ($value) . "</td>"; // Safely display the value
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
