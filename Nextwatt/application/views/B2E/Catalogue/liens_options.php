<div class="page-header">
    <h1 align="center">
        Liaisons entre les produits</br>
    </h1>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">


            <!--Debut de l'apocalypse-->
            <table>
                <tr>
                    <th></th>
                    <?php
                    //En tete
                    foreach ($catalogue as $refp => $produit) {
                        echo '<th>';
                        echo $produit['Nom'];
                        echo '</th>';
                    }
                    ?>

                </tr>

                <tr>
                    <?php
                    //Contenu
                    foreach ($options as $refc => $complement) {
                        echo "<th>" . $complement['Nom'] . '</th>';

                        foreach ($catalogue as $refp => $produit) {
                            echo "<td>";

                            $name = $refp . "|" . $refc;
                            echo "<input type='hidden' name='sup_" . $name . "'>";
                            //if (in_array($name, $liens))
                            //echo "<input type='checkbox' name='ajout_" . $name . "' class='squaredTwo' checked>" . "</td>";
                            //else
                            echo "<input type='checkbox' name='" . $name . "' >";

                            echo "</td>";
                        }
                        echo "<tr/>";
                    }
                    ?>
            </table>
            <!--Fin de l'apocalyspe-->
        </div>
    </div>
</div>
