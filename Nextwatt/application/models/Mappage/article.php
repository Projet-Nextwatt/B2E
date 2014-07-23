<?php

/*
 * Classe Modèle pour la table Article, définir ici toutes les fonctionnalitées utilisant la table Article
 */

class Article extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */

    var $has_one = array("article", "dossier", "soustype");

    function __construct() {
        parent ::__construct();
    }

    function select_article() {
        //Fonction de selection
    }

    function list_article_dossier($iddossier) {
        $articles = new Article();
        $articles->where('dossier_id', $iddossier);
        $articles->get();
        return $articles->all_to_array();
    }

    function mise_en_forme_article(array $articles) {
        //Initialisation des varaibles générales
        $liste =array();
        $produits =array();
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
            $TVAMo = ((int) $article['TVA_MO']) / 10000;   //TVA mo
            $TVAMat = ((int) $article['TVA_Mat'] )/ 10000;   //TVA matos

            $quantite = $article['Quantite'];                           //Quantit�

            $ceeTTC = $article['CEE_TTC'] * $quantite;   //Prime CEE TTC
            $ceeHT = $ceeTTC / (1 + $TVAMat);      //Prime CEE HT
            $remiseTTC = $article['Remise'];    //Remise comercial TTC
            $remiseHT = $remiseTTC / (1 + $TVAMat);     //Remise comercial HT

            $moHT = $article['Prix_MO'] * $quantite;   //mo HT
            $moTTC = $moHT * (1 + $TVAMo);      //mo TTC

            $matPlHT = $article['Prix_Mat_Plancher'] * $quantite;  //Materiel plancher HT
            $matPlTTC = $matPlHT * (1 + $TVAMat);      //Materiel plancher TTC

            $anTTC = $article['Prix_Annonce_TTC'] * $quantite;  //Annonce TTC

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

            $matAnTTC = $anTTC - $moTTC + $ceeTTC;        //Materiel � afficher TTC
            if (abs($matAnTTC) < 0.00001)
                $matAnTTC = 0;        //Pour �viter l'erreur de precsion sur la soustracion des floats
            $matAnHT = $matAnTTC / (1 + $TVAMat);        //Materiel � afficher HT

            $totalPlancherTTC = $moTTC + $matPlTTC - $ceeTTC;       //Prix plancher TTC
            $totalHT = $moHT + $matAnHT;        //total HT
            $totalTTC = $moTTC + $matAnTTC;        //Total TTC
            $totalTVA = $totalTTC - $totalHT;        //Montant TVA
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

            if ($article['Libelle_Garantie'] != ''){  //Afficher la garantie si elle est renseignée
                $article['Libelle_Garantie'] = "Garantie materiel: " . $article['Libelle_Garantie'];
            }

            if ($article['Facturation'] != 'forfaitaire') {   //Completer l'intituler du produit par sa quantité si non forfaitaire
                $article['Libelle_Mat'] = $article['Libelle_Mat'] . "<br/>" . $quantite . " " . $article['Facturation'];
                $article['Llibelle_MO'] = $article['Libelle_MO'] . " - " . $quantite . " " . $article['Facturation'];
            }






            //Remplissage du tableau de tout les produits
            $id = $article['id'];
            unset($article['id']);
            $article_id = $article['article_id'];
            unset($article['article_id']);

            if ($article_id == 0) {    //Liste des produits	
                foreach ($article as $key => $data) {
                    $produits[$id][$key] = $data;
                }

                $produits[$id]['total_remiseDispo'] = $remiseDispo;
                $produits[$id]['total_CEE'] = -$ceeTTC;
                $produits[$id]['total_remise'] = -$remiseTTC;
                $produits[$id]['total_HT'] = $totalHTApresRemise;
                $produits[$id]['total_TVA'] = $totalTVAApresRemise;
                $produits[$id]['total_TTC'] = $totalTTCApresRemise;

            } else {                //Liste des complements
                foreach ($article as $key => $data) {
                    $produits[$article_id]['complements'][$id][$key] = $data;
                }

                //Ajout au totaux
                $produits[$article_id]['total_remiseDispo']+=$remiseDispo;
                $produits[$article_id]['total_CEE']-=$ceeTTC;
                $produits[$article_id]['total_remise']-=$remiseTTC;
                $produits[$article_id]['total_HT']+=$totalHTApresRemise;
                $produits[$article_id]['total_TVA']+=$totalTVAApresRemise;
                $produits[$article_id]['total_TTC']+=$totalTTCApresRemise;
            }

            $TOTAL_CEE-=$ceeTTC;
            $TOTAL_Remise-=$remiseTTC;
            $TOTAL_HT+=$totalHTApresRemise;
            $TOTAL_TVA+=$totalTVAApresRemise;
            $TOTAL_TTC+=$totalTTCApresRemise;
            
        }
        $liste= array('produits'=>$produits,
                        'TOTAL_CEE'=>$TOTAL_CEE,
                        'TOTAL_Remise'=>$TOTAL_Remise,
                        'TOTAL_HT'=>$TOTAL_HT,
                        'TOTAL_TVA'=>$TOTAL_TVA,
                        'TOTAL_TTC'=>$TOTAL_TTC);
        return $liste;
    }

    function ajouter_article($produit) {
        $newproduit = array(
            'soustype_id' => $produit[0]['soustype_id'],
            'dossier_id' => $produit[0]['dossier_id'],
            'Reference' => $produit[0]['Reference'],
            'Nom' => $produit[0]['Nom'],
            'Marque' => $produit[0]['Marque'],
            'Puissance' => $produit[0]['Puissance'],
            'Libelle_Mat' => $produit[0]['Libelle_Mat'],
            'Libelle_MO' => $produit[0]['Libelle_MO'],
            'Libelle_Garantie' => $produit[0]['Libelle_Garantie'],
            'Prix_MO' => $produit[0]['Prix_MO'],
            'Prix_Mat_Plancher' => $produit[0]['Prix_Mat_Plancher'],
            'CEE_TTC' => $produit[0]['CEE_TTC'],
            'Prix_Annonce_TTC' => $produit[0]['Prix_Annonce_TTC'],
            'TVA_MO' => $produit[0]['TVA_MO'],
            'TVA_Mat' => $produit[0]['TVA_Mat'],
            'Facturation' => $produit[0]['Facturation'],
            'Type_Produit' => $produit[0]['Type_Produit'],
            'Spec' => $produit[0]['Spec'],
            'actif' => $produit[0]['Actif'],
            'Quantite'=>1,
        );
        $this->db->insert('articles', $newproduit);
    }

    function modifier_article() {
        //Fonction de modification
    }

    function supprimer_article() {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Article');
        //Et aussi les options
    }

    function select_ArticleById() {
        return $this->db->get('articles');
    }

}
