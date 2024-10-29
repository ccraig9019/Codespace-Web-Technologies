<?php

//Include the session-cart file
include('includes/user_nav.php');

//Checks to see if the id attribute is set in the URL (which it should be from the 'Add to cart' button) and assigns it to a variable
if (isset($_GET['id'])) {$id = $_GET['id'];}

//Require connection to database
require('connect_db.php');

//Create SQL query
$q = "SELECT * FROM products WHERE item_id = $id";
//Create variable to pass the query into the database
$r = mysqli_query($link, $q);

//If running the MySQL query above returns one row...
if (mysqli_num_rows($r) == 1) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC); //Fetch the result as an array and assign it to the variable $row
}

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
    echo '
            <div class="container">
                <div class="alert alert-secondary" role="alert">
                    <button type="button" class="close" data-dismiss-"alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>Another '.$row["item_name"].' has been added to your cart</p>
                    <a href="read.php">Continue shopping</a> | <a href="cart.php">View your cart</a>
                </div>
            </div>';
}
else {
    $_SESSION['cart'][$id]= array ('quantity' => 1, 'price' => $row['item_price']);
    echo '<div class = "container">
            <div class="alert alert-secondary" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>A '.$row["item_name"].' has been added to your cart</p>
                <a href="read.php">Continue shopping</a> | <a href="cart.php">View your cart</a>
            </div>
        </div>';
}

mysqli_close($link);


include ('includes/footer.php');
