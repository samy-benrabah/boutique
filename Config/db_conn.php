<?php

    try {
        $conn = new PDO('mysql:host=localhost;dbname=boutique', "root", "");
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

?>