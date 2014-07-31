<?php

class CI_Devis extends MY_Controller
{
    public function consult_catalogue_devis()
    {
        $this->load->model('Mappage/type', 'type');
        $this->load->model('Mappage/soustypes','soustype');
        $this->load->model('Mappage/catalogue', 'catalogue');

        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['Types'] = $this->type->select_types(null);
        $catalogue = array();
        foreach($data['Types'] as $type)
        {
            $type['Nom_Type'] = preg_replace("# #", '-', $type['Nom_Type']);
            $soustypes = $this->soustype->select_soustype_type($type['id']);
            foreach($soustypes as $st)
            {
                $produits = $this->catalogue->produit_by_soustype($st['id']);
                foreach($produits as $p)
                {
                    $catalogue[$type['Nom_Type']][$st['nomcourt']][$p['Reference']] = $p;
                }
            }
        }
        $data['catalogue'] = $catalogue;

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->js(js_url('catalogue'));
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Dossier_Archives/Devis/Catalogue_Devis', $data);
    }

    public function select_produit_devis()
    {
        $this->load->model('Mappage/catalogue', 'catalogue');
        $this->load->model('Mappage/article', 'article');
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/client', 'client');
        $this->load->model('Mappage/user', 'user');

        $dossier_id = $this->session->userdata['idDossier'];
        $dossier = $this->dossier->select_dossier($dossier_id);
        $client = $this->client->select_client($dossier[0]['client_id']);
        $this->session->set_userdata('idClient', $dossier[0]['client_id']);
        $user = $this->user->select_user($client['user_id']);

        $idprod = ($this->session->userdata('CI_devis/select_produit_devis'));
        $produit = $this->catalogue->select_panneau($idprod);
        $produit['dossier_id'] = $this->session->userdata['idDossier'];

        $this->article->ajouter_article($produit);
        header('Location:' . site_url("CI_devis/devis_form"));
    }

    public function devis_form()                          //NOUVEAU DOSSER
    {
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/client', 'client');                 //DOSSIER EXISTANT
        $this->load->model('Mappage/user', 'user');
        $this->load->model('Mappage/article', 'article');

        $dossier_id = $this->session->userdata['idDossier'];
        $dossier = $this->dossier->select_dossier($dossier_id);
        $client = $this->client->select_client($dossier[0]['client_id']);
        $this->session->set_userdata('idClient', $dossier[0]['client_id']);
        $user = $this->user->select_user($client['user_id']);

        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];
        $data['ville'] = $client['ville'];
        $data['tel'] = $client['tel1'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];

        //-----------Article---
        $articles = $this->article->list_article_dossier($this->session->userdata['idDossier']);
        //----------Calcul de la somme
        $data['devis'] = $this->mise_en_forme_article($articles);
        //-----------Mise à jour du projet------------------------------------------
        $this->dossier->modifier_titre_dossier($dossier_id,$data['devis']['titre'],$data['devis']['TOTAL_TTC']);
        //-----------Affichage---------
        $this->layout->title('Devis');
        $this->layout->view('B2E/Dossier_Archives/Devis/devis', $data);


    }

    function mise_en_forme_article(array $articles)
    {
        $this->load->model('Mappage/soustypes', 'soustype');

        //Initialisation des varaibles générales
        $liste = array();
        $produits = array();
        $titre = array();
        $TOTAL_HT = 0;
        $TOTAL_TVA = 0;
        $TOTAL_CEE = 0;
        $TOTAL_Remise = 0;
        $TOTAL_TTC = 0;

        foreach ($articles as $article) {
            //Initialisation des varaibles locales
            /*
            $totalPlancherTTC = 0; //Prix plancher TTC
            $totalHT = 0; //total HT
            $totalTTC = 0; //Total TTC
            $totalTVA = 0;  //Montant TVA
            $totalHTApresRemise = 0;
            $totalTTCApresRemise = 0;
            $totalTVAApresRemise = 0;
            $remiseDispo =0;
            $TVAMo=0;
            $TVAMat=0;
             *
             */

            //Calcul prix
            /* Dans la base de données
             * HT   -MO
             *      -MatPl
             *
             * TTC  -An
             *      -CEE
             */
            $TVAMo = ((int)$article['TVA_MO']) / 10000; //TVA mo
            $TVAMat = ((int)$article['TVA_Mat']) / 10000; //TVA matos

            $quantite = $article['Quantite']; //Quantit�

            $ceeTTC = $article['CEE_TTC'] * $quantite; //Prime CEE TTC
            $ceeHT = $ceeTTC / (1 + $TVAMat); //Prime CEE HT
            $remiseTTC = $article['Remise']; //Remise comercial TTC
            $remiseHT = $remiseTTC / (1 + $TVAMat); //Remise comercial HT

            $moHT = $article['Prix_MO'] * $quantite; //mo HT
            $moTTC = $moHT * (1 + $TVAMo); //mo TTC

            $matPlHT = $article['Prix_Mat_Plancher'] * $quantite; //Materiel plancher HT
            $matPlTTC = $matPlHT * (1 + $TVAMat); //Materiel plancher TTC

            $anTTC = $article['Prix_Annonce_TTC'] * $quantite; //Annonce TTC

            /*
            if ($article['article_id'] != 0) {
                $article_id = $article['article_id'];
                $TVAMo2 = (int) $article[$article_id]['TVA_MO'] / 10000;   //TVA du produit parent
                $TVAMat2 = (int) $article[$article_id]['TVA_Mat'] / 10000;   //TVA du produit parent


                if (($TVAMat2 != $TVAMat) OR ( $TVAMo2 != $TVAMo)) {
                    $moTTC2 = $moHT * (1 + $TVAMo2);   //mo TTC nouvelle TVA
                    $matPlTTC2 = $matPlHT * (1 + $TVAMat2);   //mat TTC nouvelle TVA
                    $differenceDeTVA = $moTTC - $moTTC2 + $matPlTTC - $matPlTTC2; //Diference de TVA a soustraire du prix d'annonce
                    //Et on remet les variables en place
                    $TVAMat = $TVAMat2;
                    $produit['produitsSelect_TVAMat'] = (int) ($TVAMat * 10000);
                    $TVAMo = $TVAMo2;
                    $produit['produitsSelect_TVAMO'] = (int) ($TVAMo * 10000);
                    $moTTC = $moTTC2;
                    $matPlTTC = $matPlTTC2;
                    $anTTC-=$differenceDeTVA;   ///////////////////////AAAAAAAATTENTION

                }
            }
            */

            $matAnTTC = $anTTC - $moTTC + $ceeTTC; //Materiel � afficher TTC
            if (abs($matAnTTC) < 0.00001)
                $matAnTTC = 0; //Pour �viter l'erreur de precsion sur la soustracion des floats
            $matAnHT = $matAnTTC / (1 + $TVAMat); //Materiel � afficher HT

            $totalPlancherTTC = $moTTC + $matPlTTC - $ceeTTC; //Prix plancher TTC
            $totalHT = $moHT + $matAnHT; //total HT
            $totalTTC = $moTTC + $matAnTTC; //Total TTC
            $totalTVA = $totalTTC - $totalHT; //Montant TVA
            $totalHTApresRemise = $totalHT - $ceeHT - $remiseHT;
            $totalTTCApresRemise = $totalTTC - $ceeTTC - $remiseTTC;
            $totalTVAApresRemise = $totalTTCApresRemise - $totalHTApresRemise;

            $remiseDispo = $totalTTCApresRemise - $totalPlancherTTC;


            //Integration au produits courants
            $article['Prix_MO_TTC'] = $moTTC;
            $article['Prix_Mat_Annonce_TTC'] = $matAnTTC;
            $article['Prix_Mat_Annonce'] = $matAnHT;
            $article['CEE'] = $ceeHT;
            $article['Remise_Dispo_TTC'] = $remiseDispo;

            if ($article['Libelle_Garantie'] != '') { //Afficher la garantie si elle est renseignée
                $article['Libelle_Garantie'] = "Garantie materiel: " . $article['Libelle_Garantie'];
            }

            if ($article['Facturation'] != 'forfaitaire') { //Completer l'intituler du produit par sa quantité si non forfaitaire
                $article['Libelle_Mat'] = $article['Libelle_Mat'] . "<br/>" . $quantite . " " . $article['Facturation'];
                $article['Libelle_Mat_SansMarque'] = $article['Libelle_Mat_SansMarque'] . "<br/>" . $quantite . " " . $article['Facturation'];
                $article['Llibelle_MO'] = $article['Libelle_MO'] . " - " . $quantite . " " . $article['Facturation'];
            }


            //Création du titre du sous projet ---- si ce n'est pas une option
            if ($article['article_id'] == 0) {
                $soustype = $this->soustype->select_soustype($article['soustype_id']);
                $titre[]=$soustype['nomdevis'];
            }


            //Remplissage du tableau de tout les produits
            $id = $article['id'];
            // unset($article['id']);
            $article_id = $article['article_id'];
            //unset($article['article_id']);

            if ($article_id == 0) { //Liste des produits
                foreach ($article as $key => $data) {
                    $produits[$id][$key] = $data;
                }

                $produits[$id]['total_remiseDispo'] = $remiseDispo;
                $produits[$id]['total_CEE'] = -$ceeTTC;
                $produits[$id]['total_remise'] = -$remiseTTC;
                $produits[$id]['total_HT'] = $totalHTApresRemise;
                $produits[$id]['total_TVA'] = $totalTVAApresRemise;
                $produits[$id]['total_TTC'] = $totalTTCApresRemise;

            } else { //Liste des complements
                foreach ($article as $key => $data) {
                    $produits[$article_id]['complements'][$id][$key] = $data;
                }

                //Ajout au totaux
                $produits[$article_id]['total_remiseDispo'] += $remiseDispo;
                $produits[$article_id]['total_CEE'] -= $ceeTTC;
                $produits[$article_id]['total_remise'] -= $remiseTTC;
                $produits[$article_id]['total_HT'] += $totalHTApresRemise;
                $produits[$article_id]['total_TVA'] += $totalTVAApresRemise;
                $produits[$article_id]['total_TTC'] += $totalTTCApresRemise;
            }

            $TOTAL_CEE -= $ceeTTC;
            $TOTAL_Remise -= $remiseTTC;
            $TOTAL_HT += $totalHTApresRemise;
            $TOTAL_TVA += $totalTVAApresRemise;
            $TOTAL_TTC += $totalTTCApresRemise;

        }

        $titre=  implode($titre, ', ');
        $liste = array('produits' => $produits,
            'TOTAL_CEE' => $TOTAL_CEE,
            'TOTAL_Remise' => $TOTAL_Remise,
            'TOTAL_HT' => $TOTAL_HT,
            'TOTAL_TVA' => $TOTAL_TVA,
            'TOTAL_TTC' => $TOTAL_TTC,
            'titre'=>$titre);
        return $liste;
    }



    public function pdf()
    {
        $this->load->model('Mappage/client', 'client');
        $this->load->model('Mappage/user', 'user');
        $this->load->model('Mappage/article', 'article');

        $client = $this->client->select_client($this->session->userdata['idClient']);
        $user = $this->user->select_user($client['user_id']);
        $iddossier = $this->session->userdata['idDossier'];
        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];
        $data['ville'] = $client['ville'];
        $data['CP'] = $client['codepostal'];
        $data['clienttel1'] = $client['tel1'];
        $data['clienttel2'] = $client['tel2'];
        $data['clientmail'] = $client['email'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];
        $data['usermail'] = $user['email'];
        $data['usertel'] = $user['tel'];

        //Articles
        $data['article'] = $this->aff_Article();

        //--------------
        $articles = $this->article->list_article_dossier($iddossier);
        $data['devis'] = $this->mise_en_forme_article($articles);
        //--------------------


        // Load all views as normal
        $this->load->view('B2E/Dossier_Archives/Devis/PDF_Devis', $data);
        // Get output html
//        $html = $this->output->get_output();
//
//        // Load library
//        $this->load->library('dompdf_gen');
//
//        // Convert to PDF
//        $this->dompdf->load_html($html);
//        $this->dompdf->render();
//        //Preview
//        $this->dompdf->stream("Devis.pdf", array('Attachment' => 0));
//    }
    }

    public function supprimer_article($id=null)
    {
        $this->load->model('Mappage/article', 'article');

        $this->article->supprimer_article($this->session->userdata('CI_devis/aff_detail_article'));
//        $this->article->supprimer_options($this->session->userdata('CI_devis/aff_detail_article'));

        header('Location:' . site_url("CI_devis/devis_form"));
    }

    public function aff_detail_article($id=null )
    {
        if ($id!=null){ //comme j'ajax
            $this->session->set_userdata(array('CI_devis/aff_detail_article'=>$id));
            header('Location:' . site_url("CI_devis/aff_detail_article"));
        }
        $this->load->model('Mappage/article', 'article');

        $idarticle = $this->session->userdata('CI_devis/aff_detail_article');
        $tableau_articles = $this->article->list_article_dossier($this->session->userdata('idDossier'));
        $tableau_articles = $this->mise_en_forme_article($tableau_articles);
        $data['articles']= $tableau_articles['produits'][$idarticle];

        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Devis/detail_article', $data);
    }

    public function ajax_selectdossier(){
        if(isset($_POST['idDossier'])){
            $this->session->set_userdata(array('CI_dossier/select_dossier' => $_POST['idDossier']));
            echo true;
        }
    }
}