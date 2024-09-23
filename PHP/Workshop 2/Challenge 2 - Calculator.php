<?php

while(true) {
    echo "Please input your equation with a space between each number.\n
    Use +, -, * and / as your operands.\n
    Type 'exit' to quit.\n\n
    New equation: \n";

    $input = trim(fgets(STDIN));

    if(strtolower($input) == "exit") {
        echo "Goodbye!\n";
        break;
    }

    $explodedInput = explode(" ", $input);
    if ($explodedInput[1] == "+") {
        echo "Result: ".$explodedInput[0]+$explodedInput[2]."\n\n\n";
    }
    elseif ($explodedInput[1] == "-") {
        echo "Result: ".$explodedInput[0]-$explodedInput[2]."\n\n\n";
    }
    elseif ($explodedInput[1] == "*") {
        echo "Result: ".$explodedInput[0]*$explodedInput[2]."\n\n\n";
    }
    elseif ($explodedInput[1] == "/") {
        echo "Result: ".$explodedInput[0]/$explodedInput[2]."\n\n\n";
    }

}