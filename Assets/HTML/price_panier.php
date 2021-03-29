<?php

if (isset($_COOKIE['shopping_cart'])) {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    

    foreach ($cart_data as $kays => $values) {
        $total += ($values['item_price']*$values['item_quantity']); 
    }
    $_SESSION['total'] = $total;
}else {
    $total = "0";
}
echo round($total, 2);
?>