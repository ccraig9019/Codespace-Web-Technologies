<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('connect_db.php');

    require ('login_tools.php');
    //validate is a function in login_tools.php which checks the form values against the relevant fields in the database. The function is called here and passed the contents of the email and password fields as parameters
    list($check, $data) = validate ($link, $_POST['email'], $_POST['pass']); 

    if ($check) { //if the variable $check is true
        session_start(); //initiate a session
        $_SESSION['user_id'] = $data['user_id']; //set the values of the session superglobal to the values drawn from the database
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        load("read.php");
    }
    else {
        $errors = $data; //if check is false, i.e. the login has failed, assign the data returned to the errors array
    }

    mysqli_close($link); //close database connection

    include("login.php");

}