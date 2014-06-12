<?php

class PV extends CI_Controller
{

    public function index()
    {
        $this->load->model('Mappage/ensoleillement', 'ensoleillement');

        $data = array();

        //Javascript
        $data['jquerymin'] = js_url('jquery.min');

        //Image
        $data['tablorientation'] = img_url('Tableau-orientation.png');
        $data['quinze'] = img_url('15.png');
        $data['vingt'] = img_url('20.png');
        $data['trente'] = img_url('30.png');
        $data['quarantecinq'] = img_url('45.png');
        $data['soixante'] = img_url('60.png');


        $data['station'] = $this->ensoleillement->select_ensoleillement();
        $this->load->view('B2E/Etudes/Solaire/etudesolaire', $data);
    }

    public function heppstation()
    {
        $this->load->model('Mappage/ensoleillement', 'ensoleillement');                                                 // Chargement model "Ensoleillement"
        $data = array();
        $data['station'] = $this->ensoleillement->select_ensoleillement();                                              // Recup des données station avec le model "ensoleillement"

        if (isset($_POST['idVille'])) {
            foreach ($data['station'] as $station) {                                                                    // Parcours les données du select pour trouver la station correspondante
                if ($station['ID_Ensoleillement'] == $_POST['idVille']['keyname']) {
                    $tabstation = array('Ville' => $station['Ville'], 'HEPP' => $station['HEPP']);                      // Création tableau pour la conversion en json avec la ville et le HEPP correspondant
                    $jsonstation = json_encode($tabstation);                                                            // Création du JSON avec le tableau
                    echo $jsonstation;                                                                                  // Envoi du JSON
                }
            }
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }

    }

    public function orientation()
    {
        if (isset($_POST['orientation'])) {
            echo $_POST['orientation'];
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }


    public function envoiratioc()
    {
        if (isset($_POST['ratioc'])) {
            echo $_POST['ratioc'];
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }


    public function calculhepp()
    {
        if (isset($_POST['hepp']) && isset($_POST['choixorient']) && isset($_POST['ratioc'])) {
            $heppnette = ($_POST['hepp'] * ($_POST['choixorient'] / 100) * ($_POST['ratioc']) / 100);
            echo $heppnette;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function calculprod()
    {
        if (isset($_POST['heppnet']) && isset($_POST['systeme']) && isset($_POST['bonus'])) {
            $prod = $_POST['systeme'] * $_POST['heppnet'];
            $prodtotal = ($prod + $prod * ($_POST['bonus'] / 100)) / 1000;                                              // Calcul de la prod totale = prod + la prod avec le bonus (0 ou 10 % ) et divisé par mille
            echo $prodtotal;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function recetteannuelle()
    {
        if (isset($_POST['production']) && isset($_POST['tarifedf'])) {
            $recetteannuelle = $_POST['production'] * $_POST['tarifedf'];                                               // Prod * tarif edf
            $recetteannuelle = round($recetteannuelle, 2);                                                              // Arrondie le résultat avec 2 chiffres après la virgule
            $recettevingtnans = $recetteannuelle * 20;                                                                  // Fois 20 pour 20 ans

            $tabrecette = array('annuelle' => $recetteannuelle, 'vingtans' => $recettevingtnans);                       // Création tableau avec recette annuelle et sur 20 ans
            $jsonrecette = json_encode($tabrecette);                                                                    // Création du JSON avec le tableau
            echo $jsonrecette;                                                                                          // Envoi du JSON
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function prodannuelle()
    {
        if (isset($_POST['prodanneezero'])) {
            $prodAnneeZero = $_POST['prodanneezero'];
            $raisonProd = 1 - (0.5 / 100);                                                                              // Raison production
            $ligneProdAnnuelle = '';

            for ($i = 0; $i < 20; $i++) {
                $raisonProdPuissance = pow($raisonProd, $i);                                                            // Raison production puissance $i pour correspondre avec l'année
                $prodAnneChoisie = round(($prodAnneeZero * $raisonProdPuissance), 2);                                   // Prod à l'année zero * raison prod puissance arrondie à 2 chiffres après la virgule
                $ligneProdAnnuelle[$i] = $prodAnneChoisie;

            }
            $jsonProdAnnuelle = json_encode($ligneProdAnnuelle);
            echo $jsonProdAnnuelle;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function cumulprod()
    {
        if (isset($_POST['prodanneezero'])) {
            $prodAnneeZero = $_POST['prodanneezero'];
            $raisonProd = 1 - (0.5 / 100);                                                                              // Raison production
            $ligneProdPuissance = '';

            for ($i = 0; $i < 20; $i++) {
                $raisonProdPuissance = pow($raisonProd, $i + 1);                                                        // Raison production puissance $i pour correspondre avec l'année en cours
                $prodCumulee = round($prodAnneeZero * ((1 - $raisonProdPuissance) / (1 - $raisonProd)), 2);             // Calcul de la prod cumulée
                $ligneProdPuissance[$i] = $prodCumulee;

            }

            $jsonProdAnnuelle = json_encode($ligneProdPuissance);
            echo $jsonProdAnnuelle;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function tarif()
    {
        if (isset($_POST['tarifAnneeZero']) && isset($_POST['raccordement'])) {
            $tarifAnneeZero = $_POST['tarifAnneeZero'];
            $raccordement = $_POST['raccordement'];
            $raisonTarif = 1 + ($raccordement / 100);                                                                   // Raison tarif

            for ($i = 0; $i < 20; $i++) {
                $raisonTarifPuissance = pow($raisonTarif, $i);
                $tarifAnneeChoisie = $tarifAnneeZero * $raisonTarifPuissance;
                $ligneTarif[$i] = $tarifAnneeChoisie;
            }

            $jsonTarif = json_encode($ligneTarif);
            echo $jsonTarif;
        } else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }

    public function anneeflouz()
    {
        if (isset($_POST['tarifAnneeZero']) && isset($_POST['productionAnneeZero']) && isset($_POST['raccordement'])) {
            $tarifAnnee = $_POST['tarifAnneeZero'];
            $productionAnneeZero = $_POST['productionAnneeZero'];
            $raccordement = $_POST['raccordement'];
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
    }    public function cumulflouz()
    {
        if (isset($_POST['tarifAnneeZero']) && isset($_POST['productionAnneeZero']) && isset($_POST['raccordement'])) {
            $tarifAnnee = $_POST['tarifAnneeZero'];
            $productionAnneeZero = $_POST['productionAnneeZero'];
            $raccordement = $_POST['raccordement'];
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
}

