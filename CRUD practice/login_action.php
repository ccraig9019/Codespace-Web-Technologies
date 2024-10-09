<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('connect_db.php');

    require ('login_tools.php');
    list($check, $data) = validate )$link, $_POST['email'], $_POST['pass']);

}