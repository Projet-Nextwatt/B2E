<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>

<div class="btn-group">
        <a href="<?php echo site_url("CI_catalogue/load_catalogue"); ?>">
        <button  type="button" class="btn btn-white btn-sm btn-primary">Lier type au produit</button></a>
        <button type="button" class="btn btn-white btn-sm btn-primary">Gérer la liste des types</button>
        <button type="button" class="btn btn-white btn-sm btn-primary">Lier options</button>
        <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
        <button type="button" class="btn btn-white btn-sm btn-primary">Charger Catalogue</button></a>
</div>

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
        <?php
            $fichier = $this->fonctionspersos->lire_fichier_catalogue();
            $entete = $this->fonctionspersos->set_entete();

            $this->fonctionspersos->creerTableau($fichier, $entete);
            var_dump($fichier);
        ?>
    </div>
</div>

            
