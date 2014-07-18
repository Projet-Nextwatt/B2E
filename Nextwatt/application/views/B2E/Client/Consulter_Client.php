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


        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">

                    <ul id="myTab" class="nav nav-tabs">
                        <li >
                            <a href="#ajout" data-toggle="tab" class="btn btn-primary btn-sm">
                                <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter un Client
                            </a>
                        </li>
                        <li class="active">
                            <a href="#actif" data-toggle="tab">Clients</a>

                        </li>
                        <li>
                            <a href="#archives" data-toggle="tab">Archives</a>
                        </li>   
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane in active" id="actif">

                            <div class="panel panel-success">
                                <!-- Default panel contents -->
                                <div class="panel-heading align-left">Mes clients</div>
                                <?php $this->fonctionspersos->creerTableau($mesclients, $enteteclients = NULL, $modedossier, 'CI_client/ajax_supprimerclient '); ?>
                            </div>

                            
                            <?php if ($this->session->userdata("userconnect")["Droit_Admin"]==1 AND isset($clients)) {?> 
                            <div id="accordion" class="accordion-style1 panel-group accordion-style2">
                                <!-- 1er accordeon toujours ouvert -->
                                <!--
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                &nbsp;Group Item #1
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse in" id="collapseOne" style="height: auto;">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        </div>
                                    </div>
                                </div>
                                -->
                                
                            <?php foreach ($clients as $user_id => $clientsduuser){ ?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $user_id; ?>">
                                                <i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                
                                                <span class="badge"><?php echo count($clientsduuser); ?></span>
                                                <?php echo $users[$user_id]['nom'];?> 
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse" id="collapse<?php echo $user_id; ?>" style="height: 0px;">
                                        <div class="panel-body">    
                                            <?php $this->fonctionspersos->creerTableau($clientsduuser, $enteteclients = NULL, 'CI_client/modif_client', 'CI_client/ajax_supprimerclient '); ?>
                                         </div>
                                    </div>
                                </div>
                                
                                
                            <?php } ?>


                            </div> <!-- fin de l'accordeon -->
                            <?php } //fin du if admin?>
                            
                        </div>







                        <div class="tab-pane" id="archives">
                            
                            <div class="panel panel-success">
                                <!-- Default panel contents -->
                                <div class="panel-heading align-left">Mes clients archivés</div>
                                <?php $this->fonctionspersos->creerTableau($mesclientsarchive, $enteteclients = NULL, 'CI_client/modif_client', 'CI_client/ajax_supprimerclient '); ?>
                            </div>

                            <?php if ($this->session->userdata("userconnect")["Droit_Admin"]==1 AND isset($clients)) {?> 
                            <div id="accordion2" class="accordion-style1 panel-group accordion-style2">
                                <!-- 1er accordeon toujours ouvert -->
                                <!--
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                &nbsp;Group Item #1
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse in" id="collapseOne" style="height: auto;">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        </div>
                                    </div>
                                </div>
                                -->
                                
                            <?php foreach ($clientsarchive as $user_id => $clientsarchiveduuser){ ?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsearchive<?php echo $user_id; ?>">
                                                <i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                
                                                <span class="badge"><?php echo count($clientsarchiveduuser); ?></span>
                                                <?php echo $users[$user_id]['nom'];?> 
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse" id="collapsearchive<?php echo $user_id; ?>" style="height: 0px;">
                                        <div class="panel-body">    
                                            <?php $this->fonctionspersos->creerTableau($clientsarchiveduuser, $enteteclients = NULL, 'CI_client/modif_client', 'CI_client/ajax_supprimerclient '); ?>
                                         </div>
                                    </div>
                                </div>
                                
                                
                            <?php } ?>


                            </div> <!-- fin de l'accordeon -->
                            <?php } //fin du if admin?>
                            
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="tab-pane" id="ajout">
                            <?php $this->load->view('B2E/Client/Add_Client') ?>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                    </div>
                </div>
            </div>
        </div>

    </div>  
</div>

