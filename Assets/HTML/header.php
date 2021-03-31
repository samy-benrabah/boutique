<?php
session_start();
if (isset($_POST["unset"])) {
    unset($_SESSION['user']);
    header('Location:connexion.php');
}
if (isset($_POST["unset_admin"])) {
    unset($_SESSION['admin']);
    header('Location:connexion.php');
}
?>

<link rel="stylesheet" href="../CSS/header-footer.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<header>
    <div>
        <i id="open" class="fas fa-bars"></i>
        <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="">Nos Produits</a></li>
            <li><a href="">TOP Produits</a></li>
            <li><a href="">Nouveautés</a></li>
            <form class="formMini" action="search.php" method="get">
                <input type="search" name ="search-bar" placeholder="Rechercher un produit">
                <button id="loop" type="submit" name="search"><i class="fas fa-search"></i></button>
            </form>
        </ul>
    </div>
    <h1>D&CODE</h1>
    <form class="formBig" action="search.php" method="get">
        <input type="search" name ="search-bar" placeholder="Rechercher un produit">
        <button id="loop" type="submit" name="search"><i class="fas fa-search"></i></button>
    </form>
    <ul class="price">
        <?php 
        if (isset($_SESSION['user'])) {
           echo "<li><a href='panier.php'><img src='../Images/cart.svg' alt='cart-photo'>(0$)</a></li>
           <li><a href='profil.php'><img src='../Images/user.svg' alt='cart-photo'>(".$_SESSION['user']->username.")</a></li>
          <form method='post'>
          <input name='unset' type='submit' value='Deconnexion'>
          </form>
          
          ";
          
        }
        elseif (isset($_SESSION['admin'])) {
            echo "<li><a href='panier.php'><img src='../Images/cart.svg' alt='cart-photo'>(0$)</a></li>
            <li><a href='profil.php'><img src='../Images/user.svg' alt='cart-photo'>(".$_SESSION['admin']->username .' '.'<p>administrateur</p>'.")</a></li>
           <form method='post'>
           <input name='unset_admin' type='submit' value='Deconnexion'>
           </form>";
          }
        else {
            echo "<li><a href='panier.php'><img src='../Images/cart.svg' alt='cart-photo'></a>(0€)</li>
            <li><a href='connexion.php'><img src='../Images/user.svg' alt='cart-photo'>(Connexion)</a></li>
            ";
        }
        
         ?>
        
        
        
    </ul>
</header>

