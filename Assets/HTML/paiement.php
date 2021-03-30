<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/paiement.css">
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
            <p><strong>PAIEMENT</strong> </p>
        </div>
    </section>
    <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->
<!-- ///////////////////////////DEBUT SECTION 2 ///////////////////////////////////////////// -->
    <section class="section2">
        <div class="full-formulaire">
            <!-- ///////////////////////////DEBUT FORMULAIRE LEFT ///////////////////////////////////////////// -->

            <div class="formulaire-left">
                <div>
                    <p><span>INFORMATION DE PAIMENT</span></p>
                </div>
                    <div class="full-cb">
                        <form action="" method="get">
                            <div class="label-input">
                                <div class="label">
                                    <label for="carte-bancaire">Carte Bancaire</label>
                                </div>
                                <div class="input-cb">
                                    <input id="cb" name="carte-bancaire" type="number" placeholder="&bull; &bull; &bull;  &bull; &bull; &bull;  &bull; &bull; &bull;" autocomplete="cb"/>
                                </div>
                            </div>
                            <div class="nom-date-code_securite">
                                <div class="label-input">
                                    <div class="label">
                                        <label for="nom">Nom propriétaire de la carte</label>
                                    </div>
                                    <div class="input-cb">
                                        <input id="" name="nom" type="number" />
                                    </div>
                                </div>
                                <div class="label-input">
                                    <div class="label">
                                        <label for="Date d'expiration">Date d'expiration</label>
                                    </div>
                                    <div class="input-cb">
                                        <input id="" name="Date d'expiration" type="date" placeholder="&bull; &bull; &bull;  &bull; &bull; &bull;  &bull; &bull; &bull;" autocomplete="cb"/>
                                    </div>
                                </div>
                                <div class="label-input">
                                    <div class="label">
                                        <label for="code-securite">Code de securité/CVV</label>
                                    </div>
                                    <div class="input-cb">
                                        <input id="" name="code-securite" type="number" placeholder="&bull; &bull; &bull;  &bull; &bull; &bull;  &bull; &bull; &bull;" autocomplete="cb"/>
                                    </div>
                                </div>
                            </div>
                            <div class="condition-general">
                                    <div class="label-checkbox">
                                        <input type="checkbox" name="condition-general" id="">
                                        <label for="checkbox">J'accepte les conditions général</label>
                                    </div>
                            </div>
                            <div class="button-valider">
                                <input type="submit" value="VALIDER">
                            </div>
                        </form>
                    </div>
             </div>
             <!-- ///////////////////////////FIN FORMULAIRE LEFT ///////////////////////////////////////////// -->
<!-- ///////////////////////////DEBUT FORMULAIRE RIGHT ///////////////////////////////////////////// -->

<div class="formulaire-right">
                <div class="titre-panier">
                    <p>VOTRE PANIER</p>
                </div>
                <div class="product-price">
                    <?php
                        if (isset($_COOKIE['shopping_cart'])) {
                            $total = 0;
                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);

                            foreach ($cart_data as $kays => $values) {
                                $total += ($values['item_price']*$values['item_quantity']); 
                                echo '
                                            <div class="product">
                                                <div class="description">
                                                    <p>'.$values['item_name'].'&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$values['item_price'].'€ &nbsp;x&nbsp; quantité: '.$values['item_quantity'].'</p>
                                                </div>
                                                <div class="price">
                                                    <p>'.$values['item_price']*$values['item_quantity'].'€</p>
                                                </div>
                                            </div>';
                            }
                        }else {
                            header('location:shop.php');
                        }
                    ?>
                    <div class="product">
                                                <div class="description">
                                                    <p>Sous-total</p>
                                                </div>
                                                <div class="price">
                                                    <p><?=$total?>€</p>
                                                </div>
                                            </div>
                    <br>
                    <div class="product">
                        <div class="description">
                            <p><span> Code réduction</span></p>
                        </div>
                    </div>
                    <div class="product">
                            <div class="promo">
                                <p>
                                <?php

                                if ($_SESSION['id_discount']) {
                                    echo $_SESSION['name_discount'];
                                }else {
                                    echo "<p>PAS DE REDUCTION</p>";
                                }

                                ?>
                                </p>
                            </div>
                            <div class="price-promo">
                                <p><?php if ($_SESSION['id_discount']) {
                                    echo $_SESSION['value_discount'].'%';
                                }else {
                                    echo "0%";
                                } ?></p>
                            </div>
                    </div>
                    <br>
                    <div class="product">
                        <div class="description">
                            <p><span>Livraison</span> </p>

                        </div>

                    </div>
                    <div class="product">
                        <div class="description">
                            <div class="choice-livraison">
                                <p>Gratuite</p>
                            </div>
                        </div>
                        <div class="price-livraison">
                            <p>00€</p>
                        </div>
                    </div>
                    <div class="total">
                        <div class="description">
                            <p><span>TOTAL</span></p>
                            <div class="total-price">
                                <p><?php $totalFinal = ($total * $_SESSION['value_discount']) / 100;
                echo (round($total - $totalFinal, 2));
                ?>€</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- ///////////////////////////FIN FORMULAIRE RIGHT ///////////////////////////////////////////// -->

        </div>
    </section>

    <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

</main>
<footer>

</footer>

<script src="https://js.stripe.com/v3/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
var stripe = Stripe('pk_test_DkjdfN592lhNndXa1ZKhruf6');

</script>
</body>
</html>
