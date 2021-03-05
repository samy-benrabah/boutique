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

    
    //*------------------------------------------------------------------------------------------+
    //*  FUNCTION Pour ajouter les produits dans la base de donnée  / Morad                      |
    //*------------------------------------------------------------------------------------------+
    public function add_product($title, $description, $price, $product_date, $id_categorie, $admin, $file){
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
                    
                        $insert = $this->pdo->prepare('INSERT INTO products(image, title, description, price, product_date, id_cate, id_admin) VALUES(:image, :title, :description, :price, :product_date, :id_categorie, :id_admin)');
                        $insert -> bindParam('image', $fileNameNew);
                        $insert -> bindParam('title', $title);
                        $insert -> bindParam('description', $description);
                        $insert -> bindParam('price', $price);
                        $insert -> bindParam('product_date', $product_date);
                        $insert -> bindParam('id_categorie', $id_categorie);
                        $insert -> bindParam('id_admin', $admin);
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


    //*------------------------------------------------------------------------------------------+
    //*  FUNCTION pour modifier les produits SANS IMAGE dans la base de donnée  / Morad          |
    //*------------------------------------------------------------------------------------------+
    public function edit_product($title, $description, $price, $id_categorie,$id_product){
        
        $maj = $this->pdo->prepare("UPDATE products SET title=:title, description=:description, price=:price, id_cate=:id_categorie WHERE id=$id_product");
        $maj -> bindParam('title', $title);
        $maj -> bindParam('description', $description);
        $maj -> bindParam('price', $price);
        $maj -> bindParam('id_categorie', $id_categorie);
        $maj -> execute();
        $this->msg = "Mise a jour ok";
    }
    //*------------------------------------------------------------------------------------------+
    //*  FUNCTION pour modifier les produits AVEC IMAGE dans la base de donnée  / Morad          |
    //*------------------------------------------------------------------------------------------+
    public function edit_product_with($file, $title, $description, $price, $id_categorie,$id_product){
        
        
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
                        $maj = $this->pdo->prepare("UPDATE products SET image=:image, title=:title, description=:description, price=:price, id_cate=:id_categorie WHERE id=$id_product");
                        $maj -> bindParam('image', $fileNameNew);
                        $maj -> bindParam('title', $title);
                        $maj -> bindParam('description', $description);
                        $maj -> bindParam('price', $price);
                        $maj -> bindParam('id_categorie', $id_categorie);
                        $maj -> execute();
                        $this->msg = "Mise a jour ok";
                    }else {
                        $this->msg = "Votre image est très grande";
                    }
                }else {
                    $this->msg = "Il y'a un probleme de telechargement";
                }
            }else {
                $this->msg = "Veuillez chosir un format de type png, jpg ou jpeg";
            }
    }
    //*------------------------------------------------------------------------------------------+
    //*  FUNCTION pour modifier les Categories dans la base de donnée  / Morad                   |
    //*------------------------------------------------------------------------------------------+
    public function edit_categorie($table,$column1,$column2,$id,$title, $description,$id_to){
        
        $maj = $this->pdo->prepare("UPDATE $table SET $column1=:column1, $column2=:column2 WHERE $id=$id_to");
        $maj -> bindParam('column1', $title);
        $maj -> bindParam('column2', $description);
        $maj -> execute();
        $this->msg = "Mise a jour ok";
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Supprimer de la base de donnée  / Morad                                    |
    // ------------------------------------------------------------------------------------------+
    public function delete_product($tabelName,$id,$id_to){

        $delete = $this->pdo->prepare("DELETE FROM $tabelName WHERE $id=:id_to");
        $delete -> bindParam('id_to', $id_to);
        $delete -> execute();
        $this->msg = "Produit supprimée";
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Supprimer de la base de donnée  / Morad                                    |
    // ------------------------------------------------------------------------------------------+
    public function delete_image($image){
        unlink("../Images/products/$image");
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Ajouter une Categorie ou un Discount dans la base de donnée  / Morad       |
    // ------------------------------------------------------------------------------------------+
    public function add_categorie($table,$column1,$column2,$name,$description){

        $insert = $this->pdo->prepare("INSERT INTO $table($column1, $column2) VALUES(:column1, :column2)");
        $insert -> bindParam('column1', $name);
        $insert -> bindParam('column2', $description);
        $insert -> execute();
        $this->msg = "categories ajoutée";
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les categories dans block article dans la page admin/ Morad       |
    // ------------------------------------------------------------------------------------------+
    public function option(){
        $get_categorie = $this->pdo->prepare("SELECT * FROM categories");
        $get_categorie -> execute();
        $get_categorie = $get_categorie->fetchALL(PDO::FETCH_OBJ);
        
        foreach ($get_categorie as $categorie) {
                echo '
                    <option value="'.$categorie->id_categorie.'">'.$categorie->categorie_title.'</option>
                ';
        }
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les produits dans la page Admin  / Morad                          |
    // ------------------------------------------------------------------------------------------+
    public function get_products(){
        $get = $this->pdo->prepare('SELECT * FROM products JOIN categories ON products.id_cate = categories.id_categorie JOIN admin on products.id_admin = admin.id_admin ORDER BY products.id DESC');
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);

        return $get;
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les categories ou les discounts dans la page Admin  /  Morad      |
    // ------------------------------------------------------------------------------------------+
    public function get_categories($table, $sortirPar ){
        $get = $this->pdo->prepare("SELECT * FROM $table ORDER BY $sortirPar ASC");
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);
        return $get;
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les sliders dans la page accueil  /  Morad                        |
    // ------------------------------------------------------------------------------------------+
        public function get_sliders(){
            $show = 1;
        $get = $this->pdo->prepare("SELECT * FROM sliders WHERE afficher = $show");
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);
        return $get;
    }
    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les sliders dans la page Admin  /  Morad                        |
    // ------------------------------------------------------------------------------------------+
    public function get_sliders_admin(){
        $show = 1;
    $get = $this->pdo->prepare("SELECT * FROM sliders");
    $get -> execute();
    $get = $get->fetchALL(PDO::FETCH_OBJ);
    return $get;
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Ajouter les sliders dans la page accueil  /  Morad                         |
    // ------------------------------------------------------------------------------------------+
        public function add_slider($file,$title,$description,$color){
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
                        $fileDestination = '../Images/sliders/'.$fileNameNew;
                        move_uploaded_file($fileTmpName ,$fileDestination);
                        $insert = $this->pdo->prepare("INSERT INTO sliders(image, title, description, back_color, show) VALUES(:image, :title, :description, :color, :show)");
                        $insert -> bindParam('title', $title);
                        $insert -> bindParam('description', $description);
                        $insert -> bindParam('image', $fileNameNew);
                        $insert -> bindParam('color', $color);
                        $insert -> bindParam('show', "oui");
                        $insert -> execute();
                        $this->msg = "Slider ajouté";
                    }else $this->msg = "Votre image est très grande";
                }else $this->msg = "Il y'a un probleme de telechargement";
                    
            }else $this->msg = "Veuillez chosir un format de type png, jpg ou jpeg";
            
        
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Supprimer le slider de la base de donnée  / Morad                          |
    // ------------------------------------------------------------------------------------------+
    public function delete_slider($id){
        $delete = $this->pdo->prepare("DELETE FROM sliders WHERE id=:id_to");
        $delete -> bindParam('id_to', $id);
        $delete -> execute();
        $this->msg = "Slider supprimé";
    }

    //  ------------------------------------------------------------------------------------------+
    //   FUNCTION pour Modifier le slider dans la base de donnée  / Morad                         |
    //  ------------------------------------------------------------------------------------------+
    public function edite_slider($title, $description, $color,$affichage ,$id_to){
        $maj = $this->pdo->prepare("UPDATE sliders SET title=:title, description=:description, back_color=:color, afficher=:affichage WHERE id=$id_to");
        $maj -> bindParam('title', $title);
        $maj -> bindParam('description', $description);
        $maj -> bindParam('color', $color);
        $maj -> bindParam('affichage', $affichage);
        $maj -> execute();
        $this->msg = "Mise a jour ok";
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Modifier les Orders dans la base de donnée  / Morad                        |
    // ------------------------------------------------------------------------------------------+
    public function edite_order($status, $id_to){
        $maj = $this->pdo->prepare("UPDATE orders SET processing=:statue WHERE id_order=$id_to");
        $maj -> bindParam('statue', $status);
        $maj -> execute();
        $this->msg = "Mise a jour ok";
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les USERS dans la page Admin  /  Morad                            |
    // ------------------------------------------------------------------------------------------+
    public function get_users(){
    $get = $this->pdo->prepare("SELECT * FROM users");
    $get -> execute();
    $get = $get->fetchALL(PDO::FETCH_OBJ);
    return $get;
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les CODE DE REDUCTION dans la page Admin  /  Morad                |
    // ------------------------------------------------------------------------------------------+
    public function count_discount($id){
        $get = $this->pdo->prepare("SELECT * FROM orders WHERE id_discount=:id");
        $get -> bindParam('id', $id);
        $get -> execute();
        $get = $get->rowCount();
        return $get;
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les COMMANDES dans la page Admin  /  Morad                        |
    // ------------------------------------------------------------------------------------------+
    public function get_commandes(){
        $get = $this->pdo->prepare("SELECT * FROM orders INNER JOIN users ON orders.id_user = users.id INNER JOIN discounts ON orders.id_discount = discounts.id ORDER BY orders.id_order DESC");
        $get -> execute();
        $get = $get->fetchAll(PDO::FETCH_OBJ);
        return $get;
    }


    //! // ------------------------------------------------------------------------------------------+
    //! //  FUNCTION pour afficher les COMMANDES dans la page Admin  /  Morad                        |
    //! // ------------------------------------------------------------------------------------------+
    //! public function get_products_in_order($id){
    //!     $get = $this->pdo->prepare("SELECT * FROM container INNER JOIN products ON container.id_product = products.id  WHERE id_order=$id");
    //!     $get -> execute();
    //!     $get = $get->fetchAll(PDO::FETCH_OBJ);
    //!     foreach ($get as $key) {
    //!        echo "<br>-$key->title";
    //!     }
    //! }


    //? ------------------------------------------------------------------------------------------+
    //?  FUNCTION pour afficher les COMMANDES dans la page Admin  /  Morad                        |
    //? ------------------------------------------------------------------------------------------+
    //? public function get_prices_in_order($id){
    //?     $get = $this->pdo->prepare("SELECT * FROM container INNER JOIN products ON container.id_product = products.id  WHERE id_order=$id");
    //?     $get -> execute();
    //?     $get = $get->fetchAll(PDO::FETCH_OBJ);
    //?     $somme = 0;
    //?     $i=1;
    //?     foreach ($get as $key) {
    //?        echo "<br>$i-$key->title -- $key->price €";
    //?        $somme += $key->price;
    //?        $i++;
    //?     }
    //?     echo "<br>Total: $somme €";
    //?}


    //* ------------------------------------------------------------------------------------------+
    //*  FUNCTION pour afficher les COMMANDES dans la page Admin  /  Morad                        |
    //* ------------------------------------------------------------------------------------------+
    public function get_prices_in_order($id,$name,$value){
        $get = $this->pdo->prepare("SELECT * FROM container INNER JOIN products ON container.id_product = products.id  WHERE id_order=$id");
        $get -> execute();
        $get = $get->fetchAll(PDO::FETCH_OBJ);
        $somme = 0;
        if ($value == 0) {
            $name = "PAS DE REDUCTION";
        }
        foreach ($get as $key) {
            $link = "product.php?article=$key->title";
            $total = $key->quantity*$key->price;
            echo "<hr>";
            echo "<a href=".$link.">$key->title/$key->price € -- x$key->quantity -- $total"."€</a>";
           $somme += $total;


        }
        echo "<hr>Sous Total: &nbsp;$somme €";
        echo "<hr>Réduction: &nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp; $name &nbsp;&nbsp;&nbsp;|| $value%";
        echo "<hr><b>TOTAL: ".($somme-($somme*($value/100))) ."€</b>";
    }



    //* ------------------------------------------------------------------------------------------+
    //*  FUNCTION pour afficher le produit dans la page Product  / Morad                          |
    //* ------------------------------------------------------------------------------------------+
    public function get_product($id){
        $get = $this->pdo->prepare("SELECT * FROM products JOIN categories ON products.id_cate = categories.id_categorie WHERE id=$id");
        $get -> execute();
        $get = $get->fetch(PDO::FETCH_OBJ);
        return $get;
    }



    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher le nombre d'etoile dans la page Admin  /  Morad                   |
    // ------------------------------------------------------------------------------------------+
    public function get_reviews($id){
        $get = $this->pdo->prepare("SELECT * FROM reviews JOIN users ON reviews.id_user = users.id  WHERE id_product=$id ORDER BY reviews.id DESC");
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);
        $i=0;
        $total=0;
        foreach ($get as $key) {
            $total += $key->star;
            $i++;
        }
        
        if ($i == 0) {
            $msg = "Pas d'avis! <a href='#commentaire'>Ajouter un avi</>";
            return ([0, $msg,$get]);
        }else {
            $msg = "Sur $i Avis";
            return ([$total/$i,$msg,$get]);
        }
    }
    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher le nombre d'etoile dans la page product  /  Morad                 |
    // ------------------------------------------------------------------------------------------+
    public function get_stars($star){
        if ($star > 0) {
            for ($i=(5-$star); $i < 5; $i++) { 
                echo '<p><i class="fas fa-star"></i></p>';
            }
        
            for ($i=0; $i < (5-$star) ; $i++) { 
                echo'<p><i class="far fa-star"></i></p>';
            }
        }
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher le nombre d'etoile dans la page product  /  Morad                 |
    // ------------------------------------------------------------------------------------------+
    public function get_stars_user($star){
        if ($star > 0) {
            for ($i=(5-$star); $i < 5; $i++) { 
                echo '<p><i class="fas fa-star"></i></p>';
            }
        
            for ($i=0; $i < (5-$star) ; $i++) { 
                echo'<p><i class="far fa-star"></i></p>';
            }
        }
    }

    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les produits Similaire dans la page Admin  / Morad                |
    // ------------------------------------------------------------------------------------------+
    public function get_similaire($id,$like){
        $get = $this->pdo->prepare("SELECT * FROM products WHERE id_cate=$like  AND id  NOT IN (SELECT id FROM products WHERE id=$id)");
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);

        return $get;
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour Ajouter un AVIS dans la base de donnée  / Morad                            |
    // ------------------------------------------------------------------------------------------+
    public function send_avis($star,$comment,$id_user,$date,$id_product){

        $insert = $this->pdo->prepare("INSERT INTO reviews(star, comment, id_user, date, id_product) VALUES(:star, :comment, :id_user, :date, :id_product)");
        $insert -> bindParam('star', $star);
        $insert -> bindParam('comment', $comment);
        $insert -> bindParam('id_user', $id_user);
        $insert -> bindParam('date', $date);
        $insert -> bindParam('id_product', $id_product);
        $insert -> execute();
        $this->msg = "Comment added";
    }


    // ------------------------------------------------------------------------------------------+
    //  FUNCTION pour afficher les produits Similaire dans la page Admin  / Morad                |
    // ------------------------------------------------------------------------------------------+
    public function get_panier($id){
        $get = $this->pdo->prepare("SELECT * FROM products  WHERE id=$id)");
        $get -> execute();
        $get = $get->fetchALL(PDO::FETCH_OBJ);

        return $get;
    }











    public function showProduct()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY product_date DESC");
        $stmt->execute();
        $tab = $stmt->fetchALL(PDO::FETCH_OBJ);
        return $tab;
    }
}
