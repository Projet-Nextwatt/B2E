<?php

class PV extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {


    }

    public function etudecomplete()
    {
        $this->load->model('Mappage/ensoleillement', 'ensoleillement');

        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        //Image
        $data['tablorientation'] = img_url('Tableau-orientation.png');
        $data['quinze'] = img_url('15.png');
        $data['vingt'] = img_url('20.png');
        $data['trente'] = img_url('30.png');
        $data['quarantecinq'] = img_url('45.png');
        $data['soixante'] = img_url('60.png');


        $data['station'] = $this->ensoleillement->select_ensoleillement();
        $this->layout->title('Accueil B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->view('B2E/Etudes/Solaire/Etude_Solaire', $data); // Render view and layout

    }

    public function choixstation()
    {
        $this->load->model('Mappage/ensoleillement', 'ensoleillement');
        $data = array();
        $data['station'] = $this->ensoleillement->select_ensoleillement();
        $this->layout->title('Station B2E');
        $this->layout->js(js_url('etudesolaire'));

        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => 'active',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => '',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => '',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => '',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => '',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);
        $IDEnsol = $this->session->userdata('ID_Ensoleillement');

        if ($IDEnsol) {
            $this->layout->function_js('preselectstation(' . $IDEnsol . ');');
        } else {
            $this->layout->function_js('geolocalisestation();');
        }


        $this->layout->view('B2E/Etudes/Solaire/Choix_Station', $data); // Render view and layout
    }

    public function choixorientation()
    {
        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => '',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => 'active',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => '',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => '',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => '',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);

        //Image
        $data['tablorientation'] = img_url('Tableau-orientation.png');
        $data['quinze'] = img_url('15.png');
        $data['vingt'] = img_url('20.png');
        $data['trente'] = img_url('30.png');
        $data['quarantecinq'] = img_url('45.png');
        $data['soixante'] = img_url('60.png');


        $this->layout->title('Orientation B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->function_js('canvasorient();');
        $this->layout->view('B2E/Etudes/Solaire/Choix_Orientation', $data); // Render view and layout
    }

    public function calculmasque()
    {
        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => '',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => '',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => 'active',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => '',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => '',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Calcul du masque B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->view('B2E/Etudes/Solaire/Calcul_Masque'); // Render view and layout
    }

    public function calculhepp()
    {
        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => '',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => '',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => '',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => 'active',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => '',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Calcul de HEPP B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->function_js('calculhepp()');
        $this->layout->view('B2E/Etudes/Solaire/Calcul_Hepp'); // Render view and layout
    }

    public function calculprod()
    {
        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => '',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => '',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => '',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => '',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => 'active',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => '',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Calcul de Production B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->view('B2E/Etudes/Solaire/Calcul_Production'); // Render view and layout
    }

    public function calculrecette()
    {
        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => '',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => '',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => '',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => '',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => 'active',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Calcul de Recette B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->view('B2E/Etudes/Solaire/Calcul_Recette'); // Render view and layout
    }

    public function recette()
    {
        $breadcrumps = array(
            array(
                'title' => 'Station',
                'actif' => '',
                'link' => site_url("pv/choixstation")
            ),
            array(
                'title' => 'Orientation',
                'actif' => '',
                'link' => site_url("pv/choixorientation")
            ),
            array(
                'title' => 'Masque',
                'actif' => '',
                'link' => site_url("pv/calculmasque")
            ),
            array(
                'title' => 'HEPP nette',
                'actif' => '',
                'link' => site_url("pv/calculhepp")
            ),
            array(
                'title' => 'Production',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
            array(
                'title' => 'Recette',
                'actif' => '',
                'link' => site_url("pv/calculrecette")
            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => 'active',
                'link' => site_url("pv/recette")
            )
        );

        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Récap B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->function_js('anneeProd()');
        $this->layout->function_js('cumulProd()');
        $this->layout->function_js('anneetarif()');
        $this->layout->function_js('anneeflouz()');
        $this->layout->function_js('cumulflouz()');
        $this->layout->view('B2E/Etudes/Solaire/Recette.php'); // Render view and layout
    }

    public function ajax_geoposition()
    {

        $this->load->model('Mappage/ensoleillement', 'ensoleillement'); // Chargement model "Ensoleillement"
        $data = array();
        $data['station'] = $this->ensoleillement->select_ensoleillement(); // Recup des données station avec le model "ensoleillement"
        $distanceMin = 100;
        if (isset($_POST['panneau']) && isset($_POST['latitude']) && isset($_POST['longitude'])) {
            foreach ($data['station'] as $stationtemp) {
                $distance = sqrt(abs($_POST['latitude'] - $stationtemp['Latitude'])) + sqrt(abs($_POST['longitude'] - $stationtemp['Longitude']));
                if ($distanceMin > $distance) {
                    $station = $stationtemp;
                    $distanceMin = $distance;

                }

            }
//            $this->session_orientation($station['ID_Ensoleillement'], $station['HEPP'], $station['Ville']);
            $tabPanneau =array('Panneau' => $_POST['panneau'],'ID_Ensoleillement' =>$station['id'], 'HEPP' => $station['HEPP'], 'Ville' => $station['Ville'] );
            $this->GestionPanneau($tabPanneau);
            $jsonstationtrouvee = json_encode($station);
            echo $jsonstationtrouvee;

        }
    }


    public
    function ajax_heppstation()
    {
        $this->load->model('Mappage/ensoleillement', 'ensoleillement'); // Chargement model "Ensoleillement"
        $data = array();
        $data['station'] = $this->ensoleillement->select_ensoleillement(); // Recup des données station avec le model "ensoleillement"

        if (isset($_POST['panneau']) && isset($_POST['idVille'])) {
            foreach ($data['station'] as $station) { // Parcours les données du select pour trouver la station correspondante
                if ($station['id'] == $_POST['idVille']['keyname']) {
                    $tabstation = array('Panneau' => $_POST['panneau'],'ID_Ensoleillement' => $station['id'], 'Ville' => $station['Ville'], 'HEPP' => $station['HEPP']); // Création tableau pour la conversion en json avec la ville et le HEPP correspondant
                    $this->GestionPanneau($tabstation);
//                    $this->session_orientation($_POST['panneau'],$station['ID_Ensoleillement'], $station['HEPP'], $station['Ville']);
                    $jsonstation = json_encode($tabstation); // Création du JSON avec le tableau
                    echo $jsonstation; // Envoi du JSON
                }
            }
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }

    }

    public function session_orientation($panneau,$idEnsol, $hepp, $ville)
    {
        $tabsession = array('Panneau' => $panneau ,'ID_Ensoleillement' => $idEnsol, 'HEPP' => $hepp, 'Ville' => $ville);
        $tabsession = array('Panneau' => $tabsession);
        $this->session->set_userdata($tabsession);
//        $this->GestionPanneau($tabsession);
//        $this->session->set_userdata($tabsession);
    }

    public
    function ajax_orientation()
    {

        if (isset($_POST['orientation'])) {
            $tabsession = array('HEPP' => $this->session->userdata('HEPP'), 'Orientation' => $_POST['orientation']);
            $this->session->set_userdata($tabsession);
            echo $_POST['orientation'];
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_envoiratioc()
    {

        if (isset($_POST['ratioc'])) {
            if (is_numeric($_POST['ratioc']) && $_POST['ratioc'] != '') {
                $tabsession = array(
                    'HEPP' => $this->session->userdata('HEPP'),
                    'Orientation' => $this->session->userdata('Orientation'),
                    'Ratioc' => $_POST['ratioc']);
                $this->session->set_userdata($tabsession);
                echo $_POST['ratioc'];
            }

        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_calculhepp()
    {
        if (isset($_POST['hepp']) && isset($_POST['choixorient']) && isset($_POST['ratioc'])) {
            $heppnette = ($_POST['hepp'] * ($_POST['choixorient'] / 100) * ($_POST['ratioc']) / 100);
            $tabsession = array(
                'HEPP' => $this->session->userdata('HEPP'),
                'Orientation' => $this->session->userdata('Orientation'),
                'Ratioc' => $this->session->userdata('Ratioc'),
                'Heppnet' => $heppnette);
            $this->session->set_userdata($tabsession);
            echo $heppnette;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_calculprod()
    {
        if (isset($_POST['raccordement']) && isset($_POST['systeme']) && isset($_POST['bonus'])) {
            $prod = $_POST['systeme'] * $this->session->userdata('Heppnet');
            $prodtotal = ($prod + $prod * ($_POST['bonus'] / 100)) / 1000; // Calcul de la prod totale = prod + la prod avec le bonus (0 ou 10 % ) et divisé par mille
            $tabsession = array(
                'HEPP' => $this->session->userdata('HEPP'),
                'Orientation' => $this->session->userdata('Orientation'),
                'Ratioc' => $this->session->userdata('Ratioc'),
                'Heppnet' => $this->session->userdata('Heppnet'),
                'Raccordement' => $_POST['raccordement'],
                'Production' => $prodtotal);
            $this->session->set_userdata($tabsession);
            echo $prodtotal;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_recetteannuelle()
    {
        if (isset($_POST['production']) && isset($_POST['tarifedf'])) {
            $recetteannuelle = $_POST['production'] * $_POST['tarifedf']; // Prod * tarif edf
            $recetteannuelle = round($recetteannuelle, 2); // Arrondie le résultat avec 2 chiffres après la virgule
            $recettevingtnans = $recetteannuelle * 20; // Fois 20 pour 20 ans

            $tabrecette = array('annuelle' => $recetteannuelle, 'vingtans' => $recettevingtnans); // Création tableau avec recette annuelle et sur 20 ans
            $jsonrecette = json_encode($tabrecette); // Création du JSON avec le tableau

            $tabsession = array(
                'HEPP' => $this->session->userdata('HEPP'),
                'Orientation' => $this->session->userdata('Orientation'),
                'Ratioc' => $this->session->userdata('Ratioc'),
                'Heppnet' => $this->session->userdata('Heppnet'),
                'Raccordement' => $this->session->userdata('Raccordement'),
                'Production' => $_POST['production'],
                'Tarifedf' => $_POST['tarifedf']);
            $this->session->set_userdata($tabsession);
            echo $jsonrecette; // Envoi du JSON
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_prodannuelle()
    {
        $Production = $this->session->userdata('Production');
        if (isset($Production)) {
            $prodAnneeZero = $Production;
            $raisonProd = 1 - (0.5 / 100); // Raison production
            $ligneProdAnnuelle = '';

            for ($i = 0; $i < 20; $i++) {
                $raisonProdPuissance = pow($raisonProd, $i); // Raison production puissance $i pour correspondre avec l'année
                $prodAnneChoisie = round(($prodAnneeZero * $raisonProdPuissance), 2); // Prod à l'année zero * raison prod puissance arrondie à 2 chiffres après la virgule
                $ligneProdAnnuelle[$i] = $prodAnneChoisie;

            }
            $jsonProdAnnuelle = json_encode($ligneProdAnnuelle);
            echo $jsonProdAnnuelle;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_cumulprod()
    {
        $Production = $this->session->userdata('Production');
        if (isset($Production)) {
            $prodAnneeZero = $Production;
            $raisonProd = 1 - (0.5 / 100); // Raison production
            $ligneProdPuissance = '';

            for ($i = 0; $i < 20; $i++) {
                $raisonProdPuissance = pow($raisonProd, $i + 1); // Raison production puissance $i pour correspondre avec l'année en cours
                $prodCumulee = round($prodAnneeZero * ((1 - $raisonProdPuissance) / (1 - $raisonProd)), 2); // Calcul de la prod cumulée
                $ligneProdPuissance[$i] = $prodCumulee;

            }

            $jsonProdAnnuelle = json_encode($ligneProdPuissance);
            echo $jsonProdAnnuelle;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_tarif()
    {
        $Tarifedf = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Raccordement');
        if (isset($Tarifedf) && isset($raccordement)) {
            $tarifAnneeZero = $Tarifedf;
            $raisonTarif = 1 + ($raccordement / 100); // Raison tarif

            for ($i = 0; $i < 20; $i++) {
                $raisonTarifPuissance = pow($raisonTarif, $i);
                $tarifAnneeChoisie = $tarifAnneeZero * $raisonTarifPuissance;
                $ligneTarif[$i] = round($tarifAnneeChoisie, 2);
            }

            $jsonTarif = json_encode($ligneTarif);
            echo $jsonTarif;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_anneeflouz()
    {
        $tarifAnnee = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Raccordement');
        $productionAnneeZero = $this->session->userdata('Production');
        if (isset($tarifAnnee) && isset($raccordement) && isset($productionAnneeZero)) {
            $ligneFlouz = '';

            $flouzTotal = $tarifAnnee * $productionAnneeZero;
            $raisonTarif = 1 + ($raccordement / 100);
            $raisonProd = 1 - (0.5 / 100);
            $raisonTotale = $raisonTarif * $raisonProd;

            for ($i = 0; $i < 20; $i++) {
                $raisonFlouz = pow($raisonTotale, $i);
                $flouzAnneeChoisie = round(($flouzTotal * $raisonFlouz), 0);
                $ligneFlouz[$i] = $flouzAnneeChoisie;
            }

            $jsonFlouz = json_encode($ligneFlouz);
            echo $jsonFlouz;

        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_cumulflouz()
    {
        $tarifAnnee = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Raccordement');
        $productionAnneeZero = $this->session->userdata('Production');
        if (isset($tarifAnnee) && isset($raccordement) && isset($productionAnneeZero)) {
            $ligneFlouz = '';

            $flouzTotal = $tarifAnnee * $productionAnneeZero;
            $raisonTarif = 1 + ($raccordement / 100);
            $raisonProd = 1 - (0.5 / 100);
            $raisonTotale = $raisonTarif * $raisonProd;

            for ($i = 0; $i < 20; $i++) {
                $raisonFlouz = pow($raisonTotale, $i + 1);
                $flouzCumule = round($flouzTotal * ((1 - $raisonFlouz) / (1 - $raisonTotale)), 0);
                $ligneFlouz[$i] = $flouzCumule;
            }

            $jsonFlouz = json_encode($ligneFlouz);
            echo $jsonFlouz;

        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function GestionPanneau($tabPanneau){
        switch($tabPanneau['Panneau']){
            case 1 :
                $tabPanneau = array('Panneau' => $tabPanneau);
                $this->session->set_userdata($tabPanneau);
                break;
        }
        $this->session->set_userdata['Panneau']= $tabPanneau;
    }

    public function AffPanneau($tabPanneau)
    {
        switch ($tabPanneau['Panneau']) {
            case 1 :
//                $this->session->userdata[0]['']
        }
    }
}

