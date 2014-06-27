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
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

    public function consult_catalogue()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

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
//        echo('vard dump du fichier dans create tab add');
//        var_dump($fichier);

        $ajoutbdd = array();
        $i = 0;

        foreach ($refbdd as $rfbdd) {
        foreach ($fichier as $fich) {
            $ajoutbdd[$i] = array_diff($fich, $rfbdd);
            $i++;
        }
    }

return $ajoutbdd;
}

public
function create_tab_supp_bdd()
{

    $this->load->model('Mappage/catalogue', 'catalogue');
    $refbdd = $this->catalogue->get_full_bdd();

    $this->load->library('fonctionspersos');
    $fichier = $this->fonctionspersos->lire_fichier_catalogue();
//        echo('vard dump du fichier dans create tab supp');
//        var_dump($fichier);

    $suppbdd = array();
    $i = 0;

    foreach ($refbdd as $rfbdd) {
        foreach ($fichier as $fich) {
            $suppbdd[$i] = array_diff($rfbdd, $fich);
            $i++;
        }
    }

    return $suppbdd;
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

    $this->decodefichier($fichier);

    $data['ajouts'] = $ajoutbdd;
    $data['supp'] = $suppbdd;
    $data['fichier'] = $fichier;

    //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
    $this->layout->title('Catalogue B2E');
    $this->layout->view('B2E/Catalogue/catalogue_diff', $data);
}

public
function validercatalogue()
{
    // On décode le fichier avec htmlspecialchars_decode dans la fonction ci-dessous
    $fichier = $this->fonctionspersos->lire_fichier_catalogue();

    // On envoie le fichier décodé au model pour l'uploader
    $this->load->model('Mappage/catalogue', 'catalogue');
    if ($this->catalogue->updatecatalogue($fichier) == TRUE) {
        echo('Plein yen a assez fratéééé !!!! NRV ce soir à la JOIA Plein !');
    } else {
        echo('Pebron que tu es, va te jeter aux goudes');
    }


}

public
function decodefichier($fichier)
{
//        function funcdecode($line)
//        {
//            htmlspecialchars_decode($line);
//        }
//
//        foreach ($fichier as $produit)
//        {
//            $newfichier = array_map("funcdecode",$produit );
//        }


    return htmlspecialchars_decode($fichier['P9-2940SP51'][4], ENT_NOQUOTES);
}

//
//    public function funcdecode($line)
//    {
//        return htmlspecialchars_decode($line, ENT_NOQUOTES);
//    }


}
