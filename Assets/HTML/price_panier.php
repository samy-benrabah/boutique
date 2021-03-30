<?php

if (isset($_COOKIE['shopping_cart'])) {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    

    foreach ($cart_data as $kays => $values) {
        $total += ($values['item_price']*$values['item_quantity']); 
    }

    // setcookie("total", $total, time()+3600);
}else {
    $total = "0";
    // setcookie("total", $total, time()+3600);
}
$_SESSION['total'] = $total
// round($total, 2);

?>