<?php

//Set page title and include navbar
$page_title = "Checkout";
include ('includes/nav.php');

//Redirect if not logged in
if (!isset($_SESSION['user_id'])){ require ('login_tools.php'); load();};



//Check for passed total and cart
if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart']))) {
    //Open database connection
    require('connect_db.php');

    //Send buyer info and order total to orders table in the database
    $q = "INSERT INTO orders (user_id, total, order_date) VALUES (".$_SESSION['user_id'].",".$_GET['total'].", NOW() )";
    $r = mysqli_query($link, $q);

    //Retrieve current order number
    $order_id = mysqli_insert_id($link);
    
    //Retrieve cart items from 'shop' database table
    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) {$q .= $id . ",";};
    $q = substr($q, 0, -1). ") ORDER BY item_id ASC";
    $r = mysqli_query ($link, $q);

    //Store order contents in order_contents table in database
    while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
        $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
                  VALUES ( $order_id, ".$row['item_id'].",".$_SESSION['cart'][$row['item_id']]['quantity'].",".$_SESSION['cart'][$row['item_id']]['price'].")" ;
        $result = mysqli_query($link, $query);
    }

    //Close database connection
    mysqli_close($link);

    //Display order number
    echo "<div class=\"container\">
            <div class=\"alert alert-secondary\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
                <p>Thanks for your order. Your order number is #".$order_id."</p>
            </div>
        </div>";
        
    //Remove cart items
    $_SESSION['cart'] = NULL;

}

//Or display a message
else {
    echo '<div class=\"container\">
            <div class=\"alert alert-secondary\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
                </button>
                <p>There are no items in your cart.</p>
            </div>
         </div>' ; 
}

# Create navigation links.
echo '<p><a href="read.php">Shop</a> | <a href="forum.php">Forum</a> | <a href="home.php">Home</a> | <a href="goodbye.php">Logout</a></p>' ;

# Display footer section.
include ( 'includes/footer.php' ) ;
