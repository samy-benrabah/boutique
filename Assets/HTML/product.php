<?php
session_start();
require '../../Class/panier_class.php';
require '../../Class/product.php';

$class = new Product();
$panier = new Panier('produits');

$reviews = $class->get_reviews($_GET['id']);
$star = round($reviews[0]);
$avis = $reviews[1];
$show = $reviews[2];


if (empty($_GET['id'])) {
   header("location: shop.php");
}else {
    $get_product = $class->get_product($_GET['id']);
}
$like= $class->get_similaire($_GET['id'],$get_product->id_cate);


$date = strtotime($get_product->product_date);
$mtn = strtotime(date('Y-m-d'));
$to = $mtn - $date;
$floor = floor($to/(60*60*24));
    if ($floor < 15) {
        $new = '<p class="new" >NEW</p>';
    }else $new = '';
if (isset($_POST['send_avis'])) {
    $send_avis = $class->send_avis($_POST['nombre-etoile'],$_POST['comment'],3,date("y-m-d"),$_GET['id']);
}
if (isset($_POST['ajouter'])) {
    $valeur = array(
        'titre' => $get_product->title,
        'price' => $get_product->price,
        'image' => $get_product->image,
        'qte' => $_POST['quantite'],
        'id' => $get_product->id,
        
    );

    $panier->set($get_product->id, $valeur);
    header('Location:panier.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/product.css">
    <link rel="stylesheet" href="../CSS/header-footer.css">
    <script src="https://kit.fontawesome.com/218e7c5bb4.js" crossorigin="anonymous"></script>

    <title>Product</title>
</head>
<body>
    <main>
        <!-- ///////////////////////////DEBUT HEADER ///////////////////////////////////////////// -->
            <?php
include 'header.php';
?>
<!-- ///////////////////////////FIN HEADER ///////////////////////////////////////////// -->
<!-- ///////////////////////////DEBUT SECTION 1 ///////////////////////////////////////////// -->
        <section class="section1">
            <div class="section1-topic1">
                <div class="description_image">
                    <div>
                        <p>Home / <?php echo " $get_product->categorie_title / $get_product->title" ?></p>
                    </div>
                    <div>
                        <?= $new ?>
                        <img src="../Images/products/<?php echo $get_product->image ?>" alt="Produit">
                    </div>
                </div>
                <div class="section1-topic2">
                    <div class="sous-section1-topic2">
                        <div>
                            <div>
                                <h2><?php echo $get_product->title ?></h2>
                            </div>
                            <div>
                                <p><?php echo number_format($get_product->price, 2, ',',' ') ?>€</p>
                            </div>
                        </div>
                        <div>
                            <a href='#commentaire'>
                                <div class="star-avis">
                                    <div>
                                        <?php
                                        $reviews = $class->get_stars($star);
                                        ?>
                                    </div>
                                        <p><?= $avis?></p>
                                </div>
                            </a>
                        </div>
                        <div>
                            <div>
                                <pre><?php echo substr($get_product->description, 0, 180).' <a href="?id='.$get_product->id.'&name='.$get_product->title.'#description"><b>Voir la suite</b></a>' ?></pre>
                            </div>
                        </div>
                            <form method="post">
                                <input type="number" name="quantite" value="1" min="1" max="10">
                                <input type="submit" name="ajouter" value="Ajouter au panier">
                            </form>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- ///////////////////////////FIN SECTION 1 ///////////////////////////////////////////// -->
        <!-- ///////////////////////////DEBUT SECTION 2 ///////////////////////////////////////////// -->
<!-- *********************************************************************************************** -->
        <section class="section2">
            <div class="description">
                <div class="sous-description" id="description">
                    <?php
                        if (isset($_POST['avis'])) {
                            echo '
                                        <form method="post">
                                            <input type="submit" name="description" value="Description">
                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                            <input type="submit" class="bold" name="avis" value="Avis">
                                        </form>
                                        <div>';
                                                foreach ($show as $key) {
                                                    echo '<div class="star"><p>'.$key->first_name.'</p>&nbsp;&nbsp;';
                                                    echo $reviews = $class->get_stars($key->star).'</div>';
                                                    echo    '<p>'.$key->comment.'</p>
                                                            <p>'.$key->date.'</p><br><br>';
                                                }
                            echo        '</div>';
                        }else {
                            echo '
                                        <form method="post">
                                            <input type="submit" class="bold" name="description" value="Description">
                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                            <input type="submit" name="avis" value="Avis">
                                        </form>
                                        <div>
                                            <pre>'.$get_product->description.'</pre>
                                        </div>';
                        }
                    ?>
                </div>
            </div>
            <div class="full-commentaire" id="commentaire">
                <div>
                    <h3>Publier un avis sur cet article</h3>
                </div>
                    <form action="" method="post">
                        <label for="nombre-etoile">Evaluer cet article</label>
                        <select name="nombre-etoile" id="nombre-etoile">
                            <option  value="1"> &#11088;</option>
                            <option  value="2"> &#11088;&#11088;</option>
                            <option  value="3"> &#11088;&#11088;&#11088;</option>
                            <option  value="4"> &#11088;&#11088;&#11088;&#11088;</option>
                            <option  value="5"> &#11088;&#11088;&#11088;&#11088;&#11088;</option>
                        </select>
                        <div>
                            <label for="comment">Commentaire</label><br>
                            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <input type="submit" name="send_avis" id="send_avis">
                        </div>
                    </form>
                </div>
            <div class="similar">
                <div>
                    <h3>Produits Similaires</h3>
                </div>
                <div class="sous-section2">
                
                    <?php
                        foreach ($like as $key) {
                            $date = strtotime($key->product_date);
                            $mtn = strtotime(date('Y-m-d'));
                            $to = $mtn - $date;
                            $floor = floor($to/(60*60*24));
                                if ($floor < 15) {
                                    $new = '<p class="new" >NEW</p>';
                                }else $new = '';

                            $reviews_ = $class->get_reviews($key->id);
                            $star_ = round($reviews_[0]);



                            echo '<div class ="product">
                                    
                                        '.$new.'
                                        <a href="product.php?id='.$key->id.'&name='.$key->title.'">
                                        <img class="product-img" src="../Images/products/'.$key->image.'" alt="img-product">
                                        <p>'.$key->title.'</p>
                                        <div class="stars">';
                                      echo  $reviews_ = $class->get_stars($star_);
                                    echo '</div>
                                        <p>'.$key->price.'€</p>
                                    </a>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- ///////////////////////////FIN SECTION 2 ///////////////////////////////////////////// -->

    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
