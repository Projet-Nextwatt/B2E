<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->


<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
    <p>Ace-setting...</p>
</div>

<div class="page-header">
    <h1>Ajouter une énergie</h1>
</div>

<div class="row">
    
    <?php echo validation_errors(); ?>

    <?php echo form_fieldset('Address Information'); ?>

    <?php
    $attributes = array('role' => 'form', 'id' => 'myform');
    $hidden = array('username' => 'Joe', 'member_id' => '234');
    echo form_open('parametre/add_energie', $attributes, $hidden);
    ?>

    <div class='form-group'>
        <label for='username'>Username</label>
        <?php
        $data = array(  'name' => 'username',
                        'id' => 'username',
                        'class' => 'form-control',
                        'value' => set_value('username'),
                        'maxlength' => '100',
                        'size' => '50',
                        'onClick' => 'some_function()');
        echo form_input($data);

        echo form_error('username', '<li class="text-warning bigger-110 orange"> <i class="ace-icon fa fa-exclamation-triangle"></i>', '</li>');
        //Pas besoin de rentrer les deux derniers arguments si on le met par défault dans system\libraries\Form_validation.php;
        ?>
    </div>


    <div class='form-group'>
        <label for='password'>Password</label>
        <input type="text" name="password" id='password' value="<?php echo set_value('password'); ?>" class='form-control' />
        <?php echo form_error('password'); ?>
    </div>
        
    
    <div class='form-group'>
        <label>Password Confirm</label>
        <input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" class='form-control' />
    </div>
    
    <div class='form-group'>
        <label>Email Address</label>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class='form-control' />
    </div>

    <h5>Test des fonctions de Form_validation</h5>
    <?php
    $options = array(
        'small' => 'Small Shirt',
        'med' => 'Medium Shirt',
        'large' => 'Large Shirt',
        'xlarge' => 'Extra Large Shirt',
    );

    $shirts_on_sale = array('small', 'large');
    $add_param = 'id="shirts" onChange="some_function();"';

    echo form_dropdown('shirts', $options, 'large', $add_param);
    ?>

    <?php
    $data = array(
        'name' => 'newsletter',
        'id' => 'newsletter',
        'value' => 'accept',
        'checked' => TRUE,
        'style' => 'margin:10px',
    );

    echo form_checkbox($data);
    ?>

    <div><input type="submit" value="Submit" /></div>

    <?php
    $string = "<p>Fin du formulaire</p>";

    echo form_close($string);
    ?>


<?php echo form_fieldset_close(); ?>



    <p></p>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Formulaire de contact</h1>
            <div class="col-sm-8">
                <form>
                    <div class="row form-group">
                        <div class="col-xs-3">
                            <input id="firstName" class="form-control" type="text" name="firstName"></div>
                        <div class="col-xs-3">
                            <input id="middleName" class="form-control" type="text" name="firstName"></div>
                        <div class="col-xs-4">
                            <input id="lastName" class="form-control" type="text" name="lastName"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-5">
                            <input class="form-control" type="email" name="email"></div>
                        <div class="col-xs-5">
                            <input class="form-control" type="email" name="phone"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-10">
                            <input class="form-control" type="homepage"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-10"><textarea class="form-control" rows="5">Your message here</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-10"><button class="btn btn-default pull-right">Envoyer</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <p>
    </p>
    - See more at: http://www.onasus.com/2014/01/5749/bootstrap-tutorial-formulaire-de-contact-avance/#sthash.4JdxEwQ9.dpuf
</div>

