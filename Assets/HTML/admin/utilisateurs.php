<section class="articles" id="block">
            <p>Les utilisateurs</p>
            <?php
                $i = 0;
                foreach ($get_users as $user) {
                    if ($user->admin == 1) {
                        $statu = "Admin";
                    }else {
                        $statu = "Member";
                    }
                    //  Formulaire pour supprimer -------------------------------------------------------+
                    $form = 
                    '<form action="" method="post">
                        <input type="submit" name="maj'.$i.'" value="METTRE A JOUR">
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
                    $Formulaire = '
                    <div class="article_solo">
                        <div class="img_et_text">
                            <div >
                                <p class="image">'.substr($user->first_name, 0, 1).'.'.substr($user->last_name, 0, 1).'</p>
                            </div>
                            <div>
                                <p>Nom et prénom: '.$user->last_name.' '.$user->first_name.'</p>
                                <p class="space_text">Adresse complète: '.$user->adress.', '.$user->zip.' '.$user->city.', '.$user->country.'</p>
                                <p>E-mail: '.$user->email.'</p>
                                <p class="space_text">N° Téléphone: '.$user->phone.'</p>
                                <p class="space_text">Statut: '.$statu.'</p>
                            </div>
                        </div>
                        '.$form.'
                    </div>';
                    if (isset($_POST["maj$i"])) {
                        $form =  
                            '<div>
                                <input type="submit" name="majoui'.$i.'" value="VALIDER">
                                <br>
                               <input type="submit" name="majnon'.$i.'" value="ANNULER">
                            </div>';
                        $Formulaire = 
                            '<form method="post">
                                <div class="article_solo">
                                    <div class="img_et_text">
                                        <div >
                                            <p class="image">'.substr($user->first_name, 0, 1).'.'.substr($user->last_name, 0, 1).'</p>
                                        </div>
                                        <div>
                                            <p>Nom et prénom: '.$user->last_name.' '.$user->first_name.'</p>
                                            <p class="space_text">Adresse complète: '.$user->adress.', '.$user->zip.' '.$user->city.', '.$user->country.'</p>
                                            <p>E-mail: '.$user->email.'</p>
                                            <p class="space_text">N° Téléphone: '.$user->phone.'</p>
                                            <select name="statut" id="statut">
                                                <option value="1">Admin</option>
                                                <option value="0">Member</option>
                                            </select>
                                        </div>
                                    </div>
                                    '.$form.'
                                </div>
                            </form>';
                    }
                    echo $Formulaire;

                    if (isset($_POST["oui$i"])) {
                        $product->delete_product('users', 'id', $slide->id);
                    }
                    if (isset($_POST["majoui$i"])) {
                        $product->change_status($_POST['statut'], $user->id);
                    }
                    $i++;
                }
            ?>
        </section>