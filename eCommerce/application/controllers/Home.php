<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('categorias_model', 'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
		
    }

    public function index() {
        $this->load->helper('text');
        $this->load->model('produtos_model', 'modelprodutos');
		$data_header['categorias'] = $this->categorias;
		$data_body['destaques'] = $this->modelprodutos->destaques_home();
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('home', $data_body);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }

	public function buscar() {
        $this->load->helper('text');
        $this->load->model('produtos_model', 'modelprodutos');
		$data_header['categorias'] = $this->categorias;
		$busca = $this->input->post('txt_busca');
		$data_body['termo'] = $busca;
		$data_body['destaques'] = $this->modelprodutos->busca($busca);
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('home', $data_body);
        $this->load->view('footer');
        $this->load->view('html-footer');
 		
	}

}
