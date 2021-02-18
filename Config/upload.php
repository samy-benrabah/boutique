<img src="../Assets/Images/products/" alt="">
<?php
    if (isset($_POST['add_to_db'])) {
        $file  = $_FILES['image'];
        
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed  =array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../Assets/Images/products/'.$fileNameNew;
                    move_uploaded_file($fileTmpName ,$fileDestination);
                    echo "image envoyer";
                }else {
                    echo "Votre image est très grande";
                }
            }else {
                echo "Il y'a un probleme de telechargement";
            }
        }else {
            echo "Veuillez chosir un format de type png, jpg ou jpeg";
        }
    }

?>