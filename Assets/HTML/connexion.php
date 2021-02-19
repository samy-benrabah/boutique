<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d34f22fe3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/morad.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <title>Document</title>
</head>

<body>
    <?php require '../HTML/header.php'?>


    <main class="main_img">
        <section>
            <div class="image_back">
                <p>Connexion</p>
            </div>
        </section>

        <section class="register_block">
        <?php
if (!empty($_GET['block']) == '') {
    $block = '
            <form class="connexion" action="" method="post">
                <p>Connexion</p>
                <br><br>
                <input type="text" name="user" id="user" placeholder="User ou email">
                <br><br>
                <input type="password" name="password" id="password" placeholder="Password">
                <br><br>
                <input type="submit" name="valider_conn" value="Connexion">
                <div class="block_bottom">
                    <a href="connexion.php?block=inscription">Inscription</a>
                    <a href="connexion.php?block=mdp_oublie">Mot de passe oublié?</a>
                </div>
            </form>';
} elseif ($_GET['block'] == 'inscription') {
    $block = '
            <form class="connexion" action="" method="post">
                <p>Inscription</p>
                <br>
                <input type="text" name="first_name" id="first_name" placeholder="Votre nom">
                <br>
                <input type="text" name="last_name" id="last_name" placeholder="Votre prénom">
                <br>
                <input type="text" name="username" id="username" placeholder="Username">
                <br>
                <input type="email" name="email" id="email" placeholder="Votre adresse email">
                <br>
                <input type="text" name="adress" id="adress" placeholder="Votre adresse">
                <br>
                <input type="number" name="zip" id="zip" placeholder="Code postal">
                <br>
                <input type="text" name="city" id="city" placeholder="Ville">
                <br>
                <input type="text" name="country" id="country" placeholder="Pays">
                <br>
                <input type="password" name="password" id="password" placeholder="Password">
                <br>
                <input type="submit" name="valider_register" value="Inscription">
                <div class="block_bottom">
                    <a href="connexion.php">Connexion</a>
                    <a href="connexion.php?block=mdp_oublie">Mot de passe oublié?</a>
                </div>
            </form>';
} elseif ($_GET['block'] == 'mdp_oublie') {
    $block = '
            <form class="connexion" action="" method="post">
                <p>RÉINITIALISER LE MOT DE PASSE</p>
                <br><br>
                <input type="email" name="email" id="email" placeholder="Votre adresse email">
                <br><br>
                <input type="submit" name="valider_conn" value="Réinitialiser">
                <div class="block_bottom">
                    <a href="connexion.php">Connexion</a>
                    <a href="connexion.php?block=inscription">inscription</a>
                </div>
            </form>';
}
echo $block;
?>
        </section>
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