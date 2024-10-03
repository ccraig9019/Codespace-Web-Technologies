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

/*Notes for future improvement: could make it able to accept input without spaces. This would probably require a fairly extensive if/else tree to determine
if the entries in the array $explodedInput are numbers or operands - if they're numbers, append, then determine the operand, then repeat the same 
for the second number*/ 

