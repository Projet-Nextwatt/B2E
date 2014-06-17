<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        PAGE CLIENT</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Accueil des clients</small>
    </h1>
</div>


<div class="row form-group">
    <div class="col-xs-12">


        <?php

        $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
        $hiden = array();
        echo form_open('client/verif_form_client', $attributes, $hiden);
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
                    <input type="text" value="<?php echo set_value('nom1'); ?>" name="nom1" class="form-control" id="nom1" placeholder="Votre Nom">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('nom1'); ?>
                </div>
            </div>
            <div class="row form-group">
                    <label for="nom1" class="col-sm-4 no-padding-right control-label">Prénom</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('prenom1'); ?>" name="prenom1" class="no-padding-left form-control" id="prenom1" placeholder="Votre prénom">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('prenom1'); ?>
                </div>
            </div>


            <div class="row form-group">
                <label for="nom2" class="col-sm-4 no-padding-right control-label">Nom(Conjoint)</label>

                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('nom2'); ?>" name="nom2" class="form-control" id="nom2" placeholder="Votre Nom">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('nom2'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label for="nom2" class="col-sm-4 no-padding-right control-label">Prénom (Conjoint)</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('prenom2'); ?>" name="prenom2" class="form-control" id="prenom2" placeholder="Votre prénom">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('prenom2'); ?>
                </div>
            </div>


            <div class="row form-group">
                <label for="adresse" class="col-sm-4 no-padding-right control-label">Adresse</label>

                <div class="col-sm-4">
                    <textarea class="col-sm-9" value="<?php echo set_value('adresse'); ?>" name="adresse" rows="3" id="adresse" placeholder="Votre adresse"></textarea>
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('adresse'); ?>
                </div>
            </div>


            <div class="row form-group">
                <label for="codepostal" class="col-sm-4 no-padding-right control-label">Code Postal</label>

                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('codepostal'); ?>" name="codepostal" class="form-control" id="codepostal" placeholder="Code Postal">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('codepostal'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label for="ville" class="col-sm-4 no-padding-right control-label">Vile </label>
                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('ville'); ?>" name="ville" id="ville" class="form-control" placeholder="Ville">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('ville'); ?>
                </div>
            </div>


            <div class="row form-group">
                <label for="email" class="col-sm-4 no-padding-right control-label">Email</label>

                <div class="col-sm-4">
                    <input type="email" value="<?php echo set_value('email'); ?>" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('email'); ?>
                </div>
            </div>


            <div class="row form-group">
                <label for="tel1" class="col-sm-4 no-padding-right control-label">Téléphone fixe</label>

                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('tel1'); ?>" name="tel1" class="form-control" id="tel1" placeholder="Teléphone fixe">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('tel1'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label for="tel2" class="col-sm-4 no-padding-right control-label">Téléphone portable</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php echo set_value('tel2'); ?>" name="tel2" class="form-control" id="tel2" placeholder="Teléphone portable">
                </div>
                <div class="col-sm-4">
                    <?php echo form_error('tel2'); ?>
                </div>
            </div>

            <div class="row form-group">
                <label for="responsable" class="col-sm-4 no-padding-right control-label">Responsable</label>

                <div class="col-sm-3">
                    <select name="responsable" class="dropdown">
                        <option value="1">Stephane</option>
                        <option value="2">Xavier</option>
                        <option value="2">Marc</option>
                    </select>
                </div>
            </div>
        <div class="col-sm-4">
            <?php echo form_error('responsable'); ?>
        </div>

        <div algin="center"><input type="submit" value="Submit"/></div>

        <?php echo form_close(); ?>

        <?php var_dump($_POST); ?>
        </form>
    </div>
</div>

