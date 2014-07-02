<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        Fiche de l'utilisateur : <?php echo $user['prenom'] . ' ' . $user['nom']; ?>
    </h1>
</div>


<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <!--Fiche d'indentité-->
            <div class="col-sm-4 ">
                
                <h2 class="green"><?php echo $user['prenom'] . ' ' . $user['nom']; ?></h2>
                <dl class="dl-horizontal">       
                    <dt>Identifiant : </dt><dd><?php echo $user['Identifiant'] ?></dd>
                    <dt>E-mail : </dt><dd><?php echo $user['email'] ?></dd>
                    <dt>Tel : </dt><dd><?php echo $user['tel'] ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Categorie : </dt><dd><?php echo $user['Nom_Categorie'] ?>
                        <?php echo (($user['Droit_SUDO'] == 1) ? "<br/>-Droit SUDO" : "") ?>
                        <?php echo (($user['Droit_Admin'] == 1) ? "<br/>-Droit Admin" : "") ?>
                        <?php echo (($user['Droit_Catalogue'] == 1) ? "<br/>-Droit Catalogue" : "") ?>
                        <?php echo (($user['Droit_Edit_Devis'] == 1) ? "<br/>-Droit Edit Devis" : "") ?></dd>
                </dl> 
                <dl class="dl-horizontal">       
                    <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); ?>
                    <dt>Date d'ajout : </dt><dd> <?php echo strftime('%A %d %B %Y',strtotime($user['Date_Ajout']));?></dd>
                    
                    <dt>Dernière connexion : </dt><dd><?php echo strftime('%A %d %B %Y',strtotime($user['Derniere_Connexion']));?></dd>
                    <dt>Statut : </dt><dd> <?php echo (($user['Actif'] == 1) ? "Actif" : "Désactivé") ?></dd>
                </dl>
            </div>

            <!--Actions-->
            <div class="col-sm-8">
                <!--Modif-->
                <div class='row'>
                    <div class="col-xs-12">
                        <div class="widget-box">
                            
                            <div class="widget-header">
                                <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                <h4 class="widget-title">Modifier l'utilisateur</h4>
                                <span class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </span>
                            </div>
                            <div class='widget-body'>
                                <div class='widget-main'>
                                    <?php
                                    //echo validation_errors();

                                    $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                                    $hiden = array();
                                    echo form_open('CI_user/modif_user', $attributes, $hiden);
                                    ?>
                                    <!--        <form class="form-horizontal" role="form">-->

                                    <div class='row form-group'>
                                        <label class="col-sm-3 no-padding-right control-label" for='Identifiant'>Identifiant</label>

                                        <div class="col-sm-5">
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="Identifiant" id="Identifiant" 
                                                   value="<?php echo set_value('Identifiant'); ?>" 
                                                   placeholder="Identifiant">
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('Identifiant'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-3 no-padding-right control-label" for="prenom">Prénom</label>

                                        <div class="col-sm-5">
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
                                        <label class="col-sm-3 no-padding-right control-label" for="nom">Nom</label>

                                        <div class="col-sm-5">
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
                                        <label class="col-sm-3 no-padding-right control-label" for="mdp">Email</label>

                                        <div class="col-sm-5">
                                            <input type="email" 
                                                   class="form-control" 
                                                   name="email" 
                                                   id="email" 
                                                   placeholder="exemple@nextwatt.fr"
                                                   value="<?php echo set_value('email'); ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-3 no-padding-right control-label" for="tel">Téléphone</label>

                                        <div class="col-sm-5">
                                            <input type="tel" 
                                                   name="tel" 
                                                   id="tel" 
                                                   value="<?php echo set_value('tel'); ?>"
                                                   placeholder="Votre numéro de téléphone"
                                                   class="form-control" >
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('tel'); ?>
                                        </div>
                                    </div>
                                    
                                   

                                    <div class="row form-group">
                                        <label class="col-sm-3 no-padding-right control-label" for="categorie">Catégorie</label>

                                        <div class="col-sm-5">
                                            <?php $this->fonctionspersos->creerDropdown($categories, 1, "Categories"); ?>
                                        </div>
                                    </div>

                                     <div class='row form-group'>
                                        <label class="col-sm-3 no-padding-right control-label" for='Actif'>Actif</label>
                                        <input type='hidden' name="Actif" value="off"/>
                                        <label class="col-sm-5">
                                            <input type="checkbox"
                                                   name="Actif" 
                                                   id='Actif' 
                                                   <?php
                                                   if (empty($_POST) AND isset($user)) {
                                                       echo (($user['Actif'] == 1) ? 'checked' : '');
                                                   } else {
                                                       echo ((set_value('Actif') == 'on') ? 'checked' : '');
                                                   }
                                                   ?>
                                                   class='ace ace-switch ace-switch-6 btn-empty' />
                                            <span class="lbl"></span>
                                        </label> 
                                        <div class="col-sm-4">
                                            <?php echo form_error('Actif'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-4 col-sm-offset-3">
                                            <button type="submit" class="btn btn-sm btn-info">
                                                <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--MDP-->
                <div class='row'>

                    <div class="col-xs-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class='widget-title'>Modification du mot de passe</h4>
                                <span class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </span>
                            </div>
                            <div class='widget-body'>

                                <div class='widget-main'>
                                    <?php
                                    //echo validation_errors();

                                    $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                                    $hiden = array();
                                    echo form_open('CI_user/modif_mdpuser', $attributes, $hiden);
                                    ?>
                                    <!--        <form class="form-horizontal" role="form">-->
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--fin du contenu-->
    </div>
</div>
