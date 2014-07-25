<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        PAGE USER</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Ajouter un nouvel utilisateur</small>
    </h1>
</div>


<div class="row">
    <div class="col-xs-12">

        <?php
        //echo validation_errors    ();

        $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
        $hiden = array();
        echo form_open('CI_user/add_user', $attributes, $hiden);
        ?>
        <!--        <form class="form-horizontal" role="form">-->

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Identifiant'>Identifiant</label>

            <div class="col-sm-4">
                <?php
                $data = array('name' => 'Identifiant',
                    'id' => 'Identifiant',
                    'class' => 'form-control',
                    'value' => set_value('Identifiant'),
                    'maxlength' => '255',
                    'size' => '50',
                    'placeholder' => 'Identifiant',
                    'onClick' => 'some_function()');
                echo form_input($data);
                ?>
            </div>
            <div class="col-sm-4">
                <?php echo form_error('Identifiant'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for='mdp'>Mot de passe</label>

            <div class="col-sm-2">
                <input type="password" 
                       name='mdp' 
                       id="mdp" 
                       placeholder="Mot de passe" 
                       class="form-control">
            </div>
            <div class="col-sm-2">
                <input type="password" 
                       name='confmdp' 
                       id="confmdp" 
                       placeholder="Confirmation mdp" 
                       class="form-control">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('mdp'); ?>
                <?php echo form_error('confmdp'); ?>
            </div>
        </div>

        

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="prenom">Prénom</label>

            <div class="col-sm-4">
                <input type="text" 
                       class="form-control" 
                       name="prenom" id="prenom" 
                       value="<?php echo set_value('prenom'); ?>" 
                       placeholder="Votre Prénom">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('prenom'); ?>
            </div>

        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="nom">Nom</label>

            <div class="col-sm-4">
                <input type="text" 
                       class="form-control" 
                       name="nom" 
                       id="nom" 
                       placeholder="Votre Nom"
                       value="<?php echo set_value('nom'); ?>">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('nom'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="mdp">Email</label>

            <div class="col-sm-4">
                <input type="email" 
                       class="form-control" 
                       name="email" 
                       id="email" 
                       placeholder="exemple@nextwatt.fr"
                       value="<?php echo set_value('email');?>">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('email'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="tel">Téléphone</label>

            <div class="col-sm-4">
                <input type="tel" 
                       name="tel" 
                       id="tel" 
                       value="<?php echo set_value('tel');?>"
                       placeholder="Votre numéro de téléphone"
                       class="form-control" >
            </div>
            <div class="col-sm-4">
                <?php echo form_error('tel'); ?>
            </div>
        </div>
        
        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="categorie">Catégorie</label>

            <div class="col-sm-4">
                <?php $this->fonctionspersos->creerDropdown($categories,1,"Categories"); ?>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-offset-4 col-sm-4 col-xs-offset-3">
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>
            </div>
        </div>

        <?php echo form_close(); ?>
        

    </div>
</div>
