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
        ?>

        <div class="sidebar responsive" id="sidebar">

        <div class="accordion-style1 panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne">
                            <i data-icon-show="ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down"
                               class="bigger-110 ace-icon fa fa-angle-right"></i>
                            Group Item #1
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>





    </div>
</div>


            
