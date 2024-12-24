<?php
function Strin($ins) {
    
    if (substr($ins, 0, 2) === 'if') {
        return $ins; 
    } else {
        return 'if ' . $ins; 
    }
}


$inputs = ["if aarya", "aarya", "if"];
echo "<br/>";
print_r($inputs);
echo "<br/>";
foreach ($inputs as $input) {
    echo Strin($input) . "<br/>";
}
?>
