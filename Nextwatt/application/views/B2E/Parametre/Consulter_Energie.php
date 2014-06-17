<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->


<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1>Liste des énergies</h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-primary" href="<?php echo site_url("parametre/add_energie"); ?>">
            <i class="ace-icon fa fa-plus align-top bigger-125"/></i>Ajouter une &eacute;nergie
        </a>
        
          <?php foreach ($Energies as $Energie){
            echo $Energie;
          }?>
    </div>
</div>

