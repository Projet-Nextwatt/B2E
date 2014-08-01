<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        Selectionnez un article</br>
    </h1>

</div>

<div class="row">
    <div class="col-xs-12">
        <br/><br/>
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete_catalogue_mini();
        ?>


        <div class="tabbable">
            <ul id="catalogue" class="nav nav-tabs">
                <?php
                $i = TRUE;
                foreach ($catalogue as $index => $t) {
                    if ($i == TRUE) {
                        $i = FALSE; ?>
                        <li class="active">
                            <a href="#<?php echo($index) ?>" data-toggle="tab"><?php echo($index) ?></a>
                        </li> <?php
                    } else {
                        ?>
                        <li>
                            <a href="#<?php echo($index) ?>" data-toggle="tab"><?php echo($index) ?></a>
                        </li> <?php
                    }

                }
                ?>
            </ul>
            <?php
            $this->load->library('fonctionspersos');
            $x = TRUE;
            ?>
            <div class="tab-content">
                <?php
                if (empty($catalogue)) {
                    echo('<h4>Les produits sont sans sous-types</h4>');
                } else {
                    foreach ($catalogue as $index => $soustypes) {
                        if ($x == TRUE) {
                            ?>
                            <div class="tab-pane in active" id="<?php echo($index) ?>">
                                <?php $x=FALSE;
                                foreach ($soustypes as $index => $produits) {
                                    echo('<h4>' . $index . '</h4>');
                                    $this->fonctionspersos->creerTableau($produits, $entete, 'CI_devis/select_produit_devis', null);
                                }
                                ?>
                            </div>
                        <?php }
                        else{
                            ?>
                            <div class="tab-pane" id="<?php echo($index) ?>">
                                <?php $x=FALSE;
                                foreach ($soustypes as $index => $produits) {
                                    echo('<h4>' . $index . '</h4>');
                                    $this->fonctionspersos->creerTableau($produits, $entete, 'CI_devis/select_produit_devis', null);
                                }
                                ?>
                            </div>
                        <?php
                        }
                    }
                } ?>

            </div>
        </div>
    </div>
</div>






