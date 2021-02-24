<section class="articles" id="block">
                <div class="entete">
                    <p>Les articles (5)</p>
                    <p><?php echo $product->msg;?></p>
                    <img src="../../Images/" alt="">
                    <form action="" method="post">
                        <input type="submit" name="add" value="+">
                        <input type="submit" name="annuler" value="x">
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

                                        <label for="price">Prix: </label>
                                        <input type="number" name="price" id="price" placeholder="Prix de l‘article">
                                        <br><br>
                                        <label for="categorie">Categorie: </label>
                                        <select>';
                                        $select = $product->option();
                                    echo'</select>
                                        <br><br>
                                        <textarea name="description" id="description" cols="30" rows="10" placeholder="description de l‘article"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" name="add_to_db" value="AJOUTER">
                                    <br>
                                    <input type="submit" name="annuler" value="MODIFIER">
                                </div>
                            </form>
                            ';
                    }
                    echo $product->get_products();
                    
                ?>
            </div>
        </section>