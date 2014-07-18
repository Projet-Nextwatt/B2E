<div class="row form-group">
<div class="col-xs-12">

<?php

$attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
$hiden = array();

if (isset($client)) {
    $hidden = array('id' => $client['id'], 'Client' => $client['nom1']);
    echo form_open('CI_client/modif_client', $attributes, $hidden);
} else {
    echo form_open('CI_client/consult_client', $attributes, $hiden);
}
?>
    <?php if (isset($client) AND isset($client['email'])) {?>
<div align="center">
    <a href="mailto:<?php echo($client['email']) ?>">Envoyer un e-mail au client</a>
</div>
    <?php } ?>

<h4 class='green header'>Informations</h4>

<div class="form-group">
    <label for="civilite" class="col-sm-3 no-padding-right control-label">Civilité</label>

    <div class="col-sm-4">
        <?php
        $civ = 3;
        if (empty($_POST) AND isset($client)) {
            $civ = $client['civilite'];
        } else {
            $civ = set_value('civilite');
        } ?>
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
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['nom1'];
        } else {
            echo set_value('nom1');
        }  ?>" name="nom1" class="form-control" id="nom1"
               placeholder="Votre Nom">
    </div>
    <div class="col-sm-3">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['prenom1'];
        } else {
            echo set_value('prenom1');
        } ?>" name="prenom1"
               class="no-padding-left form-control" id="prenom1" placeholder="Votre prénom">
    </div>
    <div class="col-sm-3">
        <?php echo form_error('nom1'); ?>
        <?php echo form_error('prenom1'); ?>
    </div>
</div>


<div class="row form-group">
    <label for="nom2" class="col-sm-3 no-padding-right control-label">Conjoint</label>

    <div class="col-sm-3">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['nom2'];
        } else {
            echo set_value('nom2');
        } ?>" name="nom2" class="form-control" id="nom2"
               placeholder="(si différent) Nom">
    </div>
    <div class="col-sm-3">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['prenom2'];
        } else {
            echo set_value('prenom2');
        } ?>" name="prenom2" class="form-control"
               id="prenom2" placeholder="Prénom">
    </div>
    <div class="col-sm-3">
        <?php echo form_error('nom2'); ?>
        <?php echo form_error('prenom2'); ?>
    </div>
</div>


<h4 class='green header'>Adresse</h4>

<div class="row form-group">
    <label for="adresse" class="col-sm-3 no-padding-right control-label">Adresse</label>

    <div class="col-sm-6">
        <textarea class="col-xs-12" name="adresse" rows="3"
                  id="adresse" placeholder="Votre adresse"
                  ><?php if (empty($_POST) AND isset($client)) { echo $client['adresse']; } else { echo set_value('adresse'); } ?></textarea>
    </div>
    <div class="col-sm-3">
        <?php echo form_error('adresse'); ?>
    </div>
</div>


<div class="row form-group">
    <label for="codepostal" class="col-sm-3 no-padding-right control-label">Code Postal et Ville</label>

    <div class="col-sm-2">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['codepostal'];
        } else {
            echo set_value('codepostal');
        } ?>" name="codepostal" class="form-control"
               id="codepostal" placeholder="Code Postal">
    </div>
    <div class="col-sm-4">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['ville'];
        } else {
            echo set_value('ville');
        } ?>" name="ville" id="ville"
               class="form-control" placeholder="Ville">
    </div>
    <div class="col-sm-3">
        <?php echo form_error('codepostal'); ?>
        <?php echo form_error('ville'); ?>
    </div>
</div>


<h4 class='green header'>Coordonées</h4>

<div class="row form-group">
    <label for="email" class="col-sm-3 no-padding-right control-label">Email</label>

    <div class="col-sm-6">
        <input type="email" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['email'];
        } else {
            echo set_value('email');
        } ?>" name="email" class="form-control"
               id="email" placeholder="Email">
    </div>
    <div class="col-sm-3">
        <?php echo form_error('email'); ?>
    </div>
</div>


<div class="row form-group">
    <label for="tel1" class="col-sm-3 no-padding-right control-label">Téléphone</label>

    <div class="col-sm-3">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['tel1'];
        } else {
            echo set_value('tel1');
        } ?>" name="tel1" class="form-control" id="tel1"
               placeholder="Teléphone fixe (par exemple)">
    </div>
    <div class="col-sm-3">
        <input type="text" value="<?php if (empty($_POST) AND isset($client)) {
            echo $client['tel2'];
        } else {
            echo set_value('tel2');
        } ?>" name="tel2" class="form-control" id="tel2"
               placeholder="Teléphone portable (par exemple)">
    </div>
    <div class="col-sm-3">
        <?php echo form_error('tel1'); ?>
        <?php echo form_error('tel2'); ?>
    </div>
</div>

<div class="row form-group">
    <label for="respo" class="col-sm-3 no-padding-right control-label">Responsable</label>

    <div class="col-sm-6">
        <?php if (empty($_POST) AND isset($client)) {
            $respo = $client['user_id'];
        } else {
            $respo = set_value('respo');
        }
        $this->fonctionspersos->creerDropdown($usersdropdown, $respo, 'respo'); ?>
    </div>
</div>
<div class="col-sm-3">
    <?php echo form_error('respo'); ?>
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