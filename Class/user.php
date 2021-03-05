<?php

class User
{
    private $pdo;
    private $username;
    private $password;
    private $email;

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

    public function register($firstName, $lastName, $userName, $email, $password, $adress, $zip, $city, $country)
    {
        $stmt_select = $this->pdo->prepare("SELECT email FROM users WHERE email = ?");
        $stmt_select->bindParam(1, $email);
        $stmt_select->execute();
        $stmt_select->fetchAll(PDO::FETCH_OBJ);
        $row = $stmt_select->rowCount();
        if (!$row) {
            if (!empty($firstName) || !empty($lastName) || !empty($userName) || !empty($email) || !empty($password) || !empty($adress) || !empty($zip) && !empty($city) || !empty($country)) {
                $crypted = password_hash($password, PASSWORD_BCRYPT);
                $date_register = date("Y-m-d H:i:s");
                $stmt_insert = $this->pdo->prepare("INSERT INTO users(first_name, last_name, username, email, password, adress, zip, city,country,registre_date) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $stmt_insert->bindParam(1, $firstName, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(2, $lastName, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(3, $userName, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(4, $email, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(5, $crypted, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(6, $adress, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(7, $zip, PDO::PARAM_INT);
                $stmt_insert->bindParam(8, $city, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(9, $country, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(10, $date_register, PDO::PARAM_STR, 12);
                $stmt_insert->execute();
                header("Location:connexion.php");
            } else {
                $msg = "Remplisser le formulaire";
            }
        } else {
            $msg = "Cette adresse email existe déjà";
        }
        return $msg;
    }

    public function connexion($username, $email, $password)
    {
        $this->email = filter_var(trim($email), FILTER_VALIDATE_EMAIL);
        $this->username = htmlspecialchars(trim($username));
        $stmt_select1 = $this->pdo->prepare("SELECT  username FROM users WHERE username = ? ");
        $stmt_select1->bindParam(1, $this->username, PDO::PARAM_STR, 12);
        $stmt_select1->execute();
        $row1 = $stmt_select1->fetch(PDO::FETCH_OBJ);

        if (!empty($username) && empty($email)) {
            if ($row1->username == $this->username) {
                $stmt_select3 = $this->pdo->prepare("SELECT password FROM users WHERE username = ? ");
                $stmt_select3->bindParam(1, $this->username, PDO::PARAM_STR, 12);
                $stmt_select3->execute();
                $row3 = $stmt_select3->fetch(PDO::FETCH_OBJ);
                $verif_pass = password_verify($password, $row3->password);
                if ($verif_pass == $password) {
                    header('Location:shop.php');
                } else {
                    $msg = "Mauvais mot de passe";
                }
            } else {
                $msg = "Identifiant non répertorié";
            }
        }

        $stmt_select2 = $this->pdo->prepare("SELECT  email FROM users WHERE email = ? ");
        $stmt_select2->bindParam(1, $this->email, PDO::PARAM_STR, 12);
        $stmt_select2->execute();
        $row2 = $stmt_select2->fetch(PDO::FETCH_OBJ);

        if (!empty($email)) {
            if ($row2->email == $this->email) {
                $stmt_select3 = $this->pdo->prepare("SELECT password FROM users WHERE email = ? ");
                $stmt_select3->bindParam(1, $this->email, PDO::PARAM_STR, 12);
                $stmt_select3->execute();
                $row3 = $stmt_select3->fetch(PDO::FETCH_OBJ);
                $verif_pass = password_verify($password, $row3->password);
                if ($verif_pass == $password) {
                    header('Location:shop.php');
                } else {
                    $msg = "Mauvais mot de passe";
                }
            } else {
                $msg = "Identifiant non répertorié";
            }
        }

        if (empty($email) && empty($username)) {
            $msg = "Remplissez le formulaire";
        }

        return $msg;
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
            $message = "Voici votre nouveau mot de passe : $password";
            // L'entête qui permet de reconnaître le type de fichier envoyé
            $header = 'From:testemailsb13@gmail.com';

            $subject = "Mot de passe oublié";
                
                 
            

            // $header = 'Content-Type:text/html ; charset="utf-8"' . " ";
            if (mail($email, $subject, $message, $header)) {
                //Requête de mise a jour de mon mot de passe à l'email existant dans ma bdd
                // $stmt_update = $this->pdo->prepare("UPDATE users SET password=? WHERE email=?");
                // $stmt_update->execute([$hash, $email]);
                echo "Mail envoyé";

                
            } else {echo "Votre email ne possède pas le bon format";}

        } else {echo "Veullez remplir le champs";}
        
       var_dump (mail($email, $subject, $message, $header));
    }

    // public function getNewPassword($email)
    // {
        
    //     $recipient = $email;
        
    //     $subject = "php mail test";
    //     $message = "php test message";
    //     $headers = 'From:testemailsb13@gmail.com\r\n
    //                 Reply-To:testemailsb13@gmail.com' ;
        
    //     if (mail($recipient, $subject, $message, $headers))
    //     {
    //         echo "Message accepted";
    //     }
    //     else
    //     {
    //         echo "Error: Message not accepted";
    //     }
    // }
}
