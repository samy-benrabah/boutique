<section class="articles" id="block">
                <div class="entete">
                    <p>Les réductions (5)</p>
                    <form action="" method="post">
                        <input type="submit" name="add" value="Ajouter un code de réduction">
                    </form>
                </div>
                <?php
                if (isset($_POST['add'])) {
                    echo  '
                    <form class="article_solo">
                    <div class="img_et_text">
                        <div >
                            <p class="image">?</p>
                        </div>
                        <div>
                            <label for="title">Code de réduction: </label>
                            <input type="text" name="title" id="title" placeholder="RIHANA50">
                            <br>
                            <label for="valeur">Valeur en pourcentage: </label>
                            <input type="number" name="valeur" id="valeur" placeholder="chiffre sans % (ex:20)"><br>
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
                    $reductions = '
                    <div class="article_solo">
                        <div class="img_et_text">
                            <div >
                                <p class="image">50%</p>
                            </div>
                            <div>
                                <p>Code de réduction: RIHANA50</p>
                                <p class="space_text">Valeur: 50 pourcent.</p>
                                <p class="description">Ce code a été utilisé 3 fois.</p>
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
                        $reductions = '
                            <form class="article_solo">
                                <div class="img_et_text">
                                    <div >
                                        <p class="image">50%</p>
                                    </div>
                                    <div>
                                        <label for="title">Code de réduction: </label>
                                        <input type="text" name="title" id="title" value="RIHANA50">
                                        <br>
                                        <label for="valeur">Valeur en pourcentage: </label>
                                        <input type="number" name="valeur" id="valeur" value="50"><br>
                                    </div>
                                </div>
                                <div action="" method="post">
                                    <input type="submit" name="maj" value="METTRE A JOUR">
                                    <br>
                                    <input type="submit" name="annuler" value="ANNULER">
                                </div>
                            </form>
                            ';
                    }
                    echo $reductions
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