<?php
session_start();
require '../../Class/product.php';
$class = new Product();
if (empty($_SESSION['id_discount'])) {
    $_SESSION['id_discount'] = 0;
}
    if ($_GET['status']== "success") {
        echo "votre commande a bien été valider";
        $add_order = $class->add_order(2, $_SESSION['id_discount']);
        $get_id_order = $class->get_order_id();
        $id_order = $get_id_order->id_order;

        if (isset($_COOKIE['shopping_cart'])) {
            $total = 0;
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $kays => $values) {
                $add_order_to_container = $class->add_order_to_container($id_order, $values["item_id"], $values["item_quantity"]);
            }
        }
        unset($_COOKIE['shopping_cart']); 
        setcookie("shopping_cart", "", time() - (86400 * 30));
        unset($_SESSION['id_discount']);
        unset($_SESSION['name_discount']);
        unset($_SESSION['value_discount']);
        header( "Refresh:8; url=profil.php");
    }else if ($_GET['status']== "cancel") {
        echo "votre commande n'est pas passer :(";
    }


?>