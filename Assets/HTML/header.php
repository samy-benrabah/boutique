<?php
session_start();
?>

<link rel="stylesheet" href="../CSS/header-footer.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<header>
    <ul>
        <li><a href="">Accueil</a></li>
        <li><a href="">Nos Produits</a></li>
        <li><a href="">TOP Produits</a></li>
        <li><a href="">Nouveautés</a></li>
    </ul>
    <h1>D&CODE</h1>
    <form action="search.php" method="get">
        <input type="search" name ="search-bar" placeholder="Rechercher un produit">
        <button id="loop" type="submit" name="search"><i class="fas fa-search"></i></button>
    </form>
    <ul class="price">
        <li><a href="panier.php"><img src="../Images/cart.svg" alt="cart-photo"></a>(<?php include  "price_panier.php" ?>€)</li>
        <li><a href="profil.php"><img src="../Images/user.svg" alt="cart-photo"></a>(Login)</li>
    </ul>
</header>

