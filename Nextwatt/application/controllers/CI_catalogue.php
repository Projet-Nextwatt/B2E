<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Controleur catalogue
// fonctions pour afficher la page d'accueil du catalogue (consult_catalogue)
//           pour charger un catalogue (load_catalogue)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


class CI_Catalogue extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        $i=0;
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
//        var_dump($catalogue);

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->js(js_url('catalogue'));
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

    public function aff_fiche_produit()
    {
        $this->load->model('Mappage/catalogue', 'catalogue');
        $this->load->model('Mappage/catalogue_catalogue', 'option');

        $idproduit = $this->session->userdata('CI_catalogue/aff_fiche_produit');
        $produit = $this->catalogue->select_panneau($idproduit);
        $refopt = $this->option->select_option($produit['Reference']);

        foreach($refopt as $opt)
        {
            $refoptions = $opt['op_ref'];
            $options[] = $this->catalogue->select_option_catalogue($refoptions);
        }

//        $options = $this->catalogue->select_option_catalogue($refopt);

        $data['options'] = $options;
        $data['produit'] = $produit;

        $this->layout->title('Fiche produit');
        $this->layout->view('B2E/Catalogue/fiche_produit', $data);
    }

    public function consult_catalogue()
    {
        $data = array();
        $data['tableau'] = $this->create_tableau_catalogue(); // On appel la fonction de création du cataloge en mode tableau pour pouvoir l'afficher avec la variable $data['tableau']

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

    public function load_catalogue()
    {
        //Remplissage de la variable $data avec différentes infos pour le layout
        $data = array();
        $data['msg'] = "Charger un nouveau catalogue";
        $data['upload_data'] = '';

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Charger_Catalogue', $data);
    }

    public function upload_catalogue_form()
    {
        $this->layout->title('Upload de catalogue');
        $this->layout->view('B2E/Catalogue/Charger_Catalogue');
    }

    public function upload_catalogue_action()
    {
        $dossier = 'upload/';
        $fichier = basename($_FILES['userfile']['name']);
        $extensions = array('.txt');
        $extension = strrchr($_FILES['userfile']['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension ne correspond pas à ce que nous attendons
        {
            $erreur = 'Vous devez uploader un fichier de type txt ';
        }
        if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', // On remplace tous les caractères spéciaux
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                $this->aff_recap_upload();

            } else //Sinon (la fonction renvoie FALSE).
            {
                $this->layout->title('TEST UPLOAD SHANY');
                $this->layout->view('B2E/Catalogue/upload'); //render view and layout

            }
        } else {
            echo $erreur;
        }
    }

    public function create_tab_ajout_bdd() //Fonction de création du tableau de différence entre la BDD actuelle et celle qui va être mise en place (AJOUTS)
    {
        $this->load->model('Mappage/catalogue', 'catalogue');
        $this->load->library('fonctionspersos'); // On charge les modèles et les librairies qu'on a besoin

        $refbdd = $this->catalogue->get_ref_bdd();
        $fichier = $this->fonctionspersos->lire_fichier_catalogue();


        $nbProduitLu = 0;
        $nbComplementLu = 0;
        $nbOptionsOblLu = 0;
        $nbAutre = 0;

        if (isset($fichier)) {
            foreach ($fichier as $ref => $ligneFichier) {
                if (($ligneFichier   [count($ligneFichier) - 1] == 1)) //***********Catalogue
                    $nbProduitLu++;
                elseif (($ligneFichier[count($ligneFichier) - 1] == 2)) //********Complements
                    $nbComplementLu++;
                elseif (($ligneFichier[count($ligneFichier) - 1] == 3)) //********Options obligatoires
                    $nbOptionsOblLu++;
                else
                    $nbAutre++;


                //V�rification de l'exsitence dans la base de donn�es
                if (!(array_key_exists($ref, $refbdd))) //si il existe pas, on ajoute
                {
                    $ajout[$ligneFichier[0]] = $ligneFichier;
                }
            }
        }
        if (isset($ajout)) {
            return $ajout;
        }


    }

    public function create_tab_supp_bdd() //Fonction de création du tableau de différence entre la BDD actuelle et celle qui va être mise en place (Suppressions)
    {
        $this->load->model('Mappage/catalogue', 'catalogue');
        $this->load->library('fonctionspersos'); // On charge les modèles et les librairies qu'on a besoin

        $fichier = $this->fonctionspersos->lire_fichier_catalogue();
        $refbdd = $this->catalogue->get_full_bdd();


        $tabbdd = array();
        $tabfichier = array();
        $i = 0;
        $j = 0;

        foreach ($refbdd as $r) {
            $tabbdd[$i] = $r['Reference'];
            $i++;
        }
        foreach ($fichier as $f) {
            $tabfichier[$j] = $f[0];
            $j++;
        }
        $result = array_diff($tabbdd, $tabfichier);

        return $result;
    }


    public
    function create_tab_modif_bdd()
    {
        //On recupere la base de données et on enleve ce qui n'est pas dans le fichier
        $this->load->model('Mappage/catalogue', 'catalogue');
        $catalogueBDD = $this->catalogue->get_catalogue_pour_modif();
        $suppbdd = $this->create_tab_supp_bdd();
        if (isset($suppbdd)) {
            foreach ($suppbdd as $ref) {
                unset($catalogueBDD[$ref]);
            }
        }


        //On recupere le fichier et on enleve ce qui n'est pas dans la bdd
        $this->load->library('fonctionspersos');
        $fichier = $this->fonctionspersos->lire_fichier_catalogue();
        $ajoutbdd = $this->create_tab_ajout_bdd();
        if (isset($ajoutbdd)) {
            foreach ($ajoutbdd as $ref => $onsenfout) {
                unset($fichier[$ref]);
            }
        }

        foreach ($fichier as $ref => $produit) {
            //$ligneModif=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
            $modif = FALSE;
            foreach ($produit as $i => $element) {
                if ($element != $catalogueBDD[$ref][$i]) { //car la premi�re colonne dans la base de donn�es est l'id bdd
                    $ligneModif[$i] = $element;
                    $modif = TRUE;
                }
            }
            if ($modif == TRUE) {
                $ligneModif[0] = $ref;
                $tabmodif[$ref] = $ligneModif;
            }
        }

        if (isset($tabmodif)) {
            return $tabmodif;
        }
    }

    public
    function aff_recap_upload()
    {
        $data = array();
        $this->load->model('Mappage/catalogue', 'catalogue');
        $this->load->library('fonctionspersos');

        $fichier = $this->fonctionspersos->lire_fichier_catalogue();

        $data['ajouts'] = $this->create_tab_ajout_bdd(); // On charge les tableaux récapitulatifs dans le tableau $data
        $data['supp'] = $this->create_tab_supp_bdd();
        $data['modif'] = $this->create_tab_modif_bdd();
        $data['fichier'] = $fichier;


        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/catalogue_diff', $data);
    }


    public
    function validercatalogue()
    {
        $data = array();
        $data['successmsg'] = 'Upload Terminé';

        // On envoie le fichier décodé au model pour l'uploader
        $this->load->model('Mappage/catalogue', 'catalogue');
        //On récupère les lignes à supprimer et à ajouter via la fonction précisé plus haut
        $add = $this->create_tab_ajout_bdd();
        $modif = $this->create_tab_modif_bdd();


        //On créer un compteur pour pouvoir afficher le nombre de suppressions/ajouts faits à la prochaine vue
        $data['lignesuppr'] = 0;
        $data['ligneajouté'] = 0;
        $data['lignemodfié'] = 0;
        //On fait les ajouts
        if (isset($add)) {
            $data['ligneajouté'] = $this->catalogue->updatecatalogue($add);
        }
        //On fait les modifications
        if (isset($modif)) {
            $data['lignemodifiée'] = $this->catalogue->updatecatalogue($modif);
        }
        //On fait les suppressions grâce au tableau récupéré via "create_tab_supp_bdd" et on indente le compteur à chaque suppression
        if (!empty($_POST['check_list'])) {
            foreach ($_POST['check_list'] as $check) {
                if ($this->catalogue->supprimer($check) == TRUE) {
                    $data['lignesuppr']++;
                }
            }
        }
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/successupload', $data);
    }

    public function decodefichier($fichier)
    {
        return htmlspecialchars_decode($fichier['P9-2940SP51'][4], ENT_NOQUOTES);
    }

    public function create_tableau_catalogue()
    {
        $this->load->model('Mappage/catalogue', 'cata');
        $this->load->model('Mappage/soustypes', 'soustype');
        $this->load->model('Mappage/type', 'type');

        $BDD = $this->cata->get_full_bdd();
        $types = $this->type->select_types(null);
//        $soustypes;
        $i = 0;
        $newtab = array();

        foreach ($BDD as $ligne) {
            $newtab[$i]['id'] = $ligne['id'];
            $newtab[$i]['Reference'] = $ligne['Reference'];
            $newtab[$i]['Nom'] = $ligne['Nom'];
            $newtab[$i]['Marque'] = $ligne['Marque'];
            $newtab[$i]['Puissance'] = $ligne['Puissance'];
            $newtab[$i]['Prix_Annonce_TTC'] = $ligne['Prix_Annonce_TTC'];
            $i++;
        }

        return $newtab;
    }


    ////////////////////////////////  GESTION DES SOUS-TYPES ////////////////////////////////////


    public function lier_type_produit() //Fonction d'affichage du formulaire de gestion des liaisons soustype/produit
    {
        $this->load->model('Mappage/catalogue', 'catalogue'); //On load les différents modèles nécessaires
        $this->load->model('Mappage/soustypes', 'soustype');
        $this->load->model('Mappage/type', 'type');

        $data = array(); // On remplit les variables avec les infos qu'on a besoin en appelant les méthodes des modèles loadés précédemment
        $data['produit'] = $this->catalogue->get_ref_bdd();
        $data['soustypes'] = $this->soustype->select_soustype_bytype();
        $data['types'] = $this->type->select_types(null);

        $this->layout->title('Lier type au produit'); //Et on charge la vue en lui passant $data pour afficher et utiliser les infos que c'est qu'on à récupéré
        $this->layout->view('B2E/Catalogue/Lier_Type_Produit', $data); //render view and layout
    }

    public function lier_type_produit_action() //Fonction de traitement du formulaire de gestion des liaisons soustypes/produits
    {
        $this->load->model('Mappage/catalogue', 'catalogue');
        $data['rsltupdate'] = $this->catalogue->update_soustype_produit($_POST);

        if (isset($data['rsltupdate'])) {
            $this->layout->title('Lier type au produit');
            $this->layout->view('B2E/Catalogue/rslt_type_produit', $data); //render view and layout
        }
    }

    public function gererlistetype_form() //Fonction d'affichage du formulaire d'ajout des soustypes
    {
        $this->load->model('Mappage/Type', 'Type');
        $data = array();
        $data['Types'] = $this->Type->select_types(null); // On récupère tous les soustypes existants dans la BDD via la méthode "select_types" du modèle
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Add_Soustype', $data);
    }

    public function gererlistetype_action() //Fonction de traitement du formulaire d'ajout des soustypes
    {
        $this->load->model('Mappage/soustypes', 'mapsoustype'); //Chargement du model soustypes
        $this->load->model('Mappage/Type', 'Type');
        $data = array();

        $data['Types'] = $this->Type->select_types(null); //On récupère tous les types de la BDD

        $configST = $this->configsoustype(); //On définit les configurations requises pour ajouter un soustype dans un tableau (en passant par la fonction définit plus bas)
        $configtraitement = $this->configtraitementsoustype(); //On définit les différents traitement pour l'ajout d'un soustype dans un tableau (en passant par la fonction définit plus bas)

        $this->form_validation->set_rules($configST); //On applique les configurations définits précédemments (en passant les tableaux en paramètre de "set_rules")

        //On check le booléen renvoyé (True si tout est nickel, False si un champs ne respecte pas les règles)
        //Et on agit en conséquence
        if ($this->form_validation->run() == FALSE) {
            // On charge la page
            $this->layout->title('Erreur d\'ajout soustype');
            $this->layout->view('B2E/Catalogue/Add_Soustype', $data); // Render view and layout
        } else {
            $this->form_validation->set_rules($configtraitement);
            $this->mapsoustype->ajouter_soustype($_POST);
            header('Location:' . site_url("CI_catalogue/consult_soustype"));
        }
    }

    public function consult_soustype() //Fonction d'affichage de tous les soustypes de la BDD
    {
        $this->load->model('Mappage/soustypes', 'mapsoustype'); //Chargement du model
        $this->load->library('fonctionspersos');

        $data = array();
        $data['soustypes'] = $this->mapsoustype->select_soustype(); //On récupère tous les soustypes
        $data['entetesoustype'] = null;// array('ID', 'Nom court', 'Nom devis', 'Catégorie bouquet CI', 'Catégorie bouquet EcoPTZ', 'CI unitaire'); //On définit les entêtes

        $this->layout->title('Liste des soustypes');
        $this->layout->view('B2E/Catalogue/Consulter_Soustype.php', $data); // Render view and layout
    }

    public function modif_soustype() //Fonction de traitement pour la modification d'un soustype
    {
        $this->load->model('Mappage/soustypes', 'mapsoustype'); //Chargement du modele
        $this->load->model('Mappage/type', 'maptype');

        $data = array(); //Pour la vue
        $data['soustype'] = $this->mapsoustype->select_soustype($this->session->userdata('CI_catalogue/modif_soustype')); //On choppe le soustype que le mec a cliqué dessus
        $data['Types'] = $this->maptype->select_types(null);

        $configST = $this->configsoustype();
        $configtraitement = $this->configtraitementsoustype();
        $this->form_validation->set_rules($configST);

        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci

            $this->layout->title('Modifier un soustype');
            $this->layout->view('B2E/Catalogue/Add_Soustype.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($configtraitement);
            $this->form_validation->run();
            if ($this->mapsoustype->modifier_soustype($_POST)) {
                $this->consult_soustype();
            } else {
                echo 'error';
            }   
        }
    }
    
    public function ajax_chargernomcatalogue(){
        $this->load->model('Mappage/catalogue', 'catalogue');
        $catalogue=$this->catalogue->get_nom();
        
        echo json_encode($catalogue);
    }

    public function configsoustype()
    {
        $configsoustype =
            array(
                array(
                    'field' => 'nomcourt',
                    'label' => 'Nom court',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'nomdevis',
                    'label' => 'Nom devis',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'bouquetCI',
                    'label' => 'Catégorie bouquet CI',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'bouquetEPTZ',
                    'label' => 'Catégorie bouquet EPTZ',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'CIunitaire',
                    'label' => 'Crédit impot unitaire ',
                    'rules' => 'required|numeric'
                ),
            );
        return $configsoustype;
    }

    public function configtraitementsoustype()
    {
        $configtraitementsoustype = array(
            array(
                'field' => 'nomcourt',
                'label' => 'Nom court',
                'rules' => 'xss_clean|htmlentities'
            ),
            array(
                'field' => 'nomdevis',
                'label' => 'Nom devis',
                'rules' => 'xss_clean|htmlentities'
            ),
        );
        return $configtraitementsoustype;
    }


    ////////////////////////////////  GESTION DU DEVIS (TABLE ARTICLE) ////////////////////////////////////

    public function consult_catalogue_devis()
    {
        $data = array();
        $data['tableau'] = $this->create_tableau_catalogue(); // On appel la fonction de création du cataloge en mode tableau pour pouvoir l'afficher avec la variable $data['tableau']

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
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

        $idprod = ($this->session->userdata('CI_catalogue/select_produit_devis'));
        $produit = $this->catalogue->select_panneau($idprod);
        $produit[0]['dossier_id'] = $this->session->userdata['idDossier'];

        $this->article->ajouter_article($produit);
        $this->devis_form($idprod);
    }

    public function devis_form($idprod = NULL)                          //NOUVEAU DOSSER
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
        //Articles
        $data['article'] = $this->aff_Article();

        //-----------Calcul de la somme---
        $articles = $this->article->list_article_dossier($this->session->userdata['idDossier']);
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
            unset($article['id']);
            $article_id = $article['article_id'];
            unset($article['article_id']);

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


    public function aff_Article()
    {
        $this->load->model('Mappage/article', 'article');
        $result = $this->article->list_article_dossier($this->session->userdata('idDossier'));
        return $result;
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

}
