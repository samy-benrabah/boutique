<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/search.css">
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <?php
    include 'header.php';

    ?>

    <main>
        <section class="section2">
            <?php
            $bdd = new PDO('mysql:dbname=boutique;host=localhost', "root", "");

            //  $query=$bdd->prepare('SELECT * FROM products WHERE title ORDER BY id DESC');

            $stmt = $bdd->prepare("SELECT * FROM products WHERE id=?");
            $stmt->execute([$_GET['id']]);
            $fetch = $stmt->fetchAll(PDO::FETCH_OBJ);
            if ($stmt->rowCount() > 0) {



                foreach ($fetch as $p) {
                    echo
                    '<div class="product">
    <a href="product.php?id=' . $p->id . '">
        <div class="product-img">
            
                <img src="../../Assets/Images/products/' . $p->image . '">
        </div>
            <h4>' . $p->title . '</h4>
            <p>' . $p->price . '$</p>
    </a>
</div>';
                }
            } else {
                echo '<p class="search">Aucun résultat pour :' . ' ' . $search . '</p>';
            }

            ?>
        </section>
    </main>


    <?php
    include '../HTML/footer.php'
    ?>

</body>

</html>