<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>

    <div id="nav-search" class="nav-search">
        <form class="form-search">
          <span class="input-icon">
            <input type="text" class="nav-search-input" id="nav-search-input" autocomplete="off"
                   placeholder="Search ..."/>
            <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="btn-group">
            <a href="<?php echo site_url("CI_catalogue/lier_type_produit"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Lier type au produit</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/consult_soustype"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Gérer liste types</button>
            </a>
            <button type="button" class="btn btn-white btn-sm btn-primary disabled">Lier options (en construction)</button>
            <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Charger Catalogue</button>
            </a>
        </div>
        <br/><br/>
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete_catalogue_mini();
        ?>


        <div class="tabbable">
            <ul id="catalogue" class="nav nav-tabs">
                <li class="active">
                    <a href="#Photovoltaïque" data-toggle="tab">Catalogue</a>
                </li>
                <?php
                foreach ($Types as $t) {
                    if ($t['id'] == 1) {
                        ?>
                        <li>
                            <a href="#<?php echo($t['Nom_Type']) ?>" data-toggle="tab"><?php echo($t['Nom_Type']) ?></a>
                        </li> <?php
                    } elseif ($t['id'] == 10) {

                    } else {
                        ?>
                        <li>
                            <a href="#<?php echo($t['Nom_Type']) ?>" data-toggle="tab"><?php echo($t['Nom_Type']) ?></a>
                        </li> <?php
                    }
                }
                ?>
            </ul>
            <?php $this->load->library('fonctionspersos'); ?>
            <div class="tab-content">
                <?php foreach ($catalogue as $index => $soustypes) { ?>
                    <div class="tab-pane in active" id="<?php echo($index) ?>">
                        <?php
                        foreach ($soustypes as $index => $produits) {
                            echo('<h4>' . $index . '</h4>');
                            $this->fonctionspersos->creerTableau($produits, $entete);
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>






