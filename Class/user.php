<?php


class User
{
    private $pdo;
    private $username;
    private $password;
    private $email;
    private $newEmail;

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

    public function register($firstName, $lastName, $userName, $email,$phone, $password, $adress, $zip, $city, $country)
    {
        $stmt_select = $this->pdo->prepare("SELECT email FROM users WHERE email = ?");
        $stmt_select->bindParam(1, $email);
        $stmt_select->execute();
        $stmt_select->fetchAll(PDO::FETCH_OBJ);
        $row = $stmt_select->rowCount();
        if (!$row) {
            if (!empty($firstName) && !empty($lastName) && !empty($userName) && !empty($email) && !empty($phone) && !empty($password) && !empty($adress) && !empty($zip) && !empty($city) && !empty($country)) {
                $crypted = password_hash($password, PASSWORD_BCRYPT);
                $date_register = date("Y-m-d H:i:s");
                $stmt_insert = $this->pdo->prepare("INSERT INTO users(first_name, last_name, username, email,phone, password, adress, zip, city,country,registre_date) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $stmt_insert->bindParam(1, $firstName, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(2, $lastName, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(3, $userName, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(4, $email, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(5, $phone, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(6, $crypted, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(7, $adress, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(8, $zip, PDO::PARAM_INT);
                $stmt_insert->bindParam(9, $city, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(10, $country, PDO::PARAM_STR, 12);
                $stmt_insert->bindParam(11, $date_register, PDO::PARAM_STR, 12);
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
        $this->password = htmlspecialchars(trim($password));
        $stmt_select1 = $this->pdo->prepare("SELECT * FROM users WHERE  username = ? ");
        $stmt_select1->bindParam(1, $this->username, PDO::PARAM_STR, 12);
        $stmt_select1->execute();
        $row1 = $stmt_select1->fetch(PDO::FETCH_OBJ);

        if (!empty($username) && empty($email) && !empty($password)) {
            if ($row1->username == $this->username) {
                $stmt_select3 = $this->pdo->prepare("SELECT password FROM users WHERE username = ? ");
                $stmt_select3->bindParam(1, $this->username, PDO::PARAM_STR, 12);
                $stmt_select3->execute();
                $row3 = $stmt_select3->fetch(PDO::FETCH_OBJ);
                $verif_pass = password_verify($password, $row3->password);
                if ( $verif_pass == $password) {
                    $this->id=$row1->id;
                    $_SESSION['user']=$row1;
                    header('Location:shop.php');
                } else {
                    $msg = "Mauvais mot de passe";
                }
            } else {
                $msg = "Identifiant non répertorié";
            }
        }  else {
            $msg = "Remplissez le formulaire";
        }
        



        $stmt_select2 = $this->pdo->prepare("SELECT * FROM users WHERE  email = ? ");
        $stmt_select2->bindParam(1, $this->email, PDO::PARAM_STR, 12);
        $stmt_select2->execute();
        $row2=$stmt_select2->fetch(PDO::FETCH_OBJ);

        if (!empty($email) && !empty($password)) {
            if ($row2->email == $this->email) {
                $stmt_select3 = $this->pdo->prepare("SELECT password FROM users WHERE email = ? ");
                $stmt_select3->bindParam(1, $this->email, PDO::PARAM_STR, 12);
                $stmt_select3->execute();
                $row3 = $stmt_select3->fetch(PDO::FETCH_OBJ);
                $verif_pass = password_verify($password, $row3->password);
                if ($verif_pass == $password) {
                    $this->id=$row2->id;
                    
                    $_SESSION['user']=$row2;
                    header('Location:shop.php');
                } else {
                    $msg = "Mauvais mot de passe";
                }
            } else {
                $msg = "Identifiant non répertorié";
            }
        } else {
            $msg = "Remplissez le formulaire";
        }

        return $msg;
    }




    public function updateProfilUsername ($newUsername,$id) 
    {
        
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET username = ? WHERE id = ? ");
                    $stmt_update->execute([$newUsername,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE username = ?");
                    $stmt_select->execute([$newUsername]);
                    $row_username=$stmt_select->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']=$row_username;
                    
                
             
    }

    public function updateProfilEmail ($newEmail,$id) 
    {
        if ($newEmail!=$_SESSION['user']->email) {
            $stmt_update=$this->pdo->prepare("UPDATE users SET email = ? WHERE id = ? ");
        $stmt_update->execute([$newEmail,$id]);

        $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE email = ? ");
        $stmt_select->execute([$newEmail]);
        $row_email=$stmt_select->fetch(PDO::FETCH_OBJ);
        $_SESSION['user']=$row_email;
        }else{
            $msg="Cette email existe déjà veuillez changer d'email";
            return $msg;
            }
             
    }
         
    
    public function updateProfilAdress ($newAdress,$id) 
    {
        
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET adress = ? WHERE id = ? ");
                    $stmt_update->execute([$newAdress,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE adress = ?");
                    $stmt_select->execute([$newAdress]);
                    $row_adress=$stmt_select->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']=$row_adress;
                
             
    }


    public function updateProfilPhone ($newPhone,$id) 
    {
        
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET phone = ? WHERE id = ? ");
                    $stmt_update->execute([$newPhone,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE phone = ?");
                    $stmt_select->execute([$newPhone]);
                    $row_phone=$stmt_select->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']=$row_phone;
                
             
    }

    public function updateProfilPassword ($newPassword,$id) 
    {
                    $crypted=password_hash($newPassword,PASSWORD_BCRYPT);
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET password = ? WHERE id = ? ");
                    $stmt_update->execute([$crypted,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE password = ?");
                    $stmt_select->execute([$newPassword]);
                    $row_password=$stmt_select->fetch(PDO::FETCH_OBJ);
                    
                
             
    }
       
          
    public function updateProfilZip ($newZip,$id) 
    {
        
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET zip = ? WHERE id = ? ");
                    $stmt_update->execute([$newZip,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE zip = ?");
                    $stmt_select->execute([$newZip]);
                    $row_zip=$stmt_select->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']=$row_zip;
                
             
    }  

             public function updateProfilCity ($newCity,$id) 
    {
        
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET city = ? WHERE id = ? ");
                    $stmt_update->execute([$newCity,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE city = ?");
                    $stmt_select->execute([$newCity]);
                    $row_city=$stmt_select->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']=$row_city;
                
             
    }     
    public function updateProfilCountry ($newCountry,$id) 
    {
        
                
                    $stmt_update=$this->pdo->prepare("UPDATE users SET country = ? WHERE id = ? ");
                    $stmt_update->execute([$newCountry,$id]);
                    

                    $stmt_select=$this->pdo->prepare("SELECT * FROM users WHERE country = ?");
                    $stmt_select->execute([$newCountry]);
                    $row_country=$stmt_select->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']=$row_country;
                
             
    }   


}
