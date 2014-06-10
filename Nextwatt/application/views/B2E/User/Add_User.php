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
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="identifiant" class="col-sm-5 control-label">Identifiant</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="identifiant"
                                       value="<?php echo set_value('identifiant'); ?>" placeholder="Votre Pseudo">

                                <p><?php echo form_error('identifiant'); ?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mdp" class="col-sm-5 control-label">Mot de passe</label>

                            <div class="col-sm-2">
                                <?php echo form_error('mdp'); ?>
                                <input type="password" class="form-control" id="mdp"
                                       value="<?php echo set_value('mdp'); ?>"
                                       placeholder="Votre mot de passe">
                            </div>
                            <div class="col-sm-2">
                                <?php echo form_error('confmdp'); ?>
                                <input type="password" class="form-control" id="confmdp"
                                       value="<?php echo set_value('confmdp'); ?>" placeholder="Confirmation MDP">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prenom" class="col-sm-5 control-label">Prénom</label>

                            <div class="col-sm-3">
                                <?php echo form_error('prenom'); ?>
                                <input type="text" class="form-control" id="prenom" value="" placeholder="Votre prénom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nom" class="col-sm-5 control-label">Nom</label>

                            <div class="col-sm-3">
                                <?php echo form_error('nom'); ?>
                                <input type=text" class="form-control" id="nom" value="<?php echo set_value('nom'); ?>"
                                       placeholder="Nom"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-5 control-label">Email</label>

                            <div class="col-sm-3">
                                <?php echo form_error('email'); ?>
                                <input type="email" class="form-control" id="email"
                                       value="<?php echo set_value('email'); ?>"
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tel" class="col-sm-5 control-label">Téléphone</label>

                            <div class="col-sm-3">
                                <?php echo form_error('tel'); ?>
                                <input type="text" class="form-control" id="tel" value="<?php echo set_value('tel'); ?>"
                                       placeholder="Teléphone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categorie" class="col-sm-5 control-label">Catégorie</label>

                            <div class="col-sm-3">
                                <select name="salutkoko" class="dropdown" id="categorie">
                                    <option value="1">Commercial</option>
                                    <option value="2">Directeur Co</option>
                                    <option value="2">Grand Chef</option>
                                </select>
                            </div>
                        </div>
                        <br/>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-2">
                                <a href="<?php echo site_url("user/verif_form_user"); ?>">
                                    <button class="btn btn-sm btn-info btn-white">
                                        <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                                        Enregistrer
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
