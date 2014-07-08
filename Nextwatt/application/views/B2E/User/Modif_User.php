<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        Fiche de l'utilisateur : <?php echo $user['prenom'] . ' ' . $user['nom']; ?>
    </h1>
</div>


<div class='row'>
    <div class='col-sm-6'>
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title smaller">
                    Informations
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?php
                    //echo validation_errors();
                    $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
                    $hidden = array('id' => $user['id'], 'type' => 'infos');
                    echo form_open('CI_user/modif_user', $attributes, $hidden);
                    ?>

                    <div class="profile-user-info">

                        <!-- Indentifiant -->
                        <div class="profile-info-row">
                            <div class="profile-info-name">Identifiant</div>
                            <div class="profile-info-value">
                                <div class='row'>
                                    <div class='col-xs-12'>
                                        <input type="text"
                                               class="form-control input-sm"
                                               name="Identifiant" id="Identifiant"
                                               value="<?php
                                               if (empty($_POST) AND isset($user)) {
                                                   echo $user['Identifiant'];
                                               } else {
                                                   echo set_value('Identifiant');
                                               }
                                               ?>"
                                               placeholder="Identifiant">
                                    </div>
                                    <div class='col-xs-12'>
                                        <?php echo form_error('Identifiant'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Prénom et nom -->
                        <div class="profile-info-row">
                            <div class="profile-info-name">Prénom <br/>Nom</div>
                            <div class="profile-info-value">
                                <div class='row'>
                                    <div class='col-xs-12'>
                                        <input type="text"
                                               class="form-control input-sm"
                                               name="prenom" id="prenom"
                                               value="<?php
                                               if (empty($_POST) AND isset($user)) {
                                                   echo $user['prenom'];
                                               } else {
                                                   echo set_value('prenom');
                                               }
                                               ?>"
                                               placeholder="Votre Prénom">
                                    </div>
                                    <div class='col-xs-12'>
                                        <input type="text"
                                               class="form-control input-sm"
                                               name="nom" id="nom"
                                               value="<?php
                                               if (empty($_POST) AND isset($user)) {
                                                   echo $user['nom'];
                                               } else {
                                                   echo set_value('nom');
                                               }
                                               ?>"
                                               placeholder="Votre Nom">
                                    </div>
                                    <div class='col-xs-12'>
                                        <?php echo form_error('prenom'); ?>
                                    </div>
                                    <div class='col-xs-12'>
                                        <?php echo form_error('nom'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- E-mail -->
                        <div class="profile-info-row">
                            <div class="profile-info-name">E-mail</div>
                            <div class="profile-info-value">
                                <div class='row'>
                                    <div class='col-xs-12'>
                                        <input type="email"
                                               class="form-control input-sm"
                                               name="email"   id="email"
                                               placeholder="exemple@nextwatt.fr"
                                               value="<?php
                                               if (empty($_POST) AND isset($user)) {
                                                   echo $user['email'];
                                               } else {
                                                   echo set_value('email');
                                               }
                                               ?>" >
                                    </div>
                                    <div class='col-xs-12'>
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div class="profile-info-row">
                            <div class="profile-info-name">Téléphone</div>
                            <div class="profile-info-value">
                                <div class='row'>
                                    <div class='col-xs-12'>
                                        <input type="tel"
                                               name="tel"  id="tel"
                                               class="form-control input-sm"
                                               value="<?php
                                               if (empty($_POST) AND isset($user)) {
                                                   echo $user['tel'];
                                               } else {
                                                   echo set_value('tel');
                                               }
                                               ?>"
                                               placeholder="Votre numéro de téléphone">
                                    </div>
                                    <div class='col-xs-12'>
                                        <?php echo form_error('tel'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Catégorie -->
                        <div class="profile-info-row">
                            <div class="profile-info-name">Catégorie</div>
                            <div class="profile-info-value">
                                <div class='row'>
                                    <div class='col-xs-12'>
                                        <?php
                                        $cat = 1;
                                        if (empty($_POST) AND isset($user)) {
                                            $cat = $user['categorie_id'];
                                        } else {
                                            $cat = set_value('categorie_id');
                                        }
                                        $this->fonctionspersos->creerDropdown($categories, $cat, "categorie_id");
                                        ?>
                                    </div>

                                    <div class='col-xs-12'>
                                        <?php echo form_error('categorie_id'); ?>
                                    </div>
                                    <div class='col-xs-12'>
                                        <?php echo (($user['Droit_SUDO'] == 1) ? "<br/>-Droit SUDO" : "") ?>
                                        <?php echo (($user['Droit_Admin'] == 1) ? "<br/>-Droit Admin" : "") ?>
                                        <?php echo (($user['Droit_Catalogue'] == 1) ? "<br/>-Droit Catalogue" : "") ?>
                                        <?php echo (($user['Droit_Edit_Devis'] == 1) ? "<br/>-Droit Edit Devis" : "") ?>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Catégorie -->
                        <div class="profile-info-row">
                            <div class="profile-info-name">Actif</div>
                            <div class="profile-info-value">
                                <div class='row'>
                                    <div class='col-xs-12'>
                                        <input type='hidden' name="Actif" value="off"/>
                                        <label class="col-xs-12">
                                            <input type="checkbox"
                                                   name="Actif" id='Actif'
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
                                    </div>

                                    <div class='col-xs-12'>
                                        <?php echo form_error('Actif'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date d'ajout-->
                        <div class="profile-info-row">
                            <div class="profile-info-name">
                                Date d'ajout
                            </div>
                            <div class="profile-info-value">
                                <?php
                                setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                echo strftime('%A %d %B %Y', strtotime($user['Date_Ajout']));
                                ?>
                            </div>
                        </div>

                        <!-- Dernière conexcion-->
                        <div class="profile-info-row">
                            <div class="profile-info-name">
                                Dernière connexion
                            </div>
                            <div class="profile-info-value">
                                <?php echo strftime('%A %d %B %Y', strtotime($user['Derniere_Connexion'])); ?>
                            </div>
                        </div>
                    </div>


                    <div class='align-right'>
                        <!-- Validation -->
                        <button type="submit" class="btn btn-sm btn-info">
                            <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                            Enregistrer
                        </button>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">

        <!--MDP-->
        <div class='row'>

            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header widget-header-flat">
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

                            $attributes = array('class' => 'form-inline', 'id' => 'form_user', 'role' => 'form');
                            $hiden = array('id' => $user['id'],'type' => 'mdp');
                            echo form_open('CI_user/modif_user', $attributes, $hiden);
                            ?>
                            <input type="password"
                                   name='mdp'
                                   id="mdp"
                                   placeholder="Nouveau mot de passe">

                            <input type="password"
                                   name='confmdp'
                                   id="confmdp"
                                   placeholder="Confirmation">

                            <?php echo form_error('mdp'); ?>
                            <?php echo form_error('confmdp'); ?>


                            <button type="submit" class="btn btn-sm btn-info">
                                <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                                Valider
                            </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div
</div>
