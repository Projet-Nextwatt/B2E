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
//            array(
//                'title' => 'HEPP nette',
//                'actif' => '',
//                'link' => site_url("pv/calculhepp")
//            ),
            array(
                'title' => 'Système',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
//            array(
//                'title' => 'Recette',
//                'actif' => '',
//                'link' => site_url("pv/calculrecette")
//            ),
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

        $this->node_Calcul();
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
//            array(
//                'title' => 'HEPP nette',
//                'actif' => '',
//                'link' => site_url("pv/calculhepp")
//            ),
            array(
                'title' => 'Système',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
//            array(
//                'title' => 'Recette',
//                'actif' => '',
//                'link' => site_url("pv/calculrecette")
//            ),
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

        $this->node_Calcul();
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
//            array(
//                'title' => 'HEPP nette',
//                'actif' => '',
//                'link' => site_url("pv/calculhepp")
//            ),
            array(
                'title' => 'Système',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
//            array(
//                'title' => 'Recette',
//                'actif' => '',
//                'link' => site_url("pv/calculrecette")
//            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );

        $data = array();
        $data['masquesolaire'] = img_url('Diagramme-solaire.png');

        $ratioc = $this->session->userdata('Ratioc');
        if (empty($ratioc)) {
            $this->session->set_userdata(array('Ratioc' => 100));
            $data['RatioC'] = 100;
        }

        $this->node_Calcul();
        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Calcul du masque B2E');
        $this->layout->js(js_url('imagemapster.min'));
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->function_js('resize()');
        $this->layout->function_js('onWindowResize()');
//        $this->layout->function_js('mapstermasque()');
        $this->layout->view('B2E/Etudes/Solaire/Calcul_Masque', $data); // Render view and layout
    }

//    public function calculhepp()
//    {
//        $breadcrumps = array(
//            array(
//                'title' => 'Station',
//                'actif' => '',
//                'link' => site_url("pv/choixstation")
//            ),
//            array(
//                'title' => 'Orientation',
//                'actif' => '',
//                'link' => site_url("pv/choixorientation")
//            ),
//            array(
//                'title' => 'Masque',
//                'actif' => '',
//                'link' => site_url("pv/calculmasque")
//            ),
//            array(
//                'title' => 'HEPP nette',
//                'actif' => 'active',
//                'link' => site_url("pv/calculhepp")
//            ),
//            array(
//                'title' => 'Système',
//                'actif' => '',
//                'link' => site_url("pv/calculprod")
//            ),
//            array(
//                'title' => 'Recette',
//                'actif' => '',
//                'link' => site_url("pv/calculrecette")
//            ),
//            array(
//                'title' => 'Récapitulatif',
//                'actif' => '',
//                'link' => site_url("pv/recette")
//            )
//        );
//
//        $this->node_Calcul();
//        $this->layout->breadcrumbs($breadcrumps);
//        $this->layout->title('Calcul de HEPP B2E');
//        $this->layout->js(js_url('etudesolaire'));
//        $this->layout->function_js('calculhepp()');
//        $this->layout->view('B2E/Etudes/Solaire/Calcul_Hepp'); // Render view and layout
//    }

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
//            array(
//                'title' => 'HEPP nette',
//                'actif' => '',
//                'link' => site_url("pv/calculhepp")
//            ),
            array(
                'title' => 'Système',
                'actif' => 'active',
                'link' => site_url("pv/calculprod")
            ),
//            array(
//                'title' => 'Recette',
//                'actif' => '',
//                'link' => site_url("pv/calculrecette")
//            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => '',
                'link' => site_url("pv/recette")
            )
        );
        $this->load->model('Mappage/catalogue', 'panneau');
        $data = array();
        $data['panneau'] = $this->panneau->select_panneau(null);

        $this->node_Calcul();
        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Calcul de Production B2E');
        $this->layout->js(js_url('etudesolaire'));
        $this->layout->view('B2E/Etudes/Solaire/Calcul_Production', $data); // Render view and layout
    }

//    public function calculrecette()
//    {
//        $breadcrumps = array(
//            array(
//                'title' => 'Station',
//                'actif' => '',
//                'link' => site_url("pv/choixstation")
//            ),
//            array(
//                'title' => 'Orientation',
//                'actif' => '',
//                'link' => site_url("pv/choixorientation")
//            ),
//            array(
//                'title' => 'Masque',
//                'actif' => '',
//                'link' => site_url("pv/calculmasque")
//            ),
////            array(
////                'title' => 'HEPP nette',
////                'actif' => '',
////                'link' => site_url("pv/calculhepp")
////            ),
//            array(
//                'title' => 'Système',
//                'actif' => '',
//                'link' => site_url("pv/calculprod")
//            ),
//            array(
//                'title' => 'Recette',
//                'actif' => 'active',
//                'link' => site_url("pv/calculrecette")
//            ),
//            array(
//                'title' => 'Récapitulatif',
//                'actif' => '',
//                'link' => site_url("pv/recette")
//            )
//        );
//
//        $this->load->model('Mappage/prixenergie', 'energie');
//        $data = array();
//        if ($this->session->userdata('Raccordement') == 'TRUE') {
//            $idraccord = '2';
//        } else {
//            $idraccord = '1';
//        }
//        $data['energie'] = $this->energie->select_prixrachat($idraccord);
//        $this->session->set_userdata(array('Inflation' => $data['energie'][0]['Inflation']));
//        $data['energie'] = $data['energie'][0]['Prix'];
//
//        $this->node_Calcul();
//        $this->layout->breadcrumbs($breadcrumps);
//        $this->layout->title('Calcul de Recette B2E');
//        $this->layout->js(js_url('etudesolaire'));
//        $this->layout->function_js('calculrecette()');
//        $this->layout->view('B2E/Etudes/Solaire/Calcul_Recette', $data); // Render view and layout
//    }

    public function recette($msgsucces = null)
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
//            array(
//                'title' => 'HEPP nette',
//                'actif' => '',
//                'link' => site_url("pv/calculhepp")
//            ),
            array(
                'title' => 'Système',
                'actif' => '',
                'link' => site_url("pv/calculprod")
            ),
//            array(
//                'title' => 'Recette',
//                'actif' => '',
//                'link' => site_url("pv/calculrecette")
//            ),
            array(
                'title' => 'Récapitulatif',
                'actif' => 'active',
                'link' => site_url("pv/recette")
            )
        );


        $data = array();
        $data['Prodannuelle'] = $this->prodannuelle();
        $data['tarifannuel'] = $this->tarif();
        $data['flouzannuel'] = $this->anneeflouz();
        $data['flouzcumul'] = $this->cumulflouz();
        if (isset($msgsucces)) {
            $data['msgsucces'] = $msgsucces;
        }

        $this->node_Calcul();
        $this->layout->breadcrumbs($breadcrumps);
        $this->layout->title('Récap B2E');
        $this->layout->js(js_url('etudesolaire'));
//        $this->layout->function_js('anneeProd()');
//        $this->layout->function_js('cumulProd()');
//        $this->layout->function_js('anneetarif()');
//        $this->layout->function_js('anneeflouz()');
//        $this->layout->function_js('cumulflouz()');
        $this->layout->view('B2E/Etudes/Solaire/Recette.php', $data); // Render view and layout
    }

    public function enregistrer_etude()
    {
        $this->load->model('Mappage/catalogue', 'catalogue'); //On load les deux modèles que nous voulons utiliser
        $this->load->model('Mappage/etude', 'etude');

        $panneau = $this->catalogue->select_panneau_by_nom($this->session->userdata['Panneau']); //Récupération du produit que l'on souhaite via la fonction "select_panneau_by_non"
        $spec = html_entity_decode($panneau[0]['Spec']); //On récupère les spec et les décodes pour pouvoir les utiliser après (HTML entities decode puis Json decode
        $prodjson = json_decode($spec, true);

        $data['HEPP'] = (float)$this->session->userdata['HEPP'];
        $data['Masque'] = $this->session->userdata['Ratioc'];
        $data['Orientation'] = (float)$this->session->userdata['Orientation'];
        $data['Puisysteme'] = (float)$panneau[0]['Puissance']; // On récupère les variables qui étaient en session pour les passer au modèle pour l'ajout en BDD
        if (isset($prodjson['bonusProd'])) {
            $data['Bonus'] = (int)$prodjson['bonusProd'];
        }
        $data['id_dossier'] = $this->session->userdata['idDossier'];


        if ($this->etude->ajouter_etude($data) == TRUE) //On vérifie que la requête s'est bien exécutée
        {
            $msgsucces = 'Enregistrement correctement effectué'; //On définit un message à afficher
            $this->recette($msgsucces); // On appel la méthode "recette" de notre controlleur en lui passant le message à afficher en paramètre
        } else {
            $msgsucces = 'Problème lors de la sauvegarde';
            $this->recette($msgsucces);
        }
    }

    public function retour_menu_dossier()
    {
        $this->load->model('Mappage/client', 'client');
        $this->load->model('Mappage/user', 'user');
        $this->load->model('Mappage/dossier', 'dossier');

        $dossier_id = $this->session->userdata['idDossier'];
        $dossier = $this->dossier->select_dossier($dossier_id);
        $client = $this->client->select_client($dossier[0]['client_id']);
        $user = $this->user->select_user($client['user_id']);

        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];
        $data['ville'] = $client['ville'];
        $data['tel'] = $client['tel1'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];

        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier', $data);
    }


    /********************* PARTIE AJAX  ************************************/


    public function ajax_geoposition()
    {
// --------------------------------------
        $_POST['panneau'] = 1;
//---------------------------------------


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
            $tabstation = array('ID_Ensoleillement' => $station['id'], 'Ville' => $station['Ville'], 'HEPP' => $station['HEPP']); // Création tableau pour la conversion en json avec la ville et le HEPP correspondant
            $this->session->set_userdata($tabstation);
            $jsonstationtrouvee = json_encode($station);
            $this->node_Calcul();
            echo $jsonstationtrouvee;
        }
    }

    public function ajax_heppstation()
    {
        $this->load->model('Mappage/ensoleillement', 'ensoleillement'); // Chargement model "Ensoleillement"
        $data = array();
        $data['station'] = $this->ensoleillement->select_ensoleillement(); // Recup des données station avec le model "ensoleillement"

        if (isset($_POST['idVille'])) {
            foreach ($data['station'] as $station) { // Parcours les données du select pour trouver la station correspondante
                if ($station['id'] == $_POST['idVille']['keyname']) {
                    $tabstation = array('ID_Ensoleillement' => $station['id'], 'Ville' => $station['Ville'], 'HEPP' => $station['HEPP']); // Création tableau pour la conversion en json avec la ville et le HEPP correspondant
                    $this->session->set_userdata($tabstation);
                    $this->node_Calcul();
                    $jsonstation = json_encode($tabstation); // Création du JSON avec le tableau
                    echo $jsonstation; // Envoi du JSON
                }
            }
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_orientation()
    {

        if (isset($_POST['orientation'])) {
            $this->session->set_userdata(array('Orientation' => substr(trim($_POST['orientation']), 0, -2)));
            echo $this->session->userdata('Orientation');
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public
    function ajax_envoiratioc()
    {

        if (isset($_POST['masque']) || !empty($_POST['masque'])) {
            $masque = $_POST['masque'];
            $masqueexploque = explode(',', $masque);
            $perte = 0;
            if (!empty($_POST['masque'])) {
                foreach ($masqueexploque as $m) {
                    if (preg_match('#faible+#', $m)) {
                        $perte += 1.5;
                    } else if (preg_match('#moyen+#', $m)) {
                        $perte += 2.3;
                    } else if (preg_match('#fort+#', $m)) {
                        $perte += 2.8;
                    } else {
                        $perte = 0;
                    }

                }
                $ratioc = 100 - $perte;
                $this->session->set_userdata(array('Ratioc' => $ratioc));
                echo $ratioc;
            } else {
                $this->session->set_userdata(array('Ratioc' => 100));
                echo 100;
            }

        } else if (isset($_POST['ratioc'])) {
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

            $this->node_Calcul();
            echo $this->session->userdata('Heppnet');
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function ajax_panneau()
    {
        if (isset($_POST['id'])) {
            $this->load->model('Mappage/catalogue', 'catalogue');
            $data = $this->catalogue->select_panneau($_POST['id']); // Recup des données station avec le model "ensoleillement"
            $spec = html_entity_decode($data[0]['Spec']);
            $temparray = json_decode($spec, true);
            $production = $temparray['puissance'] * $this->session->userdata('Heppnet');
            if (isset($temparray['bonusProd'])) {
                $bonusprod = $temparray['bonusProd'];
            } else {
                $bonusprod = 0;
            }
            $prodtotale = ($production + $production * $bonusprod / 10000) / 1000;

            array_push($temparray, $prodtotale);
            array_push($temparray, $this->session->userdata('Heppnet'));

            $spec = json_encode($temparray);
            $tabsession = array(
                'Raccordement' => $temparray['raccorde'],
                'Production' => $prodtotale,
                'Panneau' => $data['0']['Nom'],
                'MarquePanneau' => $data['0']['Marque'],
                'PrixPanneau' => $data['0']['Prix_Annonce_TTC'],
                'bonusProd' => $bonusprod,
                'Puissance' =>$temparray['puissance']
            );
            $this->session->set_userdata($tabsession);

            echo $spec;
        }
    }

    public
    function ajax_calculprod()
    {
        if (isset($_POST['raccordement']) && isset($_POST['systeme']) && isset($_POST['bonus'])) {
            $prod = $_POST['systeme'] * $this->session->userdata('Heppnet');
            $prodtotal = ($prod + $prod * ($_POST['bonus'] / 10000)) / 1000; // Calcul de la prod totale = prod + la prod avec le bonus (0 ou 10 % ) et divisé par mille
            $tabsession = array(
                'HEPP' => $this->session->userdata('HEPP'),
                'Orientation' => $this->session->userdata('Orientation'),
                'Ratioc' => $this->session->userdata('Ratioc'),
                'Heppnet' => $this->session->userdata('Heppnet'),
                'Raccordement' => $_POST['raccordement'],
                'Production' => $prodtotal,
                'bonusProd' => $_POST['bonus']);
            $this->session->set_userdata($tabsession);
            echo $prodtotal;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

//    public
//    function ajax_recetteannuelle()
//    {
//        if (isset($_POST['production']) && isset($_POST['tarifedf'])) {
//            $recetteannuelle = $_POST['production'] * $_POST['tarifedf']; // Prod * tarif edf
//            $recetteannuelle = round($recetteannuelle, 2); // Arrondie le résultat avec 2 chiffres après la virgule
//            $recettevingtnans = $recetteannuelle * 20; // Fois 20 pour 20 ans
//
//            $tabrecette = array('annuelle' => $recetteannuelle, 'vingtans' => $recettevingtnans); // Création tableau avec recette annuelle et sur 20 ans
//            $jsonrecette = json_encode($tabrecette); // Création du JSON avec le tableau
//
//            $tabsession = array(
//                'HEPP' => $this->session->userdata('HEPP'),
//                'Orientation' => $this->session->userdata('Orientation'),
//                'Ratioc' => $this->session->userdata('Ratioc'),
//                'Heppnet' => $this->session->userdata('Heppnet'),
//                'Raccordement' => $this->session->userdata('Raccordement'),
//                'Production' => $_POST['production'],
//                'Tarifedf' => $_POST['tarifedf']);
//            $this->session->set_userdata($tabsession);
//            echo $jsonrecette; // Envoi du JSON
//        } else {
//            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
//            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
//        }
//    }

    public function prodannuelle()
    {
        $Production = $this->session->userdata('Production');
        $prodAnneeZero = $Production;
        $raisonProd = 1 - (0.5 / 100); // Raison production
        $ligneProdAnnuelle = '';

        for ($i = 0; $i < 20; $i++) {
            $raisonProdPuissance = pow($raisonProd, $i); // Raison production puissance $i pour correspondre avec l'année
            $prodAnneChoisie = round(($prodAnneeZero * $raisonProdPuissance), 2); // Prod à l'année zero * raison prod puissance arrondie à 2 chiffres après la virgule
            $ligneProdAnnuelle[$i] = $prodAnneChoisie;

        }
        return $ligneProdAnnuelle;
    }

    public
    function ajax_tarif()
    {
        $Tarifedf = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Inflation');

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

    public function tarif()
    {
        $Tarifedf = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Inflation');
        $tarifAnneeZero = $Tarifedf;
        $raisonTarif = 1 + ($raccordement / 100); // Raison tarif

        for ($i = 0; $i < 20; $i++) {
            $raisonTarifPuissance = pow($raisonTarif, $i);
            $tarifAnneeChoisie = $tarifAnneeZero * $raisonTarifPuissance;
            $ligneTarif[$i] = round($tarifAnneeChoisie, 2);
        }
        return $ligneTarif;
    }

    public
    function ajax_anneeflouz()
    {
        $tarifAnnee = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Inflation');
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

    public function anneeflouz()
    {
        $tarifAnnee = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Inflation');
        $productionAnneeZero = $this->session->userdata('Production');
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

        return $ligneFlouz;
    }

    public
    function ajax_cumulflouz()
    {
        $tarifAnnee = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Inflation');
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

    public function cumulflouz()
    {
        $tarifAnnee = $this->session->userdata('Tarifedf');
        $raccordement = $this->session->userdata('Inflation');
        $productionAnneeZero = $this->session->userdata('Production');
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
        return $ligneFlouz;
    }

    public function ajax_selectpanneaucritere()
    {
        if (isset($_POST['type']) && isset($_POST['raccordement'])) {
            $critere = array($_POST['type']);
            $this->load->model('Mappage/catalogue', 'catalogue');
            $critere = array($_POST['type'], $_POST['raccordement']);
            $data = $this->catalogue->select_panneau_critere($critere); // Recup des données station avec le model "ensoleillement"
            $data = json_encode($data);
            echo $data;
        }
    }

    public function pdf()
    {
        //CSS

        //Image
//        $this->load->img_url('minilogonextwatt.png');
//        $this->load->img_url('feuillenextwatt.png');

        $data = array();
        $data['Prodannuelle'] = $this->prodannuelle();
        $data['tarifannuel'] = $this->tarif();
        $data['flouzannuel'] = $this->anneeflouz();

        $data['flouzcumul'] = $this->cumulflouz();

        $this->load->model('mappage/client', 'Client');
        $data['resultClient'] = $this->Client->get_InfoUser($this->session->userdata['idClient']);


        // Load all views as normal
        $this->load->view('B2E/Etudes/Solaire/PDF_Recette.php', $data);
        // Get output html
        $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //Preview
        $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
        //DL direct sans preview
//        $this->dompdf->stream("welcome.pdf");

    }

    function node_Calcul()
    {
        $ID_Ensoleillement = $this->session->userdata('ID_Ensoleillement');
        $HEPP = $this->session->userdata('HEPP');
        $Orientation = $this->session->userdata('Orientation');
        $Ratioc = $this->session->userdata('Ratioc');
        $Ville = $this->session->userdata('Ville');
        $Heppnet = $this->session->userdata('Heppnet');
        $Raccordement = $this->session->userdata('Raccordement');
        $Production = $this->session->userdata('Production');
        $bonusProd = $this->session->userdata('bonusProd');
        $Panneau = $this->session->userdata('Panneau');
        $MarquePanneau = $this->session->userdata('MarquePanneau');
        $PrixPanneau = $this->session->userdata('PrixPanneau');
        $Inflation = $this->session->userdata('Inflation');
        $Tarifedf = $this->session->userdata('Tarifedf');
        $Puissance = $this->session->userdata('Puissance');

        // Calcul Hepp net --------------------------------
        $heppnette = ($HEPP * ($Orientation / 100) * ($Ratioc) / 100);
        $this->session->set_userdata(array('Heppnet' => $heppnette));
        // ------------------------------------------------

        // Calcul Production ------------------------------
        $production = $Puissance * $Heppnet;
        $prodtotale = ($production + $production * $bonusProd / 10000) / 1000;
        $this->session->set_userdata(array('Production' => $prodtotale));
        // ------------------------------------------------

        //Récup tarif EDF ---------------------------------
        $data = array();
        if ($Raccordement == 'TRUE') {
            $idraccord = '2';
        } else {
            $idraccord = '1';
        }
        $this->load->model('Mappage/prixenergie', 'energie');
        $data['energie'] = $this->energie->select_prixrachat($idraccord);
        $this->session->set_userdata(array('Inflation' => $data['energie'][0]['Inflation']));
        $data['energie'] = $data['energie'][0]['Prix'];

        $this->session->set_userdata(array('Tarifedf' => $data['energie']));
    }
    // ------------------------------------------------
}

