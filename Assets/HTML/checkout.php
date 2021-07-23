<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>
    <title>Checkout</title>
</head>

<body>
    <!-- ///////////////////////////DEBUT HEADER ///////////////////////////////////////////// -->

    <?php
    require 'header.php';
    ?>

    <!-- ///////////////////////////FIN HEADER ///////////////////////////////////////////// -->

    <main>
        <!-- ///////////////////////////DEBUT SECTION 1 ///////////////////////////////////////////// -->

        <section class="section1">
            <div class="img-background" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/faq-title-img.jpg)" alt="img-background">
                <p><strong>CAISSE</strong> </p>
            </div>
        </section>
        <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->
        <!-- ///////////////////////////DEBUT SECTION 2 ///////////////////////////////////////////// -->

        <section class="section2">
            <?php

            if (isset($_SESSION['user']) != true) {
                echo '<div class="compte">
                <p>Avez vous un compte ?</p>
                <a href="../HTML/connexion.php">Cliquer ici pour vous identifier</a>
                </div>
                <div class="compte">
                <p>Vous êtes nouveau ?</p>
                <a href="../HTML/connexion.php?block=Inscription">Cliquer ici pour vous inscrire</a>
                </div>';
            }
            ?>
            <div class="full-formulaire">
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
                                $total += ($values['item_price'] * $values['item_quantity']);
                                echo '
                                            <div class="product">
                                                <div class="description">
                                                    <p>' . $values['item_name'] . '&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;' . $values['item_price'] . '€ &nbsp;x&nbsp; quantité: ' . $values['item_quantity'] . '</p>
                                                </div>
                                                <div class="price">
                                                    <p>' . $values['item_price'] * $values['item_quantity'] . '€</p>
                                                </div>
                                            </div>';
                            }
                        } else {
                            header('location:shop.php');
                        }
                        ?>
                        <div class="product">
                            <div class="description">
                                <p>Sous-total</p>
                            </div>
                            <div class="price">
                                <p><?= $total ?>€</p>
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

                                    if (isset($_SESSION['id_discount'])) {
                                        echo $_SESSION['name_discount'];
                                    } else {
                                        echo "<p>PAS DE REDUCTION</p>";
                                    }

                                    ?>
                                </p>
                            </div>
                            <div class="price-promo">
                                <p><?php if (isset($_SESSION['id_discount'])) {
                                        echo $_SESSION['value_discount'] . '%';
                                    } else {
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
                    <div class="passage-paiement">

                        <?php
                        if (isset($_SESSION['user']) != false) {
                            echo '<input id="checkout-button" type="submit" value="PASSER AU PAIMENT">';
                        }
                        ?>

                    </div>

                </div>
                <!-- ///////////////////////////FIN FORMULAIRE RIGHT ///////////////////////////////////////////// -->

            </div>
        </section>
        <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

    </main>
    <?php
    include 'footer.php';
    ?>

    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe("pk_test_DkjdfN592lhNndXa1ZKhruf6");
        var checkoutButton = document.getElementById("checkout-button");
        checkoutButton.addEventListener("click", function() {
            fetch("test.php", {
                    method: "POST",
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(session) {
                    return stripe.redirectToCheckout({
                        sessionId: session.id
                    });
                })
                .then(function(result) {
                    // If redirectToCheckout fails due to a browser or network
                    // error, you should display the localized error message to your
                    // customer using error.message.
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function(error) {
                    console.error("Error:", error);
                });
        });
    </script>
</body>

</html>