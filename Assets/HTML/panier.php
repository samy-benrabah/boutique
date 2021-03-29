<?php

    require '../../Class/product.php';
    $class = new Product();
if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values){
            if($cart_data[$keys]['item_id'] == $_GET["id"]){
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:panier.php?remove=1");
            }
        }
    }
}


if (isset($_POST['chekout'])) {
    header('location:checkout.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/panier.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>

    <title>Panier</title>
</head>
<body>
    <!-- ///////////////////////////DEBUT HEADER ///////////////////////////////////////////// -->
<?php
include 'header.php';
?>
<!-- ///////////////////////////FIN HEADER ///////////////////////////////////////////// -->
<?php

$msg = "";
if (isset($_POST['valider-promo'])) {
    $discount = $class->discount($_POST['name-code']);
    if ($discount != false) {
        $_SESSION['id_discount'] = $discount->id;
        $_SESSION['name_discount'] = $discount->name;
        $_SESSION['value_discount'] = $discount->value;
        $msg = '<p style="color=green;">le code a bien été appliqué<p>';
    }else {
        $msg =  '<p style="color=red;">le code de reductioin que vous avez saisir n\'est pas valide<p>';
    }
}
if(isset($_POST['clear'])){
    setcookie("shopping_cart", "", time() - (86400 * 30));
    header("location:panier.php");
    unset($_SESSION['total']);
    setcookie("total", "", time() - (86400 * 30));
}
?>
<main>
    <!-- ///////////////////////////DEBUT SECTION 1 ///////////////////////////////////////////// -->

    <section class="section1">
        <div class="img-background" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/faq-title-img.jpg)" alt="img-background">
            <p><strong>PANIER</strong> </p>
        </div>
    </section>
    <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->
<!-- ///////////////////////////DEBUT SECTION 2 ///////////////////////////////////////////// -->

    <section class="section2">
        <div>
            <div>
                <h2 class="h2" ><strong>VOTRE PANIER</strong></h2>
            </div>
            <div class="full_code_price-product">
                <form action="" method="post">
                    <?php

                        if (isset($_COOKIE['shopping_cart'])) {
                            $total = 0;
                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);
                            $display = "flex";
                            $reduction = '
                                        <div class="code-reduction">
                                            <form action="" method="post">
                                                <img src="../Images/coupon.png" alt="coupon-reduction">
                                                <input type="text" name="name-code" placeholder="Entrer votre code">
                                                <input type="submit" name="valider-promo" value="VALIDER LE CODE">
                                            </form>
                                        </div>';
                            foreach ($cart_data as $kays => $values) {
                                $nbr = 0;
                                $total += ($values['item_price']*$values['item_quantity']); 
                                echo '
                                    <div class="code_price-product">
                                        <div class="img-number">
                                            <div class="product-img" style="background-image:url(../Images/products/'.$values['item_image'].')"></div>
                                            <div class="price-product">
                                                <p>'.$values['item_name'].'</p>
                                                <p>'.$values['item_price'].'€</p>
                                            </div>
                                            <div class="product-prix-number">
                                            <input class="inpQty" type="number" name="quantity" value="'.$values['item_quantity'].'">
                                            <input type="submit" name="edit'.$nbr.'" value="ok">
                                                <p><b>'.$values['item_price']*$values['item_quantity'].'€</b></p>
                                                <a href="panier.php?action=delete&id='.$values["item_id"].'">X</a>
                                            </div>
                                        </div>
                                    </div>';    
                                //==========================================================================================
                                // if (isset($_POST['edit'.$nbr])) {
                                //     $item_id_list = array_column($cart_data, 'item_id');
                                //     if(in_array($values["item_id"], $item_id_list)){
                                //         $cart_data[$kays]["item_quantity"] =  $_POST["quantity"];
                                //     }
                                //     $item_data = json_encode($cart_data);
                                //     setcookie('shopping_cart', $item_data, time() + (86400 * 30));
                                // }
                                //==========================================================================================
                                $nbr++;
                            }
                            echo '<input type="submit" name="clear" value="SUPPRIMER MON PANIER">';
                        }else {
                            $display = "none";
                            $reduction = '
                            <div class="code-reduction">
                                <p>Votre panier est vide.  <a href="shop.php">aller vers la page shop</a> </p>
                            </div>
                            ';
                        }
                    ?>
                </form>
                <?= $reduction?>
                <?= $msg?>
            </div>
        </div>
        <div style="display:<?= $display ?>;" class="total-panier">
            <div>
                <h2>TOTAL DU PANIER</h2>
            </div>
            <div class="p-panier">
                <p>Total produits: &nbsp;&nbsp;</p>
                <p><?= $total ?> €</p>
            </div>
            <div class="p-panier">
                <p>Livraison:&nbsp;&nbsp;</p>
                <p>Gratuite</p>
            </div>
            <div class="p-panier">
                <p>Reduction:&nbsp;&nbsp;</p>
                <p><?php  
                if (isset($_SESSION['value_discount'])) {

                }else {
                    $_SESSION['value_discount'] = 0;
                }
                    echo $_SESSION['value_discount'].'%';
                
                ?></p>
            </div>
            <div class="line">
            </div>
            <div class="end-panier">
                <p><strong>TOTAL :</strong></p>
                <p><strong><?php $totalFinal = ($total * $_SESSION['value_discount']) / 100;
                echo (round($total - $totalFinal, 2));
                ?> €</strong></p>
            </div>
            <div>
                <form action="" method="post">
                    <input type="submit" name="chekout" value="CONFIRMER LA COMMANDE">
                </form>
            </div>
        </div>
    </section>
    <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

</main>
<br>
<?php include 'footer.php'; ?>
</body>
</html>
