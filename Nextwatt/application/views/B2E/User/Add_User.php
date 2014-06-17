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
        echo validation_errors();

        $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
        $hiden = array();
        echo form_open('user/verif_form_user', $attributes, $hiden);
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

            <div class="col-sm-4">
                <input type="password" name='mdp' id="mdp" placeholder="Mot de passe" class="form-control">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('mdp'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="mdp">Confirmation mdp</label>
            <div class="col-sm-4">
                <input type="password" name='confmdp' id="confmdp" placeholder="Confirmation mdp" class="form-control">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('confmdp'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="prenom">Prénom</label>

            <div class="col-sm-4">
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo set_value('identifiant'); ?>" placeholder="Votre Prénom">
            </div>

            <div class="col-sm-4">
                <?php echo form_error('prenom'); ?>
            </div>

        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="nom">Nom</label>

            <div class="col-sm-4">
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre Nom"
                       value="<?php echo set_value('nom'); ?>">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('nom'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="mdp">Email</label>

            <div class="col-sm-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="exemple@nextwatt.fr">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('email'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="tel">Telephone</label>

            <div class="col-sm-4">
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Votre numéro de telephone">
            </div>
            <div class="col-sm-4">
                <?php echo form_error('tel'); ?>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 no-padding-right control-label" for="categorie">Catégorie</label>

            <div class="col-sm-4">
                <?php echo form_error('categorie'); ?>
                <select name="categorie" class="dropdown" id="categorie">
                    <option value="1">Commercial</option>
                    <option value="2">Directeur Co</option>
                    <option value="2">Grand Chef</option>
                </select>
            </div>
        </div>

        <div algin="center"><input type="submit" value="Submit"/></div>

        <?php echo form_close(); ?>

        <?php var_dump($_POST); ?>

    </div>
</div>
</div>
