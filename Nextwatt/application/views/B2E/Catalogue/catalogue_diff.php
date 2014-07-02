<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Différentiel des catalogues</small>
    </h1>

</div>

<div class="row col-xs-12">
    <div class="row col-xs-12">
        <div class="col-md-offset-5 col-md-4">
            <a href="<?php echo site_url("CI_catalogue/validercatalogue"); ?>">
            <button type="submit" class="btn btn-sm btn-info">
                <i class="ace-icon fa fa-floppy-o bigger-160"></i>
                Enregistrer
            </button></a>
            <a href="<?php echo site_url("CI_catalogue"); ?>">
            <button type="button" class="btn btn-danger btn-sm">
                <i class="ace-icon fa fa-trash-o bigger-160"></i>
                Annuler
            </button></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete();
        ?>
        <h2>
            Ajouts :
        </h2>
        <?php
        if(isset($ajouts))
        {
            $this->fonctionspersos->creerTableau($ajouts, $entete);
        }
        else
        {
            echo('<h3>  Aucun ajout dans la base de données</h3><br/>');
        }
        ?>
        <h2>
            Suppressions :
        </h2>
        <?php
        if(isset($supp))
        {
           foreach($supp as $ref)
           {
               echo('<h4>');
               echo($ref);
               echo('</h4>');
//               echo('<br/>');
           }
        }
        else
        {
            echo('<h3>  Aucun ajout dans la base de données</h3><br/>');
        }
        ?>
    </div>
</div>
