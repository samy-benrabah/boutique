




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/profil.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">

    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>
    <title>Profil</title>
</head>
<body>
<?php
include 'header.php';

if (isset($_SESSION['user'])!=true) {
    header('Location:connexion.php');
}

require '../../Class/user.php';
require '../../Class/product.php';
$profil = new User();
$product= new Product();
$tab=$product->storyBuy($_SESSION['user']->id);
$msg='';

if (isset($_POST['valider_username']) && !empty($_POST['new-username'])) {
    $newUsername=htmlspecialchars(trim($_POST['new-username']));
    $profil->updateProfilUsername($newUsername,$_SESSION['user']->id);
}

    if (isset($_POST['valider_email']) && !empty(trim($_POST['new-email']))) {
        $newEmail=trim(filter_var ($_POST['new-email'],FILTER_VALIDATE_EMAIL));
        $msg=$profil->updateProfilEmail($newEmail,$_SESSION['user']->id);
        
    }
    if (isset($_POST['valider_adress']) && !empty($_POST['new-adress'])) {
    $newAdress=htmlspecialchars(trim($_POST['new-adress']));
    $msg=$profil->updateProfilAdress($newAdress,$_SESSION['user']->id);
}

if (isset($_POST['valider_phone']) && !empty($_POST['new-phone'])) {
    $newPhone=htmlspecialchars(trim($_POST['new-phone']));
    $profil->updateProfilPhone($newPhone,$_SESSION['user']->id);
}

if (isset($_POST['valider_password']) && !empty($_POST['new-password'])) {
    $newPassword=htmlspecialchars(trim($_POST['new-password']));
    $profil->updateProfilPassword($newPassword,$_SESSION['user']->id);
}

if (isset($_POST['valider_zip']) && !empty($_POST['new-zip'])) {
    $newZip=trim(filter_var($_POST['new-zip'],FILTER_VALIDATE_INT));
    $profil->updateProfilZip($newZip,$_SESSION['user']->id);
}
if (isset($_POST['valider_city']) && !empty($_POST['new-city'])) {
    $newCity=htmlspecialchars(trim($_POST['new-city']));
    $profil->updateProfilCity($newCity,$_SESSION['user']->id);
}
if (isset($_POST['valider_country']) && !empty($_POST['new-country'])) {
    $newCountry=htmlspecialchars(trim($_POST['new-country']));
    $profil->updateProfilCountry($newCountry,$_SESSION['user']->id);
}
?>
    <main>

         <!-- DEBUT SECTION 1 -->
        <section class="section1">
            <div class="img-background" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/faq-title-img.jpg)" alt="img-background">
                <p>Profil </p>
            </div>
        </section>
         <!-- FIN SECTION 1 -->
                <!-- DEBUT SECTION 2 -->
        <section class="section2">
            <!-- DEBUT FULL PROFIL -->
            <div class="full-profil">
           
                <div class="welcome-login">
                            <p>Bonjour <strong><?= $_SESSION['user']->username?> !</strong></p>
                </div>
                <div class="full-story">
                <?php 
                foreach ($tab as $key) {
              echo  
               ' 
                    <div class ="story_buy">
                        <p>Nom: '.$key->title.'</p> 
                        <p>Prix: '.$key->price.'$</p> 
                        <p>Quantité: '.$key->quantity.'</p>  
                        <p>Total: '.$key->quantity*$key->price.'$</p>     
                        <p>Date: '.$key->order_date.'</p>           
                    </div>
                    
                ';
            } ?>
            </div>
                <p class="msg"><?php if (isset($_POST['valider_email'])) {
                        echo $msg;
                    }  ?></p>
                 <!-- DEBUT SOUS FULL PROFIL -->
                 <div class="sous_full-profil">
            <!-- DEBUT PROFIL LEFT -->
                   <div class="profil-left">
                    
                    <div class="modification-profil">
                        <?php
$username = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre username :'.  $_SESSION['user']->username . '</p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_name" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_name'])) {

    $username = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="text" name="new-username" id="new-username" placeholder='.$_SESSION['user']->username.'>
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_username" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $username;

$email = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre adresse email  :' . $_SESSION['user']->email.'
                                </p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_email" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_email'])) {

    $email = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="email" name="new-email" id="new-email" placeholder=' . $_SESSION['user']->email.'>
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_email" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $email;

$adresse = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre adresse : ' . $_SESSION['user']->adress.'
                                </p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_adresse" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_adresse'])) {

    $adresse = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="text" name="new-adress" id="new-adress" placeholder='.$_SESSION['user']->adress.'>
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_adress" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $adresse;

$phone = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre numero de telephone : '.  $_SESSION['user']->phone .'</p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_phone" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_phone'])) {

    $phone = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="tel" name="new-phone" id="new-phone" placeholder= "12 34 56 78 90 " pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}">
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_phone" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $phone;



?>
                    </div>


                </div>
                <!-- FIN PROFIL LEFT -->
                <!-- DEBUT PROFIL RIGHT -->
                <div class="profil-right">
                    
                    <div class="modification-profil">
                        <?php
$password = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Souhaiter vous modifier votre mot de passe ?</p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_password" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_password'])) {

    $password = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="password" name="new-password" id="new-username" placeholder="Entrez votre nouveau mot de passe">
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_password" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $password;

$zip = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre adresse postal  :' . $_SESSION['user']->zip.'
                                </p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_zip" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_zip'])) {

    $zip = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="number" name="new-zip" id="new-zip" placeholder=' . $_SESSION['user']->zip.'>
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_zip" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $zip;

$city = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre ville : ' . $_SESSION['user']->city.'
                                </p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_city" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_city'])) {

    $city = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="text" name="new-city" id="new-city" placeholder='.$_SESSION['user']->city.'>
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_city" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $city;

$country = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre pays : '.  $_SESSION['user']->country .'</p>
                            </div>

                                <div class="button">
                                    <input type="submit" name="modifier_country" value="MODIFIER">
                                </div>
                            </form>
                        </div>';
if (isset($_POST['modifier_country'])) {

    $country = '<div class="text-button">
                                                <form action="" method="post">
                                                    <div class="text">
                                                        <input type="text" name="new-country" id="new-country" placeholder= '.$_SESSION['user']->country.' >
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider_country" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $country;



?>
                    </div>


                </div>
                <!-- FIN PROFIL RIGHT -->
                </div>
                <!-- FIN SOUS FULL PROFIL -->
            </div>
            <!-- FIN FULL PROFIL -->
            
        </section>
                <!-- FIN SECTION 2 -->
    </main>
    
        <?php
include 'footer.php'
?>
    
</body>
</html>