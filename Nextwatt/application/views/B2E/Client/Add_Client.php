<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        PAGE CLIENT</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i><?php if (isset($client)) {
                echo 'Modifier un client';
            } else {
                echo 'Ajouter un client';
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
            echo form_open('CI_client/modif_client', $attributes, $hidden);
        } else {
            echo form_open('CI_client/verif_form_client', $attributes, $hiden);
        }
        ?>


        <div class="form-group">
            <label for="civilite" class="col-sm-4 no-padding-right control-label">Civilité</label>

            <div class="col-sm-4">
                <select name="civilite" id="civilite" class="dropdown">
                    <option value="1">Madame</option>
                    <option value="2">Mademoiselle</option>
                    <option value="3" selected>Monsieur</option>
                </select>
            </div>
        </div>


        <div class="row form-group">
            <label for="nom1" class="col-sm-4 no-padding-right control-label">Nom</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['nom1'];
                } else {
                    echo set_value('nom1');
                }  ?>" name="nom1" class="form-control" id="nom1"
                       placeholder="Votre Nom">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('nom1'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label for="nom1" class="col-sm-4 no-padding-right control-label">Prénom</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['prenom1'];
                } else {
                    echo set_value('prenom1');
                } ?>" name="prenom1"
                       class="no-padding-left form-control" id="prenom1" placeholder="Votre prénom">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('prenom1'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="nom2" class="col-sm-4 no-padding-right control-label">Nom(Conjoint)</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['nom2'];
                } else {
                    echo set_value('nom2');
                } ?>" name="nom2" class="form-control" id="nom2"
                       placeholder="Votre Nom">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('nom2'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label for="nom2" class="col-sm-4 no-padding-right control-label">Prénom (Conjoint)</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['prenom2'];
                } else {
                    echo set_value('prenom2');
                } ?>" name="prenom2" class="form-control"
                       id="prenom2" placeholder="Votre prénom">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('prenom2'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="adresse" class="col-sm-4 no-padding-right control-label">Adresse</label>

            <div class="col-sm-4">
                <textarea class="col-sm-9" name="adresse" rows="3"
                          id="adresse" placeholder="Votre adresse"><?php if (empty($_POST) AND isset($client)) {
                        echo $client['adresse'];
                    } else {
                        echo set_value('adresse');
                    } ?>
                </textarea>
            </div>
            <div class="col-sm-4">
                <?php echo form_error('adresse'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="codepostal" class="col-sm-4 no-padding-right control-label">Code Postal</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['codepostal'];
                } else {
                    echo set_value('codepostal');
                } ?>" name="codepostal" class="form-control"
                       id="codepostal" placeholder="Code Postal">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('codepostal'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label for="ville" class="col-sm-4 no-padding-right control-label">Ville </label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['ville'];
                } else {
                    echo set_value('ville');
                } ?>" name="ville" id="ville"
                       class="form-control" placeholder="Ville">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('ville'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="email" class="col-sm-4 no-padding-right control-label">Email</label>

            <div class="col-sm-4">
                <input type="email" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['email'];
                } else {
                    echo set_value('email');
                } ?>" name="email" class="form-control"
                       id="email" placeholder="Email">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('email'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="tel1" class="col-sm-4 no-padding-right control-label">Téléphone fixe</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['tel1'];
                } else {
                    echo set_value('tel1');
                } ?>" name="tel1" class="form-control" id="tel1"
                       placeholder="Teléphone fixe">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('tel1'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label for="tel2" class="col-sm-4 no-padding-right control-label">Téléphone portable</label>

            <div class="col-sm-4">
                <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
                    echo $client['tel2'];
                } else {
                    echo set_value('tel2');
                } ?>" name="tel2" class="form-control" id="tel2"
                       placeholder="Teléphone portable">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('tel2'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label for="user_id" class="col-sm-4 no-padding-right control-label">Responsable</label>

            <div class="col-sm-3">
                <?php $this->fonctionspersos->creerDropdown($users, $client['user_id'], 'user_id'); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <?php echo form_error('user_id'); ?>
        </div>

        <div class="row form-group">
            <div class="col-md-offset-4 col-md-4">
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>

<?php
            if (isset($client)) {
              ?>
                    <button type="button" class="btn btn-sm btn-danger">
                        <i class="ace-icon fa fa-trash-o bigger-160"></i>
                        Supprimer
                 </button><?php
            }
            ?>
            </div>
        </div>

        <?php
        echo form_close();
        ?>

    </div>
</div>

