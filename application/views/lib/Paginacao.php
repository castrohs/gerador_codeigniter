<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Exemplo de uso
 * Adicionar na controller
   $this->load->library('paginacao');
        $limit = 50;
            $data['paginacao'] = $this->paginacao->gera($this->db->get('tb_hotel')->num_rows(), $limit, base_url("Hotel/listar/"));
            if (empty($apartir_de_que_registro)) {
            $apartir_de_que_registro = 0;
        }
        $data['busca_todas'] = $this->HotelModel->busca_todos($limit, $apartir_de_que_registro);
        
 */
class Paginacao {
        var $ci;
        
        
            public function __construct() {
//        parent::__construct();

        $this->ci = & get_instance();

//        $this->ci->load->library('curl');
    }
    /**
     * 
     * @param type $total_de_items
     * @param type $item_por_pagina
     * @return type
     */
    public function gera($total_de_items=null,$item_por_pagina=50,$url) {
            
            $this->ci->load->library('pagination');
            

            $config['last_link'] = 'Ultimo';
            $config['first_link'] = 'Primeira';
            $config['base_url'] = $url;
            $config['total_rows'] = $total_de_items;
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '  <li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = ' <li class="page-item><a class="page-link" href="#" tabindex="-1">';
            $config['prev_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['first_tag_open'] = ' <li class="page-item><a class="page-link" href="#" tabindex="-2">';
            $config['first_tag_close'] = '</a></li>';
            $config['last_tag_open'] = ' <li class="page-item><a class="page-link" href="#" tabindex="-2">';
            $config['last_tag_close'] = '</a></li>';
            $config['attributes'] = array('class' => 'page-item');
            $config['per_page'] = $item_por_pagina;
            $config['num_links'] = ($total_de_items/2)/$item_por_pagina;
//            $data['busca_todas'] = $this->BilheteModel->busca_todos();
        return $this->ci->pagination->initialize($config);
    }   
    
}