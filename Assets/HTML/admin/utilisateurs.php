<section class="articles" id="block">
            <p>Les utilisateurs</p>
            <?php
                $i = 0;
                foreach ($get_users as $user) {
                    //  Formulaire pour supprimer -------------------------------------------------------+
                    $form = 
                    '<form action="" method="post">
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

                    echo '
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
                            </div>
                        </div>
                        '.$form.'
                        
                    </div>';
                    if (isset($_POST["oui$i"])) {
                        $product->delete_product('users', 'id', $slide->id);
                    }
                    $i++;
                }
            ?>
            
        </section>