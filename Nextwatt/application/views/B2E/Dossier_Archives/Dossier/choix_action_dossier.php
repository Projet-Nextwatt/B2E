<div class="page-header">


    <h1 align="center">
        DOSSIER <small>n°<?php echo $dossier['id'];?></small></br>
        <small><i class="ace-icon fa fa-angle-double-right"></i>
            <?php
            if (empty($client['prenom1'])) {
                $civ = $client['civilite'];
                echo($civ == 1 ? 'Madame ' : '');
                echo($civ == 2 ? 'Mademoiselle ' : '');
                echo($civ == 3 ? 'Monsieur ' : '');
            }
            echo $client['nom1'] . ' ' . $client['prenom1'];
            if (!(empty($client['prenom2']))) {
                echo ' et ';
                if ($client['nom1'] != $client['nom2']) {
                    echo $client['nom2'];
                }

                echo ' ' . $client['prenom2'];
            }
            ?>
        </small>
    </h1>
</div>

<div class="row">
    <div align="center" >
        <table>
            <tr>
                <td>
                    <a class="btn btn-success btn-block" href="<?php echo site_url("pv/charger_etude_solaire"); ?>">
                            <i class="ace-icon fa fa-sun-o fa-2x"></i>
                        Etude solaire
                    </a>
                </td>
                <td>
                    <?php
                    echo $dossier['titre_PV'];
                    if ($dossier['recette_PV']!=0){
                        echo '<br/>Production sur 20 ans : '.number_format($dossier['recette_PV'], 0, ',', ' ').' €';
                    }
                    ?>


                </td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-success btn-block disabled">
                        <i class="ace-icon fa fa-home fa-2x"></i>
                        Bilan énergétique <br/>(en construction)
                    </a>
                </td>
                <td>
                    Pas d'étude
                </td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-success btn-block" href="<?php echo site_url("CI_devis/devis_form"); ?>">
                        <i class="ace-icon fa fa-list fa-2x"></i>
                        Devis
                    </a>
                </td>
                <td>
                    <?php
                    echo $dossier['Titre'];
                    if ($dossier['Montant']!=0){
                        echo '<br/>Total : '.number_format($dossier['Montant'], 0, ',', ' ').' €';
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>

Et une finalité