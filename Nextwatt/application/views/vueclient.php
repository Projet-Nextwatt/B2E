<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
</head>
<body>
<div id="main">
    <section class="form">
        <header><h2>Inscription</h2></header>
        <?php echo form_open('inscription', array('id' => 'form_inscription')); ?>
 
        <div>
            <?php echo form_label('Nom<span class="required">*</span>', 'name'); ?>
            <?php echo form_input($identifiant); ?>
        </div>
        <div>
            <?php echo form_label('Prénom<span class="required">*</span>', 'firstName'); ?>
            <?php echo form_input($nom); ?>
        </div>
        <div>
            <?php echo form_label('Adresse Email<span class="required">*</span>', 'email'); ?>
            <?php echo form_input($email); ?>
        </div>
        <div>
            <?php echo form_label('Mot de passe<span class="required">*</span>', 'password'); ?>
            <?php echo form_input($password); ?>
        </div>
        <div>
            <?php echo form_submit('submit', 'Envoyer'); ?>
        </div>
 
        <?php echo form_close(); ?>
    </section>
</div>
</body>