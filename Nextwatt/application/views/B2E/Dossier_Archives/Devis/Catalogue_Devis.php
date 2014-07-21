<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
    </h1>

</div>

<div class="row">
    <div class="col-xs-12">
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete_catalogue_mini();

        $this->fonctionspersos->creerTableau($tableau, $entete, );
        ?>
    </div>
</div>

            
