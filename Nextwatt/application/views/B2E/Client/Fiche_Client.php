<div class="row form-group">
<div class="col-xs-12">

<div class='row'>
<div class='col-md-6'>
    <div class="widget-box">
        <div class="widget-header widget-header-flat">
            <h4 class='widget-title'>Fiche client</h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <h4><strong>
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
                    </strong></h4>

                <p>
                    <?php
                    echo nl2br($client['adresse']) . '<br/>'
                        . $client['codepostal'] . ' ' . $client['ville'];
                    ?>
                </p>


                <?php if (!(empty($client['email']))) { ?>
                    <p>
                        <strong>E-mail : </strong> <?php echo $client['email'] ?><br/>
                        <a href="mailto:<?php echo($client['email']) ?>">Envoyer un e-mail au client</a>
                    </p>
                <?php } ?>

                <?php if (!(empty($client['tel1'])) OR !(empty($client['tel2']))) { ?>
                    <p>
                        <strong>Téléphone : </strong>
                        <?php
                        echo $client['tel1'];
                        echo((empty($client['tel1']) OR (empty($client['tel2']))) ? '' : ' / ');
                        echo $client['tel2'];
                        ?>
                    </p>
                <?php } ?>

                <p>
                    <strong>Responsable : </strong> <?php echo $responsable; ?>
                </p>
            </div>
        </div>
    </div>
</div>


<div class='col-md-6'>
<div class='row'>
<div class='col-xs-12'>
<div class="widget-box <?php echo (empty($_POST)?'collapsed':''); ?>">
<div class="widget-header widget-header-flat">
    <h4 class='widget-title'>Modification des informations</h4>
                        <span class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa <?php echo (empty($_POST)?'fa-chevron-down':'fa-chevron-up'); ?>"></i>
                            </a>
                        </span>
</div>
<div class='widget-body'>
<div class='widget-main'>

                            <?php $this->load->view('B2E/Client/Form_Modif_Client') ?>
</div>
</div>
</div>
</div>
</div>


<div class='row'>
    <div class='col-xs-12'>
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class='widget-title'>Actions</h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">

                    <?php if (isset($client) && $client['actif'] == 0) { ?>
                        <button type="button" data-toggle="modal" data-target="#Confsuppr"
                                class="btn btn-sm btn-danger">
                            <i class="ace-icon fa fa-trash-o bigger-160"></i>
                            Supprimer
                        </button>
                    <?php } ?>


                    <?php if (isset($client) && $client['actif'] == 1) { ?>
                        <button type="button" data-toggle="modal" data-target="#Confarchiver"
                                class="btn btn-sm btn-warning">
                            <i class="ace-icon fa fa-trash-o bigger-160"></i>
                            Archiver
                        </button>
                    <?php } ?>





                    <?php if (isset($client) && $client['actif'] == 0) { ?>
                        <button type="button" data-toggle="modal" data-target="#Confactiver"
                                class="btn btn-sm btn-success">
                            <i class="ace-icon fa fa-check bigger-160"></i>
                            Désarchiver
                        </button>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- fin de l'a colonne n°2-->


</div>
<!-- fin de la première row -->

<div class='row'>
<div class='col-md-12'>
    <div class="widget-box">
        <div class="widget-header widget-header-flat">
            <h4 class='widget-title'>Dossiers</h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <?php $this->fonctionspersos->creerTableau($dossiers, array(), 'CI_Dossier/select_dossier') ?>          
            </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- Fin d conteneur pricipal --></div>


<!-- Modal box supprimer -->
<div id="Confsuppr" class="modal fade">
    <div class="modal-dialog" style="display: block; height: auto; width: 300px; top: 194px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="ace-icon fa fa-exclamation-triangle red"></i> Supprimer l'élément ?
                </h4>
            </div>
            <div class="modal-body alert alert-info bigger-110">
                <p>Vous êtes sur le point de supprimer le client.</p>
            </div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                Êtes vous sur ?
            </p>

            <div class="modal-footer">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                $hidden = array();

                $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
                echo form_open('CI_client/ajax_supprimerclient', $attributes, $hidden);
                ?>
                <button type="submit" class="btn btn-sm btn-danger">Suppression</button>
                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Annuler</button>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal box pour archivage -->
<div id="Confarchiver" class="modal fade">
    <div class="modal-dialog" style="display: block; height: auto; width: 300px; top: 194px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="ace-icon fa fa-exclamation-triangle red"></i> Archiver le client ?
                </h4>
            </div>
            <div class="modal-body alert alert-info bigger-110">
                <p>Vous êtes sur le point d'archiver ce client.</p>
            </div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                Êtes vous sur ?
            </p>

            <div class="modal-footer">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                $hidden = array();

                $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
                echo form_open('CI_client/ajax_archiverclient', $attributes, $hidden);
                ?>
                <button type="submit" class="btn btn-sm btn-danger">Archiver</button>
                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Annuler</button>

                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal box pour désarchivage -->
<div id="Confactiver" class="modal fade">
    <div class="modal-dialog" style="display: block; height: auto; width: 300px; top: 194px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="ace-icon fa fa-exclamation-triangle red"></i> Désarchiver le client ?
                </h4>
            </div>
            <div class="modal-body alert alert-info bigger-110">
                <p>Vous êtes sur le point de désarchiver ce client.</p>
            </div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                Êtes vous sur ?
            </p>

            <div class="modal-footer">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                $hidden = array();
                $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
                echo form_open('CI_client/ajax_activerclient', $attributes, $hidden);
                ?>
                <button type="submit" class="btn btn-sm btn-danger">Confirmer</button>
                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Annuler</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
