<?php

if (isset($_GET['searchPHP'])) {

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
        echo 'Echec de la connexion : ' . $e->getMessage();
    }
    if (isset($_GET['searchPHP']) && !empty($_GET['searchPHP'])) {

        $q = htmlspecialchars(trim($_GET['searchPHP']));
        $stmt = $bdd->prepare("SELECT * FROM products WHERE title LIKE '$q%'");
        $stmt->execute();
        $fetch = $stmt->fetchAll(PDO::FETCH_OBJ);
        // $_SESSION['info'] = $fetch;
        foreach ($fetch as $country) {

            echo '<a href="search.php?id=' . $country->id . '"><li>' . $country->title . '</li> </a>' . '<br>';
        }
    }
}
