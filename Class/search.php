<?php

class Search 
{
    private $pdo;
    private $submit;
    private $search;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=boutique;host=localhost', "root", "");
    }

    public function search($search, $submit)
    {
        if (isset($submit) and !empty($search)) {
            $this->submit = htmlspecialchars(trim($submit));
            $this->search = htmlspecialchars(trim($search));
            $allproducts = $this->pdo->prepare("SELECT image titre price FROM products LIKE " % '.$search.' % " ORDER BY id DESC");
            $allproducts->execute();

            if ($alltopics->rowCount() > 0) {
                while ($user = $allproducts->fetch(PDO::FETCH_OBJ)) {
                    echo $user->image.$user->titre.$user->price;
                     
                }
            } else {
                echo "Aucun résultat";
            }
        }

    }
}


?>