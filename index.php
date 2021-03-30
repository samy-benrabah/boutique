<?php
session_start();
require 'Class/product.php';
include 'Assets/HTML/price_panier.php';

$slider = new Product();
$get_sliders = $slider->get_sliders();
$tab = $slider->showProduct();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/d34f22fe3f.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="Assets/CSS/morad.css">
        <link rel="stylesheet" href="Assets/CSS/header-footer.css">
        <!------------ BOOTSTRAP -------------->
        <style>

        </style>

        <!------------ BOOTSTRAP -------------->
        <title>Document</title>
    </head>

    <body>
        <!-- <?php include'Assets/HTML/header.php'?> -->

        <header>
            <div>
            <i id="burger" class="fas fa-bars"></i>
            <ul>
                    <li> <i class="far fa-times-circle"></i></li>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Nos Produits</a></li>
                    <li><a href="">TOP Produits</a></li>
                    <li><a href="">Nouveautés</a></li>
            </ul>
            </div>
            
            <h1>D&CODE</h1>
            <ul class="price">
                <li>
                    <a href=""><img src="Assets/Images/cart.svg" alt="cart-photo"></a>(
                    <?= $_SESSION['total'] ?>€)</li>
                <li>
                    <a href=""><img src="Assets/Images/user.svg" alt="cart-photo"></a>(Login)</li>
            </ul>
        </header>
        <main>
            <!-- |||||||||| START SLIDERS |||||||||| -->
            <section class="slider">
                <slider>
                <?php
                    foreach ($get_sliders as $slide) {
                        echo
                        '<slide style="background-color: '.$slide->back_color.'">
                            <div>
                                <h2>'.$slide->title.'</h2>
                                <p>'.$slide->description.'</p>
                            </div>
                            <img src="Assets/Images/sliders/'.$slide->image.'" alt="image de slider">
                        </slide>';
                    }
                ?>
            </slider>

            </section>
            <!-- |||||||||| END SLIDERS |||||||||| -->

            <!-- |||||||||| START PRODUCTS |||||||||| -->
            <section>
                <br><br><br><br><br><br>
                <div>
                    <p>ALL/ HOME/ DECOR/ LIGHTING/ DECORATION/ VASES/ BASICS</p>
                </div>
                <br>
            </section>
            <section class="products">
                <?php
        $i = 0;
            foreach ($tab as $product) {
                
                $date = strtotime($product->product_date);
                $mtn = strtotime(date('Y-m-d'));
                $to = $mtn - $date;
                $floor = floor($to/(606024));
                if ($floor < 15) {
                    $new = '<p class="new" >NEW</p>';
                }else $new = '';
                echo '
                <a href="Assets/HTML/product.php?id='.$product->id.'&name='.$product->title.'">
                <div class="product_solo">
                <div class="product_img" style="background-image: url(Assets/Images/products/'.$product->image.');">

                </div>
                <p class="titre">'.$product->title.'</p>
                <p class="prix">'.$product->price.'€</p>
                </div>
                </a>';

                $i++;
                if ($i == 8) {
                    break;
                }
            }
        ?>
            </section>
            <!-- |||||||||| END PRODUCTS |||||||||| -->

            <!-- |||||||||| START BUTTON SHOW MORE PRODUCTS |||||||||| -->
            <section class="button">
                <div>
                    <a href="Assets/HTML/shop.php"><button>Voir tous les Produits</button></a>
                </div>
            </section>
            <!-- |||||||||| END BUTTON SHOW MORE PRODUCTS |||||||||| -->
            <br><br><br><br><br>
        </main>
        <footer>
            <!-- <?php include'Assets/HTML/footer.php'?> -->
            <ul>
                <li><a href="">Service client</a></li>
                <br>
                <li><a href="">Aides & contact</a></li>
                <li><a href="">Conditions générales</a></li>
                <li><a href="">Livraison</a></li>
            </ul>
            <ul>
                <li><a href="">A propos de nous</a></li>
                <br>
                <li><a href="">Mon compte</a></li>
                <li><a href="">Suivi </a></li>
                <li><a href="">FAQs</a></li>
            </ul>
            <ul>
                <li><a href="">Réseaux sociaux</a></li>
                <br>
                <li><a href="">Facebook</a></li>
                <li><a href="">Instagram</a></li>
                <li><a href="">Twitter</a></li>
            </ul>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>

    </html>