<?php

//Function to load specified or default URL
function load($page = "login.php") {
    $url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]);

    //remove any trailing slashes and add to page URL
    $url = rtrim($url, "/\\");
    $url .= "/".$page;

    //execute redirect then quit.
    header("location:$url"); //sends user to the URL created above
    exit();
}

//Function to check email address and password, called on login_action.php
function validate($link, $email = "", $pwd = "") {
    //initialise errors array as an empty array
    $errors = array();

    //check email field
    if (empty($email)) { //if the email field is empty...
        $errors[] = "Enter your email address."; //push this message to the errors array
    }
    else { //otherwise, if the email field is not empty...
        $e = mysqli_real_escape_string($link, trim($email)); //...assign the sanitised and trimmed data in the $email variable to the variable $e
    }

    //check password field
    if (empty($pwd)) { //If password field is empty...
        $errors[] = "Enter your password."; //...push this message to the errors array
    }
    else { //If password field is not empty...
        $p = mysqli_real_escape_string($link, trim($pwd)); //...assign the sanitised and trimmed data in the $pwd variable to the variable $p
    }

    //On success, retrieve user_id, first_name and last_name from 'users' database
    if (empty($errors)) { //if the errors array is empty...
        $user_query = "SELECT user_id, first_name, last_name FROM users WHERE email='$e' AND pass='$p'"; //Create an SQL query to fetch relevant data (NOTE: variable names have to be in single quotes here)
        $user_run = mysqli_query ($link, $user_query); //Run query through $link connection variable
        
        $admin_query = "SELECT user_id, first_name, last_name FROM admin WHERE email='$e' AND pass='$p'"; //Create an SQL query to fetch relevant data from the admin table
        $admin_run = mysqli_query ($link, $admin_query); //Run query through $link connection variable
        
        if (@mysqli_num_rows($admin_run) == 1) { //If the query returns one row from the admin table
            $row = mysqli_fetch_array ($admin_run, MYSQLI_ASSOC); //Assign that data to an array called $row
            return array(true, $row, true); 
        }
        
        else if (@mysqli_num_rows($user_run) == 1) { //If the query returns exactly one row (implying the email address and password exist in the database)...
            $row = mysqli_fetch_array ($user_run, MYSQLI_ASSOC); //Assign that data to an array called $row
            return array(true, $row, false);
        }
        else {
            $errors[] = "Email address and password not found.";
        }

        return array(false, $errors, false);

    }

}