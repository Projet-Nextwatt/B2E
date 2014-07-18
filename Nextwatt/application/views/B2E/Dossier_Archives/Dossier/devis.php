<div class="page-header">
    <h1 class='center'>DEVIS</h1>

    <div align="center">
        <br/>

        <div class="btn-group">
            <a href="<?php echo site_url("CI_catalogue/lier_type_produit"); ?>">
                <button type="button" class="btn btn-sm btn-primary">Retour</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/consult_soustype"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Archiver</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/consult_soustype"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Devis PDF</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
                <button type="button" class="btn btn-sm btn-grey">Bdc PDF</button>
            </a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row form-group">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-3 col-xs-offset-2">
                    <div class="widget-box">
                        <div class="widget-header">
                            Client
                        </div>
                        <div class="widget-body">
                            <!--                --><?php //var_dump($this->session->userdata) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-offset-2">
                    <div class="widget-box">
                        <div class="widget-header">
                            Tarif
                        </div>
                        <div class="widget-body"></div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-9 col-xs-offset-2">
                    <div class="widget-box">
                        <div class="widget-header">
                            Client
                        </div>
                        <div class="widget-body">
                            blabla
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>