<section class="articles" id="block">
                <div class="entete">
                    <p>Les réductions (5)</p>
                    <form action="" method="post">
                        <input type="submit" name="add" value="+">
                        <input type="submit" name="retour" value="x">
                    </form>
                </div>
                <?php
                if (isset($_POST['add'])) {
                    echo  '
                        <form class="article_solo" method="post">
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
                            <div>
                                <input type="submit" name="add_discount" value="AJOUTER">
                                <br>
                                <input type="submit" name="annuler" value="ANNULER">
                            </div>
                        </form>';
                }
                if (isset($_POST["add_discount"])) {
                    $product->add_categorie('discounts','name','value',$_POST['title'],$_POST['value']);
                }
                $i = 0;
                foreach ($get_discounts as $discount) {
                    $count = $product->count_discount($discount->id);
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
                        $reductions = '
                    <div class="article_solo">
                        <div class="img_et_text">
                            <div >
                                <p class="image">'.$discount->value.'%</p>
                            </div>
                            <div>
                                <p>Code de réduction: '.$discount->name.'</p>
                                <p class="space_text">Valeur: '.$discount->value.'%</p>
                                <p class="description">Ce code a été utilisé '.$count.' fois.</p>
                            </div>
                        </div>
                        '.$form.'
                    </div>
                    ';
                    if (isset($_POST["modifier$i"])) {
                        $reductions = '
                            <form class="article_solo" method="post">
                                <div class="img_et_text">
                                    <div >
                                        <p class="image">'.$discount->value.'%</p>
                                    </div>
                                    <div>
                                        <label for="title">Code de réduction: </label>
                                        <input type="text" name="title" id="title" value="'.$discount->name.'">
                                        <br>
                                        <label for="valeur">Valeur en pourcentage: </label>
                                        <input type="number" name="valeur" id="valeur" value="'.$discount->value.'"><br>
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
                    echo $reductions;
                    //  -----------Pour supprimer une categorie -----------------------------------------------+
                    if (isset($_POST["oui$i"])) {
                        $product->delete_product('discounts', 'id', $discount->id);
                    }
                    if (isset($_POST["maj$i"])) {
                        $product->edit_categorie('discounts','name','value','id',$_POST['title'],$_POST['valeur'],$discount->id);
                    }
                    
                    $i++;
                }
                ?>
            </div>
        </section>