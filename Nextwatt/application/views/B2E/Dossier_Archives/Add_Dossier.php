<?php $this->fonctionspersos->creerTableau($listeclient,array('ID','Nom','Prenom'));
//var_dump($this->session->all_userdata()); ?>
<button type="button" class="btn btn-sm btn-success" onclick="self.location.href='../CI_client/Consult_Client?dossier=true'">
    <i class="ace-icon fa fa-user bigger-160"></i>
    Ajouter un client
</button>
