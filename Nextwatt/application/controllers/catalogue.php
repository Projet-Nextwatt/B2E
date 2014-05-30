<?php
class Catalogue extends CI_Controller {

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
        
        public function test()
        {
            /*$voiture = new Voiture();
            $voiture->name = "renault clio";
            $voiture->color = "rouge";
            
            $voiture->save();*/
            
            
            
            
            
            /*$voiture = new Voiture();
            $voiture->where('id', '2')->get();
            $voiture->color = "blue";
            $voiture->save();*/
            
            
            
            
            
            $voitures = new Voiture();
            $voitures->get();
            /*foreach($voitures as $voiture){
                echo "voiture ID: ".$voiture->id."<br/>name: ".$voiture->name."<br/>color: ".$voiture->color."<br/><br/>";
            }*/
            
            $data = array();
            
            $data['voitures'] = $voitures;
            
            $this->load->view('catalogue_test', $data);
        }
}

