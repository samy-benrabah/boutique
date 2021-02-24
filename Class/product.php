<?php

class Product
{

    private $id;
    private $pdo;
    public $msg;

    public function __construct()
    {
        //$this->pdo = require '../Config/db_conn.php';
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=boutique', "root", "");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $this->pdo = $pdo;
        
    }

    
    // ------------------------------------------------------------------------------------------+
    //  FUNCTION Pour ajouter les produits dans la base de donnée  / Morad                       |
    // ------------------------------------------------------------------------------------------+
    public function add_product($title, $description, $price, $product_date, $id_categorie, $id_creator, $file){
        
        if (!empty($title & $description & $price & $product_date & $id_categorie)) {
            
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
                    
                        $insert = $this->pdo->prepare('INSERT INTO products(image, title, description, price, product_date, id_categorie, id_creator) VALUES(:image, :title, :description, :price, :product_date, :id_categorie, :id_creator)');
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


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour modifier les produits dans la base de donnée  / Morad                      |
    // ------------------------------------------------------------------------------------------+
    public function edit_product($title, $description, $price, $id_categorie,$id_product){
        
        $maj = $this->pdo->prepare("UPDATE products SET title=:title, description=:description, price=:price, id_categorie=:id_categorie WHERE id=$id_product");
        $maj -> bindParam('title', $title);
        $maj -> bindParam('description', $description);
        $maj -> bindParam('price', $price);
        $maj -> bindParam('id_categorie', $id_categorie);
        $maj -> execute();
        $this->msg = "Mise a jour ok";
        
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour modifier les Categories dans la base de donnée  / Morad                    |
    // ------------------------------------------------------------------------------------------+
    public function edit_categorie($title, $description,$id_categorie){
        
        $maj = $this->pdo->prepare("UPDATE categories SET categorie_title=:title, description_title=:description WHERE id_cat=$id_categorie");
        $maj -> bindParam('title', $title);
        $maj -> bindParam('description', $description);
        $maj -> execute();
        $this->msg = "Mise a jour ok";
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Supprimer les produits dans la base de donnée  / Morad                     |
    // ------------------------------------------------------------------------------------------+
    public function delete_product($tabelName,$columnName,$idNumber){

        $delete = $this->pdo->prepare("DELETE from $tabelName WHERE $columnName=:id_product");
        $delete -> bindParam('id_product', $idNumber);
        $delete -> execute();
        $this->msg = "Produit supprimée";

    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Supprimer les produits dans la base de donnée  / Morad                     |
    // ------------------------------------------------------------------------------------------+
    public function add_categorie($name,$description){

        $insert = $this->pdo->prepare('INSERT INTO categories(categorie_title, description_title) VALUES(:title, :description)');
        $insert -> bindParam('title', $name);
        $insert -> bindParam('description', $description);
        $insert -> execute();
        $this->msg = "categories ajoutée";
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les categories dans block article / Morad                         |
    // ------------------------------------------------------------------------------------------+
    public function option(){
        $get_categorie = $this->pdo->prepare("SELECT * FROM categories");
        $get_categorie -> execute();
        $get_categorie = $get_categorie->fetchALL(PDO::FETCH_OBJ);
        
        foreach ($get_categorie as $categorie) {
                echo '
                    <option value="'.$categorie->id.'">'.$categorie->categorie_title.'</option>
                ';
        }
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les produits dans la page Admin  / Morad                          |
    // ------------------------------------------------------------------------------------------+
    public function get_products(){
        $get = $this->pdo->prepare('SELECT * FROM products INNER JOIN categories ON products.id_categorie = categories.id_cat INNER JOIN admin ON products.id_creator = admin.id_admin ORDER BY products.id DESC');
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);

        $i = 0;
        foreach ($get as $product) {
            $id_product = $product->id;
            // ---- Si on click sur le button modifier affichera le formulaire suivant ---------------+
            if (isset($_POST["modifier$i"])) {
                    echo  '<form class="article_solo" method="get" enctype="multipart/form-data">
                            <div class="img_et_text">
                                <div>
                                <img class="image" src="../Images/products/'.$product->image.'" alt="product photo">
                                    <div class="file">
                                        Choisir une image<input type="file" name="image" id="image" value"aaa";>
                                    </div>
                                </div>
                                <div class="divv">
                                    <label for="title">Titre: </label>
                                    <input type="text" name="title" id="title" value="'.$product->title.'">
                                    <label for="price">Prix: </label>
                                    <input type="number" name="price" id="price" value="'.$product->price.'"><br>
                                    <br>
                                    <label for="categorie">Categorie: </label>
                                    <select name="categorie" id="categorie">
                                        <option value="'.$product->id_categorie.'">'.$product->categorie_title.'</option>';
                                        $this->option();
                               echo '</select>
                                    <br><br>
                                    <textarea class="description" name="description" id="description" cols="30" rows="10">'.$product->description.'</textarea>
                                </div>
                            </div>
                            <div action="" method="post">
                                <input type="submit" name="maj'.$i.'" value="METTRE A JOUR">
                                <br>
                                <input type="submit" name="annuler" value="ANNULER">
                            </div>
                        </form>
                        ';
            }else   {
                $form = 
                        '<form action="" method="post">
                            <input type="submit" name="modifier'.$i.'" value="MODIFIER">
                            <br>
                            <input type="submit" name="delete'.$i.'" value="SUPPRIMER">
                        </form>';
                if (isset($_POST["delete$i"])) {
                    $form =  
                        '<form action="" method="post">
                            <input type="submit" name="oui'.$i.'" value="SUPPRIMER">
                            <br>
                            <input type="submit" name="non'.$i.'" value="GARDER">
                        </form>';       
                }
                // ------------------------------ Affichage normal ------------------------------+
                echo '<div class="article_solo">
                            <div class="img_et_text">
                                <div>
                                <img class="image" src="../Images/products/'.$product->image.'" alt="product photo">
                                </div>
                                <div>
                                    <p>'.$product->title. ' || ' .$product->price.'€</p>
                                    <p class="space_text">Categorie: '.$product->categorie_title.'</p>
                                    <p class="description">'.$product->description.'</p>
                                    <p class="description">Crée par: '.$product->first_name.' '.$product->last_name.'</p>
                                </div>
                            </div>
                            '.$form.'
                        </div>
                        ';
            }
            // ---------- SI on clique sur le button MAJ on appel la function edit_product ----------+
            if (isset($_POST["maj$i"])) {
                $this->edit_product($_POST['title'],$_POST['description'],$_POST['price'],$_POST['categorie'],$id_product);
            }
            // --------- SI on clique sur le button OUI on appel la function delete_product ---------+
            if (isset($_POST["oui$i"])) {
                $this->delete_product('products', 'id', $id_product);
            }
            $i++;
        }
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les categories dans la page Admin  / Morad                        |
    // ------------------------------------------------------------------------------------------+
    public function get_categories(){
        $get = $this->pdo->prepare('SELECT * FROM categories ORDER BY categorie_title ASC');
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);
        return $get;
    }

    public function showProduct()
    {
        $stmt = $this->pdo->prepare("SELECT image, title, price FROM products");
        $stmt->execute();
        $tab = $stmt->fetchALL(PDO::FETCH_OBJ);
        return $tab;
    }
}
