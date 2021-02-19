<?php

require '../../Class/product.php';
$product = new Product();

<<<<<<< HEAD
if (isset($_POST['add_to_db'])) {
    $file = $_FILES['image'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../Images/products/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $send = $product->add_product($fileNameNew, $_POST['title'], $_POST['description'], $_POST['price'], date("Y-m-d"), $_POST['categorie'], 1, $_FILES['image']);
                echo "image envoyer";
            } else {
                echo "Votre image est très grande";
            }
        } else {
            echo "Il y'a un probleme de telechargement";
        }
    } else {
        echo "Veuillez chosir un format de type png, jpg ou jpeg";
=======
    if (isset($_POST['add_to_db'])) {
        $send = $product -> add_product($_POST['title'],$_POST['description'],$_POST['price'],date("Y-m-d"),$_POST['categorie'],2,$_FILES['image']);
>>>>>>> prod
    }
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d34f22fe3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <link rel="stylesheet" href="../CSS/morad.css">
    <title>Document</title>
</head>

<body>
    <!-- <?php include 'Assets/HTML/header.php'?> -->
    <header>
        <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="">Nos Produits</a></li>
            <li><a href="">TOP Produits</a></li>
            <li><a href="">Nouveautés</a></li>
        </ul>
        <h1>D&CODE</h1>
        <ul class="price">
            <li><a href=""><img src="../Images/cart.svg" alt="cart-photo"></a>(0€)</li>
            <li><a href=""><img src="../Images/user.svg" alt="cart-photo"></a>(Login)</li>
        </ul>
    </header>

    <main>
        <!-- ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ START PRODUCTS ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ -->
        <section class="categories">

            <div class="categorie_solo">
                <a href="admin.php?articles#block">
                    <div class="categorie_img">
                        <img src="../Images/box.svg" alt="photo box">
                    </div>
                    <p class="titre">Les articles</p>
                </a>
            </div>

            <div class="categorie_solo">
                <a href="admin.php?utilisateurs#block">
                    <div class="categorie_img">
                        <img src="../Images/group.svg" alt="photo box">
                    </div>
                    <p class="titre">Les utilisateur</p>
                </a>
            </div>
            <div class="categorie_solo">
                <a href="admin.php?commandes#block">
                    <div class="categorie_img">
                        <img src="../Images/cart.svg" alt="photo box">
                    </div>
                    <p class="titre">Les commandes</p>
                </a>
            </div>
            <div class="categorie_solo">
                <a href="admin.php?reductions#block">
                    <div class="categorie_img">
                        <img src="../Images/coupon (1).svg" alt="photo box">
                    </div>
                    <p class="titre">Les réductions</p>
                </a>
            </div>
            <div class="categorie_solo">
                <a href="admin.php?categories#block">
                    <div class="categorie_img">
                        <img src="../Images/list.svg" alt="photo box">
                    </div>
                    <p class="titre">Les categories</p>
                </a>
            </div>
            <div class="categorie_solo">
                <a href="admin.php?sliders#block">
                    <div class="categorie_img">
                        <img src="../Images/slider.svg" alt="photo box">
                    </div>
                    <p class="titre">Les sliders</p>
                </a>
            </div>
        </section>
        <!-- ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ END PRODUCTS ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ -->
        <br><br><br><br><br>
        <!-- ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ START BLOCK LES ARTICLES ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ -->
        <?php

if (isset($_GET['articles'])) {
    include 'admin/articles.php';
} elseif (isset($_GET['utilisateurs'])) {
    include 'admin/utilisateurs.php';
} elseif (isset($_GET['reductions'])) {
    include 'admin/reductions.php';
} elseif (isset($_GET['sliders'])) {
    include 'admin/sliders.php';
} elseif (isset($_GET['commandes'])) {
    include 'admin/commandes.php';
} elseif (isset($_GET['categories'])) {
    include 'admin/categories.php';
}
?>
        <!-- ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ END BLOCK LES ARTICLES ‡‡‡‡‡‡‡‡‡‡‡‡‡‡ -->
    </main>
    <footer>
        <!-- <?php include 'Assets/HTML/footer.php'?> -->
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