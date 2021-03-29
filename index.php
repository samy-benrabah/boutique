<?php
session_start();
require 'Class/product.php';
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
    <!-- <link rel="stylesheet" href="../boutique_en_ligne/Assets/CSS/shop.css"> -->
    <link rel="stylesheet" href="Assets/CSS/morad.css">
    <link rel="stylesheet" href="Assets/CSS/header-footer.css">
    <!------------ BOOTSTRAP -------------->
    <style>
    <?php
        $i=1;
        $k=(-1);
        foreach ($get_sliders as $slide) {
            echo 'slide:nth-child('.$i.') {
                left: 0%;
                animation-delay: '.$k.'s;
            }';
            $i+=1;
            $k+=3;
        }
    ?>
    </style>
    
    <!------------ BOOTSTRAP -------------->
    <title>Document</title>
</head>

<body>
   

    <header>
        <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="">Nos Produits</a></li>
            <li><a href="">TOP Produits</a></li>
            <li><a href="">Nouveautés</a></li>
        </ul>
        <h1>D&CODE</h1>
        <form action="../boutique_en_ligne/Assets/HTML/search.php" method="get">
        <input type="search" name ="search-bar" placeholder="Rechercher un produit">
        <button id="loop" type="submit" name="search"><i class="fas fa-search"></i></button>
    </form>
        <ul class="price">
            <li>
                <a href=""><img src="Assets/Images/cart.svg" alt="cart-photo"></a>(<?php if (isset($_SESSION['total'])) {
                    echo $_SESSION['total'];
                }else echo 0; ?>€)</li>
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
            }
        ?>
            


            <div class="product_solo">
                <div class="product_img" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-8-1024x1024.jpg);">
                    
                </div>
                <p class="titre">Basket with handles</p>
                <p class="prix">13€</p>
            </div> -->
            
        </section>
        <!-- |||||||||| END PRODUCTS |||||||||| -->

        <!-- |||||||||| START BUTTON SHOW MORE PRODUCTS |||||||||| -->
        <section class="button">
            <div>
                <button>Voir tous les Produits</button>
            </div>
        </section>
        <!-- |||||||||| END BUTTON SHOW MORE PRODUCTS |||||||||| -->
        <br><br><br><br><br>
    </main>
    <footer>
      
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
</body>

</html>