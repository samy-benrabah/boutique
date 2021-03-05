<?php
session_start();
require '../../Class/user.php';

$user = new User();
$msg = '';
$msg_valid = '';
$title_inscription = '';
$title_reset = '';
include '../../Assets/HTML/admin/mail.php';
if (isset($_POST['valider_register'])) {
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $userName = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $password = htmlspecialchars(trim($_POST['password']));
    $adress = htmlspecialchars(trim($_POST['adress']));
    $zip = htmlspecialchars(trim($_POST['zip']));
    $city = htmlspecialchars(trim($_POST['city']));
    $country = htmlspecialchars(trim($_POST['country']));

    
    $msg = $user->register($firstName, $lastName, $userName, $email,$phone, $password, $adress, $zip, $city, $country);

}
if (isset($_POST['valider_conn'])) {
    $username = htmlspecialchars(trim($_POST['useremail']));
    $email = filter_var(trim($_POST['useremail']), FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars(trim($_POST['password']));
    $msg = $user->connexion($username, $email, $password);
    
}
if (isset($_POST['valider_reinilisation'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $user->getNewPassword($email,$message);
    
}
?>

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
                <p><?php
if (!empty($_GET['block']) == '') {
    echo "Connexion";
} else {
    echo $_GET['block'];
}
?></p>
            </div>
        </section>
        <section class="register_block">
        <div>
                <?php if ($msg) {?>
                    <p class = "err_msg"><strong> <?=$msg;?></strong> </p>
                <?php }?>

                    </div>
        <?php
if (isset($_GET['block']) == '') {
    $block = '<div class="full-form">
                    <form class="connexion" action="" method="post">
                        <p>Connexion</p>
                        <br><br>
                        <input type="text" name="useremail" id="user" placeholder="User ou Email">
                        <br><br>
                        <input type="password" name="password" id="password" placeholder="Password">
                        <br><br>
                        <input type="submit" name="valider_conn" value="Connexion">
                        <div class="block_bottom">
                            <a href="connexion.php?block=Inscription">Inscription</a>
                            <a href="connexion.php?block=Reinitialisation">Mot de passe oublié?</a>
                        </div>
                    </form>';

} elseif (($_GET['block']) == 'Inscription') {
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
                <input type="text" name="phone" id="phone" placeholder="12 34 56 78 90" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}">
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
                    <a href="connexion.php?block=Reinitialisation">Mot de passe oublié?</a>
                </div>
            </form>';
} elseif (($_GET['block']) == 'Reinitialisation') {
    $block = '
            <form class="connexion" action="" method="post">
                <p>RÉINITIALISER LE MOT DE PASSE</p>
                <br>
                <input type="email" name="email" id="email" placeholder="Votre adresse email">
                <br>
                <input type="submit" onClick="sendEmail()" name="valider_reinilisation" value="Envoyer un nouveau mot de passe ">
                <div class="block_bottom">
                    <a href="connexion.php">Connexion</a>
                    <a href="connexion.php?block=Inscription">Inscription</a>
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