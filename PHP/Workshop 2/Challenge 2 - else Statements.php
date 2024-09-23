<?php

function checkAge ($age) {
    if ($age < 13) {
        echo "You are a child.";
    }
    elseif ($age > 13 && $age < 17) {
        echo "You are a teenager.";
    }
    elseif ($age > 18 && $age < 64) {
        echo "You are an adult.";
    }
    else {
        echo "You are a senior citizen.";
    }
}

checkAge(80);