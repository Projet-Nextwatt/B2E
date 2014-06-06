<?php

class Catalogue extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('assets_helper');

        $data = array();

        $data['acertl'] = css_url('ace-rtl.min');
        $data['OpenSans'] = css_url('OpenSans');
        $data['aceskins'] = css_url('ace-skins.min');
        $data['acemin'] = css_url('ace.min');
        $data['acebootstrap'] = css_url('acebootstrap');
        $data['nextwattico'] = img_url('Mininextwatt.png');
        //$this->load->view('test', $data);
        $this->load->view('theme/sidebar', $data);

        $this->load->view('catalogue_index');
    }

<<<<<<< HEAD
    public function test() {
        $voiture = new Voiture();
        $voiture->name = "renault clio";
        $voiture->color = "rouge";

        $voiture->get();

        $produit = new Catalogue();
        $produit->get();


        $voiture = new Voiture();
        $voiture->where('id', '2')->get();
        $voiture->color = "blue";
        $voiture->save();
=======
    public function test()
    {
        $voiture = new Voiture();
        $voiture->name = "renault clio";
        $voiture->color = "rouge";

        $voiture->save();


        /* $voiture = new Voiture();
          $voiture->where('id', '2')->get();
          $voiture->color = "blue";
          $voiture->save(); */
>>>>>>> 95984bcd75541610beff21225b4a696e4164cd3d


        $voitures = new Voiture();
        $voitures->get();
        foreach($voitures as $voiture){
          echo "voiture ID: ".$voiture->id."<br/>name: ".$voiture->name."<br/>color: ".$voiture->color."<br/><br/>";
          }

        $data = array();

        $data['voitures'] = $voitures;

        $this->load->view('catalogue_test', $data);
    }

    public function consult_catalogue()
    {
<<<<<<< HEAD
        $this->load->model('Mappage/catalogue');
=======
        $this->load->helper('url');
        $this->load->helper('assets_helper');
>>>>>>> 95984bcd75541610beff21225b4a696e4164cd3d

        $data = array();
        $rqt_sql = $this->Catalogue->select_article_catalogue();


        $data['catalogue'] = $rqt_sql;
        // Liens vers les fichiers CSS
        $data['bootstrapmincss'] = css_url('bootstrap.min');
        $data['acefonts'] = css_url('ace-fonts');
        $data['acemincss'] = css_url('ace.min');
        $data['acepart2'] = css_url('ace-part2.min');
        $data['acertl'] = css_url('ace-rtl.min');
        $data['aceie'] = css_url('ace-ie.min');
        $data['aceskins'] = css_url('ace-skins.min');

        // Liens vers les fichiers images
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

        // Charge la page
        $this->load->view('B2E/Catalogue/Consulter_Catalogue', $data);

    }

}
