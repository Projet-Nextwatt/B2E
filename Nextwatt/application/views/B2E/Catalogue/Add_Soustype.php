<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        Sous-Types</br>
        <small><i class="ace-icon fa fa-angle-double-right"> </i><?php if (isset($client)) {
                echo ' Gestion de la liste des sous-types';
            } else {
                echo ' Gestion de la liste des sous-types';
            }
            ?></small>
    </h1>
</div>


<div class="row form-group">
    <div class="col-xs-12">


        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
        $hiden = array();

        if (isset($client)) {
            $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
            echo form_open('CI_catalogue/gererlistetype_action', $attributes, $hidden);
        } else {
            echo form_open('CI_catalogue/gererlistetype_action', $attributes, $hiden);
        }

        ?>


        <div class="form-group">
            <label for="civilite" class="col-sm-4 no-padding-right control-label">Type parent </label>

            <div class="col-sm-4">
                <select name="type" id="type" class="dropdown">
                    <option value="1"selected>Photovoltaïque</option>
                    <option value="2">Isolation</option>
                    <option value="3">Chaudière</option>
                    <option value="3">Pompe à chaleur</option>
                    <option value="3">Chauffaque ENR</option>
                    <option value="3">Eolienne</option>
                    <option value="3">Eau chaude sanitaire</option>
                    <option value="3">Emetteur</option>
                    <option value="3">Options</option>
                </select>
            </div>
        </div>


        <div class="row form-group">
            <label for="nomcourt" class="col-sm-4 no-padding-right control-label">Nom Court</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['nomcourt'];
                } else {
                    echo set_value('nomcourt'); }  ?>" name="nomcourt" class="form-control" id="nomcourt"
                       placeholder="Nom court du sous-type">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('nomcourt'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label for="nomdevis" class="col-sm-4 no-padding-right control-label">Nom pour devis</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) { echo $client['nomdevis'];}
                else { echo set_value('nomdevis');} ?>" name="nomdevis"
                       class="no-padding-left form-control" id="nomdevis" placeholder="Nom pour le devis">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('nomdevis'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="bouquetCI" class="col-sm-4 no-padding-right control-label">Catégorie Bouquet CI</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) { echo $client['bouquetCI'];} else { echo set_value('bouquetCI');} ?>" name="bouquetCI" class="form-control" id="bouquetCI"
                       placeholder="Bouquet CI">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('bouquetCI'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label for="bouquetEPTZ" class="col-sm-4 no-padding-right control-label">Catégorie Bouquet EPTZ</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) { echo $client['bouquetEPTZ'];} else { echo set_value('bouquetEPTZ');} ?>" name="bouquetEPTZ" class="form-control"
                       id="bouquetEPTZ" placeholder="Bouquet EPTZ">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('bouquetEPTZ'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="CIunitaire" class="col-sm-4 no-padding-right control-label">CI Unitaire</label>

            <div class="col-sm-4">
                <input type="text" class="form-control" name="CIunitaire" id="CIunitaire" placeholder="Crédit d'impo unitaire" value="<?php if (empty($_POST) AND isset($client)) {
                        echo $client['CIunitaire'];
                    } else {
                        echo set_value('CIunitaire');
                    } ?>"
                >
            </div>
            <div class="col-sm-4">
                <?php echo form_error('CIunitaire'); ?>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-offset-4 col-md-4">
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>
            </div>
        </div>

        <?php
        echo form_close();
        ?>

    </div>
</div>

