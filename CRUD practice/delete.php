<?php
#Open database connection
require ('connect_db.php');

#check for item_id parameter
if (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];
}

#Delete query
$sql = "DELETE FROM products WHERE item_id='$id'";
if ($link->query($sql) === TRUE) {
    header("Location: read.php");
}
else {
    echo "Error deleting record: ".$link->error;
}