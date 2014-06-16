<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        PAGE USER</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Ajouter un nouvel utilisateur</small>
    </h1>
</div>


    <div class="row col-centered">
        <div class="col-centered">


            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'form_user', 'role' => 'form');
            ?>
            <!--        <form class="form-horizontal" role="form">-->

            <form class="form-horizontal col-centered" method="post" action="/B2E/Nextwatt/index.php/user/verif_form_user">
                <div class="form-group col-centered">
                    <label class=" control-label no-padding-right" for="identifiant">Identifiant</label>

                    <div class="">
                        <?php echo form_error('identifiant'); ?>
                        <input type="text" id="identifiant" value="<?php echo set_value('identifiant'); ?>" placeholder="Identifiant">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="mdp">Mot de passe</label>

                    <div class="controls">
                        <input type="password" id="mdp" placeholder="Mot de passe ">
                        <input type="password" id="confmdp" placeholder="Confirmation mdp">
                        <?php echo form_error('mdp'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="prenom">Prénom</label>

                    <div class="controls">
                        <input type="text" id="prenom" value="<?php echo set_value('identifiant'); ?>" placeholder="Votre Prénom">
                        <?php echo form_error('prenom'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="nom">Nom</label>

                    <div class="controls">
                        <input type="text" id="nom" placeholder="Votre Nom">
                        <?php echo form_error('nom'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="mdp">Email</label>

                    <div class="controls">
                        <input type="email" id="email" placeholder="exemple@nextwatt.fr">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tel">Telephone</label>

                    <div class="controls">
                        <input type="text" id="tel" placeholder="Votre numéro de telephone">
                        <?php echo form_error('tel'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="categorie">Catégorie</label>

                    <div class="controls">
                        <?php echo form_error('categorie'); ?>
                        <select name="categorie" class="dropdown" id="categorie">
                            <option value="1">Commercial</option>
                            <option value="2">Directeur Co</option>
                            <option value="2">Grand Chef</option>
                        </select>
                        <br/>
                        <br/>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
