<?php
// $path="As"
require '../../Class/product.php';
$show_product = new Product();
$tab = $show_product->showProduct();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/shop.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <!-- <link rel="stylesheet" href="../CSS/morad.css"> -->
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>
    <title>Shop</title>
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
        <div>
            <p>Home/Shop List</p>
        </div>
    </section>
    <section class="section2">
        <?php
foreach ($tab as $product) {?>
                <div  class ="product">

                    <div class="product-img">
                        <img src="../Images/products/<?=$product->image;?>">
                    </div>

                                <h4><?=$product->title?></h4>
                                    <p><?=$product->price . ' $'?></p>

                </div>
                </div>
         <?php }
?>


    </section>
    <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->

</main>
<footer>
<?php
require '../HTML/footer.php';
?>
</footer>
</body>
</html>
