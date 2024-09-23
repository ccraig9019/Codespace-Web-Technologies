<?php

function vowelReplace($str) {
    $inputArray = str_split($str); //convert string input into an array
    //print_r($inputArray); //for debugging
    for ($i = 0; $i < count($inputArray); $i++ ) { //loop through the new array
        if ($inputArray[$i] == "A" || //check if the current value is equal to a vowel
        $inputArray[$i] == "a" || 
        $inputArray[$i] == "E" || 
        $inputArray[$i] == "e" || 
        $inputArray[$i] == "I" || 
        $inputArray[$i] == "i" || 
        $inputArray[$i] == "O" || 
        $inputArray[$i] == "o" || 
        $inputArray[$i] == "U" || 
        $inputArray[$i] == "u" ) 
        {
            $inputArray[$i] = "X"; //replace vowels with "X"
        }
    }
$newString = implode("", $inputArray); //turn the array back into a string with no separator
echo($newString); //print new string
} 

vowelReplace("Hello, world!")

?>