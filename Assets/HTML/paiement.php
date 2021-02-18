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
