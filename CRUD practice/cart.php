<?php

# Access session.
session_start();

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load(); }

include ('includes/nav.php');

if (!empty($_SESSION['cart'])) {
    require ('connect_db.php');

    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
    $q = substr( $q, 0, -1) . ') ORDER BY item_id ASC';
    $r = mysqli_query($link, $q);

    echo '<form action="cart.php" method="post">';
    while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
        $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
        $total += $subtotal;
    }
    # Display the row/s:
    echo "{$row['item_name']} 
            <input type=\"text\" 
                size=\"3\" 
                name=\"qty[{$row['item_id']}]\" 
                value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\">
            <br>@ {$row['item_price']} = 
	
	<br> &pound ".number_format ($subtotal, 2)." ";

    # Display the total.
  echo ' <p>Total = &pound '.number_format($total,2).'</p>
        <p><input type="submit" name="submit" class="btn btn-light btn-block" value="Update My Cart"></p>
        <br>
        <a href="checkout.php?total='.$total.'" class="btn btn-light btn-block">Checkout Now</a><br>
        </form>';
  }

  

else
# Or display a message.
{ echo '<p>Your cart is currently empty.</p>' ; }
