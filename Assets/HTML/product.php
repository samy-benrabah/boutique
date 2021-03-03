<?php
require '../../Class/product.php';
$product = new Product();
$get_products = $product->get_products();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/product.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>

    <title>Product</title>
</head>
<body>
    <main>
        <!-- ///////////////////////////DEBUT HEADER ///////////////////////////////////////////// -->
            <?php
include 'header.php';
?>
<!-- ///////////////////////////FIN HEADER ///////////////////////////////////////////// -->
<!-- ///////////////////////////DEBUT SECTION 1 ///////////////////////////////////////////// -->
        <section class="section1">
            <div class="section1-topic1">
                <div class="description_image">
                    <div>
                        <p>Home/With Sidebar/Time and Light/Gold Wall Clock</p>
                    </div>
                    <div>
                        <img src="../Images/h9.jpg" alt="Produit">
                    </div>
                </div>
                <div class="section1-topic2">
                    <div class="sous-section1-topic2">
                        <div>
                            <div>
                                <h2>GOLD WALL CLOCK</h2>
                            </div>
                            <div>
                                <p>25$</p>
                            </div>
                        </div>
                        <div>
                            <div class="star-avis">
                                <div>
                                    <p><i class="fas fa-star"></i></p>
                                    <p><i class="fas fa-star"></i></p>
                                    <p><i class="fas fa-star"></i></p>
                                    <p><i class="fas fa-star"></i></p>
                                    <p><i class="fas fa-star"></i></p>

                                </div>
                                    <p>Sur 5 avis</p>
                            </div>

                        </div>
                        <div>
                            <div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Dolore nesciunt ipsum vero quia laudantium culpa laboriosam libero consequuntur placeat eius rem ea nobis consequatur,
                                itaque iure, ut neque vitae repellendus.</p>
                            </div>
                        </div>
                            <form method="get">
                                <input type="number" name="quantite" value="1" min="1" max="10">
                                <input type="submit" value="Ajouter au panier">
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->
<!-- ///////////////////////////DEBUT SECTION 2 ///////////////////////////////////////////// -->

        <section class="section2">
            <div>
                <div class="description">
                    <div class="sous-description" >
                        <div>
                            <h1>DESCRIPTION</h1>
                        </div>
                        <div>
                            <p>Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.
                            Earum, autem reprehenderit maxime fugiat et id ad nostrum,
                            dicta voluptate enim, qui alias consequatur dolorem totam! Sint velit voluptatibus delectus recusandae.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, voluptatibus blanditiis accusantium, cupiditate, perspiciatis deserunt aut quo sint ut quas quaerat illum nostrum.
                            Nostrum sit qui aliquid eveniet, odio deleniti.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="full-commentaire">
                    <div>
                        <h3>Ajouter un commentaire</h3>
                    </div>
                    <div>
                        <form action="" method="post">
                            <input type="text" name="titre-commentaire" placeholder="Avis"  id="">
                            <select name="nombre-etoile" id="nombre-etoile">
                                <option  value="1"> &#11088;</option>
                                <option  value="2"> &#11088;&#11088;</option>
                                <option  value="3"> &#11088;&#11088;&#11088;</option>
                                <option  value="4"> &#11088;&#11088;&#11088;&#11088;</option>
                                <option  value="5"> &#11088;&#11088;&#11088;&#11088;&#11088;</option>
                            </select>
                        </form>
                    </div>
                    <div>
                        <form name="adresse" action="" method="post">
                            <label for="adresse">Adresse</label>
                        <input type="text" name="adresse"  id="">
                        </form>
                    </div>


                    <div>
                        <form action="" method="post">
                        <input type="submit" name="envoyer-commentaire" id="">
                        </form>
                    </div>


                </div>
                <div>
                    <div>
                        <h3>Produits Similaires</h3>
                    </div>
                    <div class="sous-section2">

                    <div class ="product">
                            <div class="product-img" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-2-550x550.jpg)" alt="img-product">
                                </div>
                                <p>Name Product</p>
                                <div class="stars">
                                <p> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>

                                <p>25$</p>
                            </div>

                            <div class ="product">
                                <div class="product-img" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-550x550.jpg)" alt="img-product">
                                </div>
                                <p>Name Product</p>
                                <div class="stars">
                                <p> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>

                                <p>25$</p>
                            </div>
                            <div class ="product">
                                <div class="product-img" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-7-550x550.jpg)" alt="img-product">
                                </div>
                                <p>Name Product</p>
                                <div class="stars">
                                <p> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>

                                <p>25$</p>
                            </div>
                            <div class ="product">
                                <div class="product-img" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-4-550x550.jpg)" alt="img-product">
                                </div>
                                <p>Name Product</p>
                                <div class="stars">
                                <p> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>

                                <p>25$</p>
                            </div>
                </div>

                </div>
            </div>

        </section>
        <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

    </main>
</body>
</html>
