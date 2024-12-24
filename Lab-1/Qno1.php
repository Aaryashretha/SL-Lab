<?php

// Variables for different data types
$integer = 40;
$float = 3.14;
$string = "Aarya Shrestha";
$boolean = true;
$array = ["Apple", "Banana", "Cherry"];
$n = null;
$object = (object)["key" => "value"];


echo "1a:\n";
echo "Integer: $integer\n";
print "Float: $float\n";
echo "String: $string\n";
echo "Boolean: " . ($boolean ? 'true' : 'false') . "\n";
echo "Array: ";
print_r($array);
echo "NULL: " . (is_null($n) ? "NULL" : "") . "\n";
echo "Object: ";
print_r($object);

echo "1b:\n";
print_r($array);

var_dump($array);

echo "1c:\n";
echo "\nData type of \$integer: " . gettype($integer) . "\n";
echo "Data type of \$float: " . gettype($float) . "\n";
echo "Data type of \$string: " . gettype($string) . "\n";
echo "Data type of \$boolean: " . gettype($boolean) . "\n";
echo "Data type of \$array: " . gettype($array) . "\n";
echo "Data type of \$n: " . gettype($n) . "\n";
echo "Data type of \$object: " . gettype($object) . "\n";

?>
