<?php

    class product{

        private $id;
        public $pdo;
        public $msg;


        public function __construct()
        {
            //$this->pdo = require '../Config/db_conn.php';
        }




        public function add_product($image, $title, $description, $price, $product_date, $id_categorie, $id_creator, $file){
            $conn = new PDO('mysql:host=localhost;dbname=boutique', "root", "");
            
            if (!empty($image & $title & $description & $price & $product_date & $id_categorie & $id_creator)) {
                
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed  =array('jpg', 'jpeg', 'png');

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 1000000) {
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            $fileDestination = '../Images/products/'.$fileNameNew;
                            move_uploaded_file($fileTmpName ,$fileDestination);
                        
                            $insert = $conn->prepare('INSERT INTO products(image, title, description, price, product_date, id_categorie, id_creator) VALUES(:image, :title, :description, :price, :product_date, :id_categorie, :id_creator)');
                            $insert -> bindParam('image', $fileNameNew);
                            $insert -> bindParam('title', $title);
                            $insert -> bindParam('description', $description);
                            $insert -> bindParam('price', $price);
                            $insert -> bindParam('product_date', $product_date);
                            $insert -> bindParam('id_categorie', $id_categorie);
                            $insert -> bindParam('id_creator', $id_creator);
                            $insert -> execute();
                            $this->msg = "image envoyer";
                        }else {
                            $this->msg = "Votre image est très grande";
                        }
                    }else {
                        $this->msg = "Il y'a un probleme de telechargement";
                    }
                }else {
                    $this->msg = "Veuillez chosir un format de type png, jpg ou jpeg";
                }
            }else $this->msg = "veuillez remplir tous les champ";
        }



    }








?>