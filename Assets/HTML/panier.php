<?php
    session_start();
    require '../../Class/panier_class.php';

    $panier = new Panier('produits');
    $listeProduits = $panier->getPanier();
   
    if (isset($_POST['unset'])) {
        $unset = $panier->clear();
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

                    if ($listeProduits) {
                        foreach ($listeProduits as $key) {
                            $total = $key['price']*$key['qte'];
                            echo '
                            <div class="code_price-product">
                                <div class="img-number">
                                    <div class="product-img" style="background-image:url(../Images/products/'.$key['image'].')"></div>
                                    <div class="price-product">
                                        <p>'.$key['titre'].'</p>
                                        <p>'.$key['price'].'€</p>
                                    </div>
                                    <div class="product-prix-number">
                                        <input type="number" name="quantité-number" value="'.$key['qte'].'"  min="1" max="10">
                                        <p><b>'.$total.'€</b></p>
                                    </div>
                                </div>
                            </div>';
                        }
                    }else {
                        echo "panier vide";
                    }
                
                
                ?>
                    <input type="submit" name="maj" value="METTRE A JOUR">
                </form>
                
                <div class="code-reduction">
                            <form action="" method="get">
                                <img src="../Images/coupon.png" alt="coupon-reduction">
                                <input type="text" name="name-code" placeholder="Entrer votre code" id="">
                                <input type="submit" name="valider-promo" value="VALIDER LE CODE">
                            </form>
                    </div>
            </div>
        </div>
        <div class="total-panier">
            <div>
                <h2>TOTAL DU PANIER</h2>
            </div>
            <div class="p-panier">
                <p>Total:</p>
                <p>139$</p>
            </div>
            <div class="p-panier">
                <p>Livraison:</p>
                <p>Gratuite</p>
            </div>
            <div class="line">

            </div>
            <div class="end-panier">
                <p><strong>TOTAL :</strong></p>
                <p><strong>139$</strong></p>
            </div>
            <div>
                <form action="" method="post">
                    <input type="submit" name="unset" value="CONFIRMER LA COMMANDE">
                </form>
            </div>
        </div>
    </section>
    <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

</main>
<footer>

</footer>
</body>
</html>
