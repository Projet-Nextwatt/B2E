<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        PAGE CLIENT</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Accueil des clients</small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php form_open('client/verif_form_client')?>
        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Civilité</label>

                <div class="col-sm-3">
                    <select name="myselect" id="civilite" class="dropdown">
                        <option value="1">Madame</option>
                        <option value="2">Mademoiselle</option>
                        <option value="3" selected>Monsieur</option>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Nom et Prénom </label>

                <div class="col-sm-2">
                    <input type="text" class="form-control" id="nom1" placeholder="Votre Nom">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="prenom1" placeholder="Votre prénom">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Nom et Prénom (Conjoint)</label>

                <div class="col-sm-2">
                    <input type="text" class="form-control" id="nom2" placeholder="Votre Nom">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="prenom2" placeholder="Votre prénom">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Adresse</label>

                <div class="col-sm-4">
                    <textarea class="col-sm-9" rows="3" id="adresse" placeholder="Votre adresse"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Code Postal et Vile </label>

                <div class="col-sm-2">
                    <input type="text" class="form-control" id="codepostal" placeholder="Code Postal">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="Ville">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Email</label>

                <div class="col-sm-3">
                    <input type="email" class="form-control" id="email" placeholder="Email" required value>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 control-label">Téléphone (fixe et/ou
                    portable)</label>

                <div class="col-sm-2">
                    <input type="text" class="form-control" id="tel1" placeholder="Teléphone fixe">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="tel2" placeholder="Teléphone portable">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">Responsable</label>

                <div class="col-sm-3">
                    <select name="myselect" class="dropdown">
                        <option value="1">Stephane</option>
                        <option value="2">Xavier</option>
                        <option value="2">Marc</option>
                    </select>
                </div>
            </div>
            </br>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <a href="<?php echo site_url("client/verif_form_client"); ?>">
                    <button type="submit" class="btn btn-sm btn-info btn-white">
                        <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                        Enregistrer
                    </button>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

