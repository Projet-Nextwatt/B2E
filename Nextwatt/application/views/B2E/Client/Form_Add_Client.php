<div class="row form-group">
    <div class="col-xs-12">

        <?php // Ouverture du formulaire
        $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
        $hiden = array();
        
        $dossier = null;
        if (isset($_GET['dossier']) AND $_GET['dossier'] == 'TRUE') 
        {
            $dossier = '?dossier=TRUE';
        }
        
        echo form_open('CI_client/consult_client' . $dossier, $attributes, $hiden);
        ?>
        
        <!--<h4 class='green header'>Informations</h4>-->
        
        <div class='row form-group'>
        <div class="col-xs-12 label label-lg label-success arrowed-right">
            <b>Informations</b>
        </div>
        </div>
        
        
        <div class="row form-group">
            <label for="civilite" class="col-sm-3 no-padding-right control-label">Civilité</label>

            <div class="col-sm-4">
                <?php
                $civ = 3;
                if (set_value('civilite')!=0){
                    $civ = set_value('civilite');
                }
                ?>
                <select name="civilite" id="civilite" class="dropdown">
                    <option value="1" <?php echo($civ == 1 ? 'selected' : ''); ?>>Madame</option>
                    <option value="2" <?php echo($civ == 2 ? 'selected' : ''); ?>>Mademoiselle</option>
                    <option value="3" <?php echo($civ == 3 ? 'selected' : ''); ?>>Monsieur</option>
                </select>
            </div>
        </div>


        <div class="row form-group">
            <label for="nom1" class="col-sm-3 no-padding-right control-label">Nom et Prénom</label>

            <div class="col-sm-3">
                <input type="text" value="<?php   echo set_value('nom1'); ?>"
                       name="nom1" id="nom1"
                       class="form-control" 
                       placeholder="Votre Nom">
            </div>
            <div class="col-sm-3">
                <input type="text" value="<?php  echo set_value('prenom1'); ?>"
                       name="prenom1" id="prenom1" 
                       class="no-padding-left form-control" 
                       placeholder="Votre prénom">
            </div>
            <div class="col-sm-3">
                <?php echo form_error('nom1'); ?>
                <?php echo form_error('prenom1'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="nom2" class="col-sm-3 no-padding-right control-label">Conjoint</label>

            <div class="col-sm-3">
                <input type="text" value="<?php echo set_value('nom2');?>" 
                       name="nom2"  id="nom2"
                       class="form-control"
                       placeholder="(si différent) Nom">
            </div>
            <div class="col-sm-3">
                <input type="text" value="<?php echo set_value('prenom2'); ?>" 
                       name="prenom2" id="prenom2"
                       class="form-control"
                       placeholder="Prénom">
            </div>
            <div class="col-sm-3">
                <?php echo form_error('nom2'); ?>
                <?php echo form_error('prenom2'); ?>
            </div>
        </div>

        <div class='row form-group'>
        <div class="col-xs-12 label label-lg label-success  arrowed-right">
            <b>Adresse</b>
        </div>
        </div>
        

        <div class="row form-group">
            <label for="adresse" class="col-sm-3 no-padding-right control-label">Adresse</label>

            <div class="col-sm-6">
                <textarea class="col-xs-12" 
                          name="adresse" id="adresse"
                          rows="3"
                          placeholder="Votre adresse"
                          ><?php echo set_value('adresse'); ?></textarea>
            </div>
            <div class="col-sm-3">
                <?php echo form_error('adresse'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="codepostal" class="col-sm-3 no-padding-right control-label">Code Postal et Ville</label>

            <div class="col-sm-2">
                <input type="text" value="<?php echo set_value('codepostal'); ?>" 
                       name="codepostal" id="codepostal"
                       class="form-control"
                       placeholder="Code Postal">
            </div>
            <div class="col-sm-4">
                <input type="text" value="<?php echo set_value('ville'); ?>" 
                       name="ville" id="ville"
                       class="form-control" 
                       placeholder="Ville">
            </div>
            <div class="col-sm-3">
                <?php echo form_error('codepostal'); ?>
                <?php echo form_error('ville'); ?>
            </div>
        </div>

        <div class='row form-group'>
        <div class="col-xs-12 label label-lg label-success arrowed-right">
            <b>Coordonées</b>
        </div>
        </div>

        <div class="row form-group">
            <label for="email" class="col-sm-3 no-padding-right control-label">Email</label>

            <div class="col-sm-6">
                <input type="email" value="<?php echo set_value('email');?>"
                       name="email" id="email"
                       class="form-control"
                        placeholder="Email">
            </div>
            <div class="col-sm-3">
                <?php echo form_error('email'); ?>
            </div>
        </div>


        <div class="row form-group">
            <label for="tel1" class="col-sm-3 no-padding-right control-label">Téléphone</label>

            <div class="col-sm-3">
                <input type="text" value="<?php echo set_value('tel1'); ?>"
                       name="tel1" id="tel1" 
                       class="form-control" 
                       placeholder="Teléphone fixe (par exemple)">
            </div>
            <div class="col-sm-3">
                <input type="text" value="<?php echo set_value('tel2'); ?>"
                       name="tel2" id="tel2"
                       class="form-control" 
                       placeholder="Teléphone portable (par exemple)">
            </div>
            <div class="col-sm-3">
                <?php echo form_error('tel1'); ?>
                <?php echo form_error('tel2'); ?>
            </div>
        </div>

        <div class="row form-group">
            <label for="user_id" class="col-sm-3 no-padding-right control-label">Responsable</label>

            <div class="col-sm-6">
                
                <?php 
                $respo = $this->session->userdata('userconnect')['id_login'];
                if (isset ($_POST['user_id'])){
                    $respo = $_POST['user_id'];
                }
                
                if ($this->session->userdata('userconnect')['Droit_Admin']){
                    $this->fonctionspersos->creerDropdown($usersdropdown, $respo, 'user_id');
                }
                else
                {?>
                    
                    <?php echo $this->session->userdata('userconnect')['prenom'].' '.
                            $this->session->userdata('userconnect')['nom']?>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $respo;?>">
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-3">
            <?php echo form_error('user_id'); ?>
        </div>

        <div class="row form-group">
            <div class="col-xs-offset-3 col-md-6">
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>
            </div>
        </div>
<?php
echo form_close();
?>