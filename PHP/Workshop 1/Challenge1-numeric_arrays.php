<?php
//array of day names
$days = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");

//start unordered list
echo "<ul>";

//loop through array and output items as list
foreach($days as $value) {
    echo "<li>$value</li>";
}

//close unordered list
echo "<ul>";

?>