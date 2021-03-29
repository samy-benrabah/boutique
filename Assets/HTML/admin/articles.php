<section class="articles" id="block">
                <div class="entete">
                    <p>Les articles (5)</p>
                    <?php echo $product->msg;?></p>
                    <img src="../../Images/" alt="">
                    <form action="" method="post">
                        <input type="submit" name="add" value="+">
                        <input type="submit" name="retour" value="x">
                    </form>
                </div>
                <?php
                    $admin = 1;
                    if (isset($_POST['add'])) {
                        echo  '
                            <form class="article_solo" method="post" enctype="multipart/form-data">
                                <div class="img_et_text">
                                    <div>
                                        <div class="image"><p>1024<br>x<br>1024</p></div>
                                        <div class="file">
                                            Choisir une image<input type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <div class="divv">
                                        <label for="title">Titre: </label>
                                        <input type="text" name="title" id="title" placeholder="Nom de l‘article">

                                        <label for="price">Prix: </label>
                                        <input type="number" name="price" id="price" placeholder="Prix de l‘article">
                                        <br><br>
                                        <label for="categorie">Categorie: </label>
                                        <select  name="categorie" id="categorie">';
                                        $select = $product->option();
                                    echo'</select>
                                        <br><br>
                                        <textarea name="description" id="description" cols="30" rows="10" placeholder="description de l‘article"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" name="add_to_db" value="AJOUTER">
                                    <br>
                                    <input type="submit" name="annuler" value="ANNULER">
                                </div>
                            </form>
                            ';
                    }
                    if (isset($_POST['add_to_db'])) {
                        $product -> add_product($_POST['title'],$_POST['description'],$_POST['price'],date("Y-m-d"),$_POST['categorie'],1,$_FILES['image']);
                    }

                    $i = 0;
                    foreach ($get_products as $article) {
                    $id_product = $article->id;
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

                    // ---- Si on click sur le button modifier affichera le formulaire suivant ---------------+
                    if (isset($_POST["modifier$i"])) {
                        echo  '<form class="article_solo" method="post" enctype="multipart/form-data">
                                    <div class="img_et_text">
                                        <div>
                                        <img class="image" src="../Images/products/'.$article->image.'" alt="product photo">
                                            <div class="file">
                                                Choisir une image<input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        <div class="divv">
                                            <label for="title">Titre: </label>
                                            <input type="text" name="title" id="title" value="'.$article->title.'">
                                            <label for="price">Prix: </label>
                                            <input type="number" name="price" id="price" value="'.$article->price.'"><br>
                                            <br>
                                            <label for="categorie">Categorie: </label>
                                            <select name="categorie" id="categorie">
                                                <option value="'.$article->id_categorie.'">'.$article->categorie_title.'</option>',
                                                $product->option();
                                             echo  '</select>
                                            <br><br>
                                            <textarea class="description" name="description" id="description" cols="30" rows="10">'.$article->description.'</textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" name="maj'.$i.'" value="METTRE A JOUR">
                                        <br>
                                        <input type="submit" name="annuler" value="ANNULER">
                                    </div>
                                </form>
                                ';

                    }else   {
                        // ------------------------------ Affichage normal ------------------------------+
                        echo '<div class="article_solo">
                                    <div class="img_et_text">
                                        <div>
                                        <img class="image" src="../Images/products/'.$article->image.'" alt="product photo">
                                        </div>
                                        <div>
                                            <p>'.$article->title. ' || ' .$article->price.'€</p>
                                            <p class="space_text">Categorie: '.$article->categorie_title.'</p>
                                            <p class="description">'.$article->description.'</p>
                                            <p class="description">Crée par: '.$article->first_name.' '.$article->last_name.'</p>
                                        </div>
                                    </div>
                                    '.$form.'
                                </div>
                                ';
                    }
                    // ---------- SI on clique sur le button MAJ on appel la function edit_product ----------+
                    if (isset($_POST["maj$i"])) {
                        if (!empty($_FILES["image"]['name'])) {
                            $product->delete_image($article->image);
                            $product->edit_product_with($_FILES['image'],$_POST['title'],$_POST['description'],$_POST['price'],$_POST['categorie'],$id_product);
                        }else {
                            $product->edit_product($_POST['title'],$_POST['description'],$_POST['price'],$_POST['categorie'],$id_product);
                        }
                    }
                    // --------- SI on clique sur le button OUI on appel la function delete_product ---------+
                    if (isset($_POST["oui$i"])) {
                        $product->delete_product('products', 'id', $id_product);
                        $product->delete_image($article->image);
                    }
                    $i++;
                }
                ?>
            </div>
        </section>