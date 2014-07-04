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
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['tableau'] = $this->create_tableau_catalogue();
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

    public function consult_catalogue()
    {
        $data = array();
        $data['tableau'] = $this->create_tableau_catalogue();

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

    public function load_catalogue()
    {
        //Remplissage de la variable $data avec différentes infos pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        $data['msg'] = "Charger un nouveau catalogue";
        $data['upload_data'] = '';

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Charger_Catalogue', $data);
    }

    public function upload_catalogue_form()
    {
        $this->layout->title('Upload de catalogue');
        $this->layout->view('B2E/Catalogue/Charger_Catalogue'); //render view and layout
    }

    public function upload_catalogue_action()
    {
        $dossier = 'upload/';
        $fichier = basename($_FILES['userfile']['name']);
        $extensions = array('.txt');
        $extension = strrchr($_FILES['userfile']['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type txt ';
        }
        if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                $this->aff_recap_upload();

            } else //Sinon (la fonction renvoie FALSE).
            {
                $this->layout->title('TEST UPLOAD SHANY');
                $this->layout->view('B2E/Catalogue/upload'); //render view and layout
                echo 'FUUUUUCK OFF ||| FUUUUUUUCCCCKKKK OOOOOOOOOFFFFF';
            }
        } else {
            echo $erreur;
        }
    }

    public function create_tab_ajout_bdd()
    {
        $this->load->model('Mappage/catalogue', 'catalogue');
        $refbdd = $this->catalogue->get_ref_bdd();

        $this->load->library('fonctionspersos');
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

    public
    function create_tab_supp_bdd()
    {

        $this->load->model('Mappage/catalogue', 'catalogue');
        $refbdd = $this->catalogue->get_full_bdd();
//        echo('données récupérées de la BDD');
//        var_dump($refbdd);

        $this->load->library('fonctionspersos');
        $fichier = $this->fonctionspersos->lire_fichier_catalogue();
//        echo('données récupérées du fichier');
//        var_dump($fichier);


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


//        var_dump($suppression);

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
            $modif=FALSE;
            foreach ($produit as $i => $element) {
                if ($element != $catalogueBDD[$ref][$i]) {  //car la premi�re colonne dans la base de donn�es est l'id bdd
                    $ligneModif[$i] = $element;
                    $modif=TRUE;
                }
            }
            if ($modif==TRUE){
                $ligneModif[0]=$ref;
                $tabmodif[$ref]=$ligneModif;
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
        $refbdd = $this->catalogue->get_ref_bdd();

        $this->load->library('fonctionspersos');
        $fichier = $this->fonctionspersos->lire_fichier_catalogue();

        $ajoutbdd = $this->create_tab_ajout_bdd();
        $suppbdd = $this->create_tab_supp_bdd();
        $modif = $this->create_tab_modif_bdd();
//        $this->decodefichier($fichier);
//        echo('vardmp d ajoutbdd');
//        var_dump($ajoutbdd);

        $data['ajouts'] = $ajoutbdd;
        $data['supp'] = $suppbdd;
        $data['modif'] = $modif;
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
        if(isset($add))
        {
            $data['ligneajouté'] = $this->catalogue->updatecatalogue($add);
        }
        
                //On fait les modifications
        if(isset($modif))
        {
            $data['lignemodifiée'] = $this->catalogue->updatecatalogue($modif);
        }

        //On fait les suppressions grâce au tableau récupéré via "create_tab_supp_bdd" et on indente le compteur à chaque suppression

        if (!empty($_POST['check_list']))
        {
            foreach ($_POST['check_list'] as $check)
            {
                if ($this->catalogue->supprimer($check) == TRUE) {
                $data['lignesuppr']++;
            }
            }
        }
        else
        {
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
        $BDD = $this->cata->get_full_bdd();
        $i = 0;
        $newtab=array();
        foreach ($BDD as $ligne) {
            $newtab[$i]['Reference'] = $ligne['Reference'];
            $newtab[$i]['Nom'] = $ligne['Nom'];
            $newtab[$i]['Marque'] = $ligne['Marque'];
            $newtab[$i]['Puissance'] = $ligne['Puissance'];
            $newtab[$i]['Prix_Annonce_TTC'] = $ligne['Prix_Annonce_TTC'];
            $i++;
        }

        return $newtab;
    }

    public function gererlistetype($line)
    {
        $data = array();
        $data['tableau'] = $this->create_tableau_catalogue();

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }


}
