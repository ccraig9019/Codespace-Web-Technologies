<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['qty'] as $item_id => $item_qty) {
        $id = (int) $item_id;
        $qty = (int) $item_qty;

        if ($qty == 0) {unset ($_SESSION['cart'][$id]);}
        elseif ($qty > 0) {$_SESSION['cart'][$id]['quantity'] = $qty; }   
    }
}




