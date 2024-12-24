<?php
function getStringIndex($array, $string) {
    $index = array_search($string, $array);
    return $index !== false ? $index : -1;
}
$array = ["aarya", "shrestha", "aarav", "sagar"];
print_r($array);
$string = "aarya";
$result = getStringIndex($array, $string);
echo $result !== -1 
    ? "The index of '$string' is: $result" 
    : "the string is not found";
?>