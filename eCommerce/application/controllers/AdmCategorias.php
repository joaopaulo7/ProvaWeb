<?php defined('BASEPATH') or exit('No direct script access allowed');

    class AdmCategorias extends CI_Controller {

        private $categorias;

        public function __construct() {
            parent::__construct();
            $this->load->model('categorias_model', 'modelcategorias');
            $this->categorias = $this->modelcategorias->listar_categorias();
            $this->load->helper('text');
            if( !$this->session->userdata('cliente') || $this->session->userdata('cliente')->id != 0){
                $this->session->sess_destroy();
                redirect("cadastro/form_login");
            }
        }

        public function index() {
            $data['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('adm-header');
            $this->load->view('adm-categorias', $data);
            $this->load->view('footer');
            $this->load->view('html-footer');
        }

        public function verCategoria($id) {
            if( $id != 0)
                $data['categoria'] = $this->modelcategorias->getCategoria( $id);
            $this->load->view('html-header');
            $this->load->view('adm-header');
            if( $id != 0)
                $this->load->view('altCategoria', $data);
            else
                $this->load->view('novaCategoria');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }

        public function altCategoria(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('titulo', 'Título', 'required');
            $this->form_validation->set_rules('descricao', 'Descricao', 'required');
            if( !$this->form_validation->run()){
                $this->verCategoria( $this->input->post('id'));
            }
            else
            {
                if( $this->input->post('id') == 0)
                {
                    $this->modelcategorias->addNovo( $this->input->post());
                    redirect("admCategorias");
                }
                else
                {
                    $this->modelcategorias->alterar( $this->input->post());
                    redirect("admCategorias");
                }
            }
        }
        public function delCategoria( $id){
            if( $this->modelcategorias->podeDel( $id))
            {
                $this->modelcategorias->del( $id);
                redirect("admCategorias");
            }
            else
                echo '<script language = "javascript">
                            alert("Esta categoria ainda tem produtos");
                      </script>';
                $this->index();
        }

    }

