<section class="articles" id="block">
                <div class="entete">
                    <p>Les articles (5)</p>
                    <form action="" method="post">
                        <input type="submit" name="add" value="+">
                        <input type="submit" name="retour" value="x">
                    </form>
                </div>
        
                <?php
                if (isset($_POST['add'])) {
                    echo'
                        <form class="article_solo" method="post">
                            <div class="img_et_text">
                                <div class="divv">
                                    <label for="title">Titre: </label>
                                    <input type="text" name="title" id="title" placeholder="Nom de l‘article">
                                    <br><br>
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="description de l‘article"></textarea>
                                </div>
                            </div>
                            <div>
                                <input type="submit" name="add_categorie" value="AJOUTER">
                                <br>
                                <input type="submit" name="annuler" value="ANNULER">
                            </div>
                        </form>
                        ';
                }
                if (isset($_POST["add_categorie"])) {
                    $product->add_categorie('categories','categorie_title','description_title',$_POST['title'],$_POST['description']);
                }
                $i = 0;
                foreach ($get_categories as $cat) {
                    //  Formulaire pour supprimer -------------------------------------------------------+
                    $form = 
                        '<form action="" method="post">
                            <input type="submit" name="modifier'.$i.'" value="MODIFIER">
                            <br>
                            <input type="submit" name="delete'.$i.'" value="SUPPRIMER">
                        </form>';
                        //  Formulaire si je clique sur OUI (supprimer) ------------------------------+
                        if (isset($_POST["delete$i"])) {
                            $form =  
                                '<form action="" method="post">
                                    <input type="submit" name="oui'.$i.'" value="SUPPRIMER">
                                    <br>
                                    <input type="submit" name="non'.$i.'" value="GARDER">
                                </form>';       
                        }
                        //  -----------------------------------------------------------------------------+
                    $categories = '
                    <div class="article_solo">
                        <div class="img_et_text">
                            <div>
                                <p><u>Nom de la categorie:</u> '.$cat->categorie_title.'</p>
                                <br>
                                <p class="description"><u>Description de la categorie:</u> '.$cat->description_title.'</p>
                            </div>
                        </div>
                        '.$form.'
                    </div>
                    ';
                    if (isset($_POST["modifier$i"])) {
                        $categories = '<form class="article_solo" method="post">
                                        <div class="img_et_text">
                                            <div class="divv">
                                                <label for="title">Nom: </label>
                                                <br>
                                                <input type="text" name="title" id="title" value="'.$cat->categorie_title.'">
                                                <br><br>
                                                <label for="description">Description: </label>
                                                <textarea class="description" name="description" id="description" cols="30" rows="10">'.$cat->description_title.'</textarea>
                                            </div>
                                        </div>
                                        <div action="" method="post">
                                            <input type="submit" name="maj'.$i.'" value="METTRE A JOUR">
                                            <br>
                                            <input type="submit" name="annuler" value="ANNULER">
                                        </div>
                                    </form>';
                    }
                    echo $categories;
                    //  -----------Pour supprimer une categorie -----------------------------------------------+
                    if (isset($_POST["oui$i"])) {
                        $product->delete_product('categories', 'id_categorie', $cat->id_cat);
                    }
                    if (isset($_POST["maj$i"])) {
                        $product->edit_categorie('categories','categorie_title','description_title','id_cat',$_POST['title'],$_POST['description'],$cat->id_cat);
                    }
                    
                    $i++;
                }
                    
                ?>
            </div>
        </section>