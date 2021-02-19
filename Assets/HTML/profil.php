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
?>
    <main>

         <!-- DEBUT SECTION 1 -->
        <section class="section1">
            <div class="img-background" style="background-image:url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/faq-title-img.jpg)" alt="img-background">
                <p><strong>PANIER</strong> </p>
            </div>
        </section>
         <!-- FIN SECTION 1 -->
                <!-- DEBUT SECTION 2 -->
        <section class="section2">
            <!-- DEBUT FULL PROFIL -->
            <div class="full-profil">
            <!-- DEBUT PROFIL LEFT -->
                <div class="profil-left">
                    <div class="welcome-login">
                        <p>Bonjour Morad!</p>
                    </div>
                    <div class="modification-profil">
                        <?php
$username = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre username : Morad</p>
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
                                                        <input type="text" name="new-username" id="new-username" value="Morad">
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $username;

$email = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre adresse email  : Morad@labrid.khra
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
                                                        <input type="email" name="new-email" id="new-email" value="Morad@labrid.khra">
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $email;

$adresse = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre adresse email  : Morad@labrid.khra
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
                                                        <input type="text" name="new-adresse" id="new-adresse" value="8 rue d\'hozier">
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider" value="VALIDER">
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>';

}
echo $adresse;

$phone = '<div class="text-button">
                        <form action="" method="post">
                            <div class="text">
                                <p>Votre numero de telephone : 07 73 32 20 09</p>
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
                                                        <input type="text" name="new-phone" id="new-phone" value="07 73 32 20 09">
                                                    </div>
                                                    <div>
                                                        <div class="button">
                                                            <input type="submit" name="valider" value="VALIDER">
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

            </div>
            <!-- FIN FULL PROFIL -->
        </section>
                <!-- FIN SECTION 2 -->
    </main>
    <footer>
        <?php
include 'footer.php'
?>
    </footer>
</body>
</html>