<section class="articles" id="block">
                <div class="entete">
                    <p>Les articles (5)</p>
                    <form action="" method="post">
                        <input type="submit" name="add" value="Ajouter un article">
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
                                        <select name="categorie" id="categorie">
                                            <option>Choisir une categorie</option>
                                            <option value="1">table</option>
                                            <option value="2">cuisine</option>
                                            <option value="3">salle de bain</option>
                                        </select>
                                        <br><br>
                                        <textarea name="description" id="description" cols="30" rows="10" placeholder="description de l‘article"></textarea>
                                    </div>
                                </div>
                                <div action="" method="post">
                                    <input type="submit" name="add_to_db" value="AJOUTER">
                                    <br>
                                    <input type="submit" name="annuler" value="ANNULER">
                                </div>
                            </form>
                            ';
                    }
                    $article = '
                    <div class="article_solo">
                        <div class="img_et_text">
                            <div>
                                <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                            </div>
                            <div>
                                <p>PAPA basse 4 pierds | 300€</p>
                                <p class="space_text">Categorie: Table</p>
                                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem numquam eius! Ea rerum fugit repellat ipsa, magni nostrum vero dolore minus labore. Quas adipisci, sunt quod assumenda ut deleniti.</p>
                            </div>
                        </div>
                        <form action="" method="post">
                            <input type="submit" name="modifier" value="MODIFIER">
                            <br>
                            <input type="submit" name="delete" value="SUPPRIMER">
                        </form>
                    </div>
                    ';
                    if (isset($_POST['modifier'])) {
                        $article = '
                            <form class="article_solo">
                                <div class="img_et_text">
                                    <div>
                                        <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                                        <div class="file">
                                            Choisir une image<input type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <div class="divv">
                                        <label for="title">Titre: </label>
                                        <input type="text" name="title" id="title" value="TABLE BASE">
                                        <label for="price">Prix: </label>
                                        <input type="number" name="price" id="price" value="300"><br>
                                        <br>
                                        <label for="categorie">Categorie: </label>
                                        <select name="categorie" id="categorie">
                                            <option value="table">table</option>
                                            <option value="cuisine">cuisine</option>
                                            <option value="sale de baine">salle de bain</option>
                                        </select>
                                        <br><br>
                                        <textarea class="description" name="description" id="description" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure eveniet suscipit, saepe dolorem voluptates, inventore eligendi possimus iusto minus assumenda temporibus! Magnam rem error veniam animi maxime, omnis quis quisquam.
                                        </textarea>
                                    </div>
                                </div>
                                <div action="" method="post">
                                    <input type="submit" name="maj" value="METTRE A JOUR">
                                    <br>
                                    <input type="submit" name="annuler" value="annuler">
                                </div>
                            </form>
                            ';
                    }
                    echo $article
                ?>
            </div>

            <div class="article_solo">
                <div class="img_et_text">
                    <div>
                        <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                    </div>
                    <div>
                        <p>Table basse 4 pierds | 300€</p>
                        <p class="space_text">Categorie: Table</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem numquam eius! Ea rerum fugit repellat ipsa, magni nostrum vero dolore minus labore. Quas adipisci, sunt quod assumenda ut deleniti.</p>
                    </div>
                </div>
                <form action="" method="post">
                    <input type="submit" name="delete" value="METTRE A JOUR">
                    <input type="submit" name="delete" value="SUPPRIMER">
                </form>
            </div>
            <div class="article_solo">
                <div class="img_et_text">
                    <div>
                        <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                    </div>
                    <div>
                        <p>Table basse 4 pierds | 300€</p>
                        <p class="space_text">Categorie: Table</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem numquam eius! Ea rerum fugit repellat ipsa, magni nostrum vero dolore minus labore. Quas adipisci, sunt quod assumenda ut deleniti.</p>
                    </div>
                </div>
                <div>
                    <form action="" method="post">
                        <input type="submit" name="delete" value="METTRE A JOUR">
                        <input type="submit" name="delete" value="SUPPRIMER">
                    </form>
                </div>
            </div>
            <div class="article_solo">
                <div class="img_et_text">
                    <div>
                        <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                    </div>
                    <div>
                        <p>Table basse 4 pierds | 300€</p>
                        <p class="space_text">Categorie: Table</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem numquam eius! Ea rerum fugit repellat ipsa, magni nostrum vero dolore minus labore. Quas adipisci, sunt quod assumenda ut deleniti.</p>
                    </div>
                </div>
                <form action="" method="post">
                    <input type="submit" name="delete" value="METTRE A JOUR">
                    <input type="submit" name="delete" value="SUPPRIMER">
                </form>
            </div>
            <div class="article_solo">
                <div class="img_et_text">
                    <div>
                        <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                    </div>
                    <div>
                        <p>Table basse 4 pierds | 300€</p>
                        <p class="space_text">Categorie: Table</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem numquam eius! Ea rerum fugit repellat ipsa, magni nostrum vero dolore minus labore. Quas adipisci, sunt quod assumenda ut deleniti.</p>
                    </div>
                </div>
                <div>
                    <form action="" method="post">
                        <input type="submit" name="delete" value="METTRE A JOUR">
                        <input type="submit" name="delete" value="SUPPRIMER">
                    </form>
                </div>
            </div>
            <div class="article_solo">
                <div class="img_et_text">
                    <div>
                        <div class="image" style="background-image: url(https://depot.qodeinteractive.com/wp-content/uploads/2017/01/h1-product-6-1024x1024.jpg);"></div>
                    </div>
                    <div>
                        <p>Table basse 4 pierds | 300€</p>
                        <p class="space_text">Categorie: Table</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem numquam eius! Ea rerum fugit repellat ipsa, magni nostrum vero dolore minus labore. Quas adipisci, sunt quod assumenda ut deleniti.</p>
                    </div>
                </div>
                <form action="" method="post">
                    <input type="submit" name="delete" value="METTRE A JOUR">
                    <input type="submit" name="delete" value="SUPPRIMER">
                </form>
            </div>
        </section>