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
            <button type="button" class="btn btn-white btn-sm btn-primary">Lier options</button>
            <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Charger Catalogue</button>
            </a>
        </div>
        <br/><br/>
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete_catalogue_mini();

        //        $this->fonctionspersos->creerTableau($tableau, $entete,'CI_catalogue/aff_fiche_produit');

        //        echo('Liste des types');
        //        var_dump($Types);

        //        echo('Liste des porduits triés chelou');
        //        var_dump($produits_tries);
        ?>

        <div class="tabbable">

            <ul id="catalogue" class="nav nav-tabs">
                <?php
                foreach ($Types as $t) {
                    if ($t['id'] == 1) {
                        ?>
                        <li class="active">
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
<!--            --><?php //var_dump($catalogue); ?>
            <?php
            foreach ($catalogue as $index => $cataloguepartype)
            { ?>
            <div class="tab-content">

                <div class="tab-pane" id="<?php echo($index) ?>">
                    <?php
                    var_dump($cataloguepartype);
                    }
                    ?>
                </div>
            </div>

        </div>


    </div>
</div>


            
