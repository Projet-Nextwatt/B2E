<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->


<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <?php
    if (isset($categorie)) {
        echo '<h1>Modifier une catégorie</h1>';
    } else {
        echo '<h1>Ajouter une catégorie</h1>';
    }
    ?>
</div>

<div class="row">   
    <div class="col-xs-12">
        <?php //echo validation_errors(); ?>

        <?php
        $attributes = array('role' => 'form', 'id' => 'myform', 'class' => 'form-horizontal');
        $hidden = array();
        if (isset($categorie)) {
            $hidden = array('id' => $categorie['id']);
            echo form_open('CI_user/modifcategorie', $attributes, $hidden);
        } else {
            echo form_open('CI_user/addcategorie', $attributes, $hidden);
        }
        ?>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Categorie_Groupe'>Groupe de la catégorie</label>
            <div class="col-sm-4">
                <input type="text" 
                       name="Categorie_Groupe" 
                       id='Categorie_Groupe' 
                       value="<?php
                                    if (empty($_POST) AND isset($categorie)) {
                                        echo $categorie['Categorie_Groupe'];
                                    } else {
                                        echo set_value('Categorie_Groupe');
                                    }
                                    ?>" 
                       class='form-control'
                       autocomplete="off"
                       />
            </div>
            <div class="col-sm-4">   
                <?php echo form_error('Categorie_Groupe'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label">Nom de la catégorie</label>
            <div class="col-sm-4">
                <input type="text" 
                       name="Nom_Categorie" 
                       id='Nom_Categorie' 
                       value="<?php if (empty($_POST) AND isset($categorie)) {
                                    echo $categorie['Nom_Categorie'];
                                } else {
                                    echo set_value('Nom_Categorie');
                                } ?>"
                       class='form-control'
                       />
                <span class="lbl"></span>
            </div>
            <div class="col-sm-4">
<?php echo form_error('Nom_Categorie'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Droit_SUDO'>Autorisation SUDO</label>
            <input type='hidden' name="Droit_SUDO" value="off"/>
            <label class="col-sm-4">
                <input type="checkbox"
                       name="Droit_SUDO" 
                       id='Droit_SUDO' 
                       <?php
                       if (empty($_POST) AND isset($categorie)) {
                           echo (($categorie['Droit_SUDO']==1)?'checked':'');
                       } else {
                           echo ((set_value('Droit_SUDO')=='on')?'checked':'');
                       }
                       ?>
                       class='ace ace-switch ace-switch-6 btn-empty' />
                <span class="lbl"></span>
            </label> 
            <div class="col-sm-4">
                <?php echo form_error('Droit_SUDO'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Droit_Admin'>Autorisation Admin</label>
            <input type='hidden' name="Droit_Admin" value="off"/>
            <label class="col-sm-4">
                <input type="checkbox"
                       name="Droit_Admin" 
                       id='Droit_Admin' 
                       <?php
                       if (empty($_POST) AND isset($categorie)) {
                           echo (($categorie['Droit_Admin']==1)?'checked':'');
                       } else {
                           echo ((set_value('Droit_Admin')=='on')?'checked':'');
                       }
                       ?>
                       class='ace ace-switch ace-switch-6 btn-empty' />
                <span class="lbl"></span>
            </label> 
            <div class="col-sm-4">
                <?php echo form_error('Droit_Admin'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Droit_Catalogue'>Autorisation catalogue</label>
            <input type='hidden' name="Droit_Catalogue" value="off"/>
            <label class="col-sm-4">
                <input type="checkbox"
                       name="Droit_Catalogue" 
                       id='Droit_Catalogue' 
                       <?php
                       if (empty($_POST) AND isset($categorie)) {
                           echo (($categorie['Droit_Catalogue']==1)?'checked':'');
                       } else {
                           echo ((set_value('Droit_Catalogue')=='on')?'checked':'');
                       }
                       ?>
                       class='ace ace-switch ace-switch-6 btn-empty' />
                <span class="lbl"></span>
            </label> 
            <div class="col-sm-4">
                <?php echo form_error('Droit_Catalogue'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <label class="col-sm-4 no-padding-right control-label" for='Droit_Edit_Devis'>Autorisation edition devis</label>
            <input type='hidden' name="Droit_Edit_Devis" value="off"/>
            <label class="col-sm-4">
                <input type="checkbox"
                       name="Droit_Edit_Devis" 
                       id='Droit_Edit_Devis' 
                       <?php
                       if (empty($_POST) AND isset($categorie)) {
                           echo (($categorie['Droit_Edit_Devis']==1)?'checked':'');
                       } else {
                           echo ((set_value('Droit_Edit_Devis')=='on')?'checked':'');
                       }
                       ?>
                       class='ace ace-switch ace-switch-6 btn-empty' />
                <span class="lbl"></span>
            </label> 
            <div class="col-sm-4">
                <?php echo form_error('Droit_Edit_Devis'); ?>
            </div>
        </div>

        <div class='row form-group'>
            <div class='col-sm-offset-4 col-sm-2 col-xs-offset-0 col-xs-6'>
                <button type="submit" class="btn btn-sm btn-info ">
                    <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                    Enregistrer
                </button>
            </div>           
            <div class='col-sm-2 align-right'>
                <a href="<?php echo site_url("CI_user/gestioncategorie"); ?>" class="btn btn-sm btn-danger ">
                    <i class="ace-icon fa fa-frown-o bigger-160"></i>
                    Annuler
                </a>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

