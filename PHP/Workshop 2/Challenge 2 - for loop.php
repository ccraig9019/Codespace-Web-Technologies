<?php

function multiplicationTable($number) {
    echo "Multiplication table of $number:\n\n";
    for ($i=1; $i<11; $i++) {
        $result = $i*$number;
        echo "$number x $i = $result\n";   
    }
}

echo multiplicationTable(5);

     