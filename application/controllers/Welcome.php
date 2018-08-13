<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
//    var $banco_ativo = "euro_faturas";
    var $banco_ativo = "seg_viva_dev";
	public function index()
	{
	   $data['quantas_letras_remover']=3;
            $data['pasta_do_sistema']="//var/www/html/comissionamento";
            $data['tabelas']=$this->DBA->busca_lista_de_tabelas();


            $data['tables_in']='Tables_in_'.$this->banco_ativo;
            
		$this->load->view('layout/web_head');
		$this->load->view('welcome_message',$data);
	
                
        }
        
         function banco_ativo() {
        

        return $this->banco_ativo;
        
    }
}
