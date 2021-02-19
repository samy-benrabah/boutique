<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>
    <title>Checkout</title>
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
            <p><strong>CAISSE</strong> </p>
        </div>
    </section>
    <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->
        <!-- ///////////////////////////DEBUT SECTION 2 ///////////////////////////////////////////// -->

    <section class="section2">
        <div class="compte">
            <p>Vous avez deja un compte?</p>
            <a href="../HTML/connexion.php">Cliquer ici pour vous identifier</a>

        </div>
        <div class="full-formulaire">
    <!-- ///////////////////////////DEBUT FORMULAIRE LEFT ///////////////////////////////////////////// -->

            <div class="formulaire-left">
                <p>ADRESSE DE LIVRAISON</p>
                <div class="input_nom_prenom">
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="">
                        </div>
                        <div class="label-input">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" id="">
                        </div>
                    </form>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" id="">
                        </div>
                    </form>
                </div>
                <div class="postal-ville-pays">
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="postal">Code Postal</label>
                            <input type="text" name="postal" id="">
                        </div>
                        <div class="label-input">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" id="">
                        </div>
                        <div class="label-input">
                            <label for="pays">Pays/Region</label>
                            <input type="text" name="pays" id="">
                        </div>
                    </form>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="">
                        </div>
                    </form>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="telephone">Telephone</label>
                            <input type="text" name="telephone" id="">
                        </div>
                    </form>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="livraison">Choix de livraison</label>
                            <select name="livraison" id="" style="height=100px;">
                                <option value="Express">Colis Express</option>
                                <option value="Economique">Economique</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="label-input-checkbox">
                            <input type="checkbox" name="checkbox-newcount" id="">
                            <label for="checkbox-newcount">Creer un compte?</label>
                        </div>
                    </form>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="label-input">
                            <label for="Mot de Passe">Mot de passe</label>
                            <input type="text" name="mtp" id="">
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
                    <div class="product">
                        <div class="description">
                            <p>Table</p><p> Black</p><p>Chrome x3</p>
                        </div>
                        <div class="price">
                            <p>130$</p>
                        </div>
                    </div>
                    <div class="product">
                        <div class="description">
                            <p>Lampe</p><p> Black</p><p>Chrome x1</p>
                        </div>
                        <div class="price">
                            <p>80$</p>
                        </div>
                    </div>
                    <div class="product">
                        <div class="description">
                            <p><span> Code réduction</span></p><p>
                        </div>
                        <div class="price">
                            <p>Labrix 30</p>
                        </div>
                    </div>
                    <div class="product">
                            <div class="promo">
                                <p>Labrix 30</p>
                            </div>
                            <div class="price-promo">
                                <p>7,90$</p>
                            </div>
                    </div>
                    <div class="product">
                        <div class="description">
                            <p><span>Livraison</span> </p>

                        </div>

                    </div>
                    <div class="product">
                        <div class="description">
                            <div class="choice-livraison">
                                <p>Express</p>
                            </div>
                        </div>
                        <div class="price-livraison">
                            <p>10$</p>
                        </div>
                    </div>
                    <div class="total">
                        <div class="description">
                            <p><span>TOTAL</span></p>
                            <div class="total-price">
                                <p>107.90$</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="passage-paiement">
                    <form action="" method="post">
                        <input type="submit" value="PASSER AU PAIMENT">
                    </form>
                </div>

            </div>
    <!-- ///////////////////////////FIN FORMULAIRE RIGHT ///////////////////////////////////////////// -->

        </div>
    </section>
    <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

</main>
<footer>

</footer>
</body>
</html>
