<section class="articles" id="block">
                    <div class="entete">
                    <p>Les Commandes (5)</p>
                    <?php echo $product->msg;?></p>
                    <img src="../../Images/" alt="">
                    <form action="" method="post">
                        <input type="submit" name="add" value="+">
                        <input type="submit" name="retour" value="x">
                    </form>
                </div>
            <?php
                $i=0;
                foreach ($get_commandes as $commande) {
                    $form = 
                        '<div>
                            <input type="submit" name="modifier'.$i.'" value="MODIFIER">
                            <br>
                            <input type="submit" name="delete'.$i.'" value="SUPPRIMER">
                        </div>';
                    //  Formulaire si je clique sur OUI (supprimer) ------------------------------+
                    if (isset($_POST["delete$i"])) {
                        $form =  
                            '<div>
                                <input type="submit" name="oui'.$i.'" value="SUPPRIMER">
                                <br>
                                <input type="submit" name="non'.$i.'" value="GARDER">
                            </div>';
                    }
                    if ($commande->processing == 0) {
                       $option = '  <option value="0">No traitée</option>
                                    <option value="1">traitée</option>';
                        $color = "#FFEA8A";
                    }else {
                        $option = '  <option value="1">traitée</option>
                                    <option value="0">No traitée</option>';
                        $color = "#a4e8f2";
                    }
                    echo '
                    <form class="article_solo"  action="" method="post">
                        <div class="commandes">
                            <div>
                                <p class="space_text2">Article: <br>';
                                $get_products_in_order = $product->get_prices_in_order($commande->id_order, $commande->name, $commande->value);
                                echo '</p>
                            </div>
                            <div>
                                <p>Commande ID°: '.$commande->id_order.'</p>
                                <p class="space_text">Date: '.$commande->order_date.'</p>
                                <p>Client: '.$commande->first_name.' '.$commande->last_name.'</p>
                                <p class="space_text">E-mail: '.$commande->email.'</p>
                                <p>Adresse complète: '.$commande->adress.', '.$commande->zip.' '.$commande->city.' '.$commande->country.'</p>
                                <p class="space_text">N° Téléphone: '.$commande->phone.'</p>
                                <div class="precessing">
                                    <p>Statut: ';
                                    echo'</p>
                                    <select class="notraitee" name="processing" id="processing" style="background-color:'.$color.'">
                                        '.$option.'
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div>
                                <input type="submit" name="maj'.$i.'" value="METTRE A JOUR">
                                <br>
                                <input type="submit" name="ANNULER" value="ANNULER">
                            </div>
                    </form>';
                    // ---------- SI on clique sur le button MAJ on appel la function edit_product ----------+
                    if (isset($_POST["maj$i"])) {
                        $product->edite_order($_POST['processing'],$commande->id_order);
                    }
                    // --------- SI on clique sur le button OUI on appel la function delete_product ---------+
                    if (isset($_POST["oui$i"])) {
                        $product->delete_product('orders', 'id', $commande->id_order);
                    }
                    $i++;
                }
            ?>
        </section>