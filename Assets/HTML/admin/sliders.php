<section class="articles" id="block">
                <div class="entete">
                    <p>Les sliders (5)</p>
                    <form action="" method="post">
                        <input type="submit" name="add" value="+">
                        <input type="submit" name="retour" value="x">
                    </form>
                </div>
                <?php
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
                                        <br><br>
                                        <label for="title">Background Couleur: </label>
                                        <input type="text" name="color" id="color" placeholder="Couleur de l‘arrière plan">
                                        <br><br>
                                        <textarea name="description" id="description" cols="30" rows="10" placeholder="description de l‘article"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" name="add_slider" value="AJOUTER">
                                    <br>
                                    <input type="submit" name="annuler" value="ANNULER">
                                </div>
                            </form>
                            ';
                    }
                    if (isset($_POST["add_slider"])) {
                        $product->add_slider($_FILES['image'],$_POST['title'],$_POST['description'],$_POST['color']);
                    }
                    $i = 0;
                    foreach ($get_sliders_admin as $slide) {
                        if ($slide->afficher == 0) {
                            $affichage = "Non";
                        }else $affichage = "Oui";
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
                        $sliders = '
                        <div class="article_solo">
                            <div class="img_et_text">
                                <div>
                                    <img class="image" src="../Images/sliders/'.$slide->image.'" alt="">
                                </div>
                                <div>
                                    <p>Titre: '.$slide->title.'</p>
                                    <br>
                                    <p>Couleur de l‘arrière plan: <b style="color:'.$slide->back_color.'">'.$slide->back_color.'</b></p>
                                    <br><p>Affichage: '.$affichage.'</p>
                                    <br>
                                    <p class="description">Description: '.$slide->description.'</p>
                                </div>
                            </div>
                            '.$form.'
                        </div>
                        ';
                        if (isset($_POST["modifier$i"])) {
                            $sliders = '
                                <form class="article_solo" method="post">
                                    <div class="img_et_text">
                                        <div>
                                            <img class="image" src="../Images/sliders/'.$slide->image.'" alt="">
                                            <div class="file">
                                                Choisir une image<input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        <div class="divv">
                                            <label for="title">Titre: </label>
                                            <input type="text" name="title" id="title" value="'.$slide->title.'">
                                            <br><br>
                                            <input type="text" name="color" id="color" value="'.$slide->back_color.'">
                                            <br><br>
                                            <select name="affichage" id="affichage">
                                                <option value="1">OUI</option>
                                                <option value="0">NON</option>
                                            </select>
                                            <br><br>
                                            <textarea class="description" name="description" id="description" cols="30" rows="10">'.$slide->description.'</textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" name="maj'.$i.'" value="METTRE A JOUR">
                                        <br>
                                        <input type="submit" name="annuler" value="ANNULER">
                                    </div>
                                </form>
                                ';
                        }
                        echo $sliders;
                        //  -----------Pour supprimer une categorie -----------------------------------------------+
                        if (isset($_POST["oui$i"])) {
                            $product->delete_product('sliders', 'id', $slide->id);
                        }
                        if (isset($_POST["maj$i"])) {
                            $product->edite_slider($_POST['title'],$_POST['description'],$_POST['color'],$_POST['affichage'],$slide->id);
                        }
                        $i++;
                    }
                ?>
            </div>
        </section>