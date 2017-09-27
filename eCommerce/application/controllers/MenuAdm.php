<?php

    class MenuAdm extends CI_Controller {

        public $categorias;

        public function __construct() {
            parent::__construct();
            if( !$this->session->userdata('cliente') || $this->session->userdata('cliente')->id != 0){
                $this->session->sess_destroy();
                redirect("cadastro/form_login");
            }
        }

        public function index() {
            $this->load->helper('text');
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header', $data_header);
            $this->load->view('menuAdministracao');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }


        public function produto($id) {
            $data_header['categorias'] = $this->categorias;
            $data_body['produtos'] = $this->modelprodutos->detalhes_produto($id);
            $this->load->view('html-header');
            $this->load->view('header', $data_header);
            $this->load->view('produto', $data_body);
            $this->load->view('footer');
            $this->load->view('html-footer');
        }


    }
