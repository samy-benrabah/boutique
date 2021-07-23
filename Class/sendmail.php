<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

class Mail
{
    public function __construct()
    {
        //$this->pdo = require '../Config/db_conn.php';
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=boutique', "root", ""); // PDO Driver DSN. Throws A PDOException.
        } catch (PDOException $Exception) {
            // Note The Typecast To An Integer!
            throw new MyDatabaseException($Exception->getMessage(), (int) $Exception->getCode());
        }
        $this->pdo = $pdo;
    }

    public function getNewPassword($email)
    {
        //---------- Je verifie si l'input est rempli
        if (!empty($email)) {

            //------- Uniquid génère un identifiant unique
            $password = uniqid();
            //------ Si mon mot de mot de passe a était généré je le hash
            $hash = password_hash($password, PASSWORD_BCRYPT);
            //----- Je prepare un message a en envoyer au destinataire avec le nouveau mot de passe


            //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function


            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings                     //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'testemailsb13@gmail.com';                     //SMTP username
                $mail->Password   = '/testemailsb13/';                            //SMTP password
                $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 465;
                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('testemailsb13@gmail.com', 'D&Code');
                $mail->addAddress($email);              //Name is optional
                $mail->addReplyTo('no-reply@gmail.com', 'No reply');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reinitialisation mot de passe';
                $mail->Body    = $message = '<div style="border: 2px solid black;">
                    <h1 style="background: black;
                    height: 40px;
                    width: 100%;
                    text-align: center;
                    color: white;">Votre nouveau mot de passe</h1>
                    <p style="text-align: center;
                    font-size: 25px;">' . $password . '</p>
                    <a href="www.google.com" style="background: black;
                    padding: 10px 25px;">voir plus</a>
                    </div>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // Requête de mise a jour de mon mot de passe à l'email existant dans ma bdd
                $stmt_update = $this->pdo->prepare("UPDATE users SET password=? WHERE email=?");
                $stmt_update->execute([$hash, $email]);

                header("Location:connexion.php");
            } catch (Exception $e) {
                echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        $msg = "Remplissez le formulaire";
        return $msg;
    }

    public function getPromoRegister()
    {
    }
}
