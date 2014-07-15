<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->



<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 class='center'>Clients</h1>
</div>

<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("CI_client/add_client"); ?>">
                    <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter un Client
                </a>
                <br/>
            </div>
        </div>

        <div class="tabbable">

            <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                    <a href="#actif" data-toggle="tab">Clients</a>
                </li>
                <li>
                    <a href="#archives" data-toggle="tab">Archives</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane in active" id="actif">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $this->fonctionspersos->creerTableau($clients, $enteteclients=NULL, 'CI_client/modif_client', 'CI_client/ajax_supprimerclient ');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="archives">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $this->fonctionspersos->creerTableau($clientsarchive, $enteteclients, 'CI_client/modif_client', 'CI_client/ajax_supprimerclient ');
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

