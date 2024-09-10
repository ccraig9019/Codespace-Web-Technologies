<?php

//user's age
$user_age = 25;

//rough estimation of how many leap years the user has lived through
$leap_years = $user_age / 4;

//calculations based on user age
$days = $user_age * 365; 
$true_user_age = $days + $leap_years;
$hours = $true_user_age * 24;
$minutes = $hours * 60;

echo (
    "Welcome to the Age Calculator!<br><br>
    Your age: ".$user_age."<br><br>
    You have been alive for:<br>".
    $days." days<br>".
    $hours." hours<br>".
    $minutes." minutes"
);

?>


