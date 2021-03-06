<?php defined('BASEPATH') or exit('No direct script acess allowed');
	class Menu extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper(array('url','html'));
			if($this->session->userdata('login') == null){
				redirect("login");
			}
		}
		
		public function index(){
			$data['bandas'] = $this->db->get('bandas')->result();
			$this->load->helper('form');
			$this->load->view('administracao/nova_postagem',$data);
		}
		public function adicionar(){
			$data = $this->input->post(array ('dia', 'mes', 'ano'));
			$dados = $this->input->post(array( 'nome', 'quantidade_integrantes'));
			$dados['data_fundacao'] = $data['ano'].'-'.$data['mes'].'-'.$data['dia'];
			if($this->db->insert('bandas', $dados)){
				redirect('Entrar/menu');
			}else{
				echo "Nao foi possivel gravar a postagen";
			}
		}
		public function alterar($id){
			$this->db->where('id', $id);
			$data['banda'] = $this->db->get('bandas')->result();
			$this->load->helper('form');
			$this->load->view('administracao/alterar_postagem', $data);
		}
		public function salvar_alteracao(){
			$data = $this->input->post(array('nome','quantidade_integrantes','data_fundacao'));
			$this->db->where('id', $this->input->post('id'));
			
			if($this->db->update('bandas', $data)){
				redirect('Entrar/menu');
			}else{
				echo "Nao foi possivel gravar a alterecao";
			}
		}
		public function excluir($id){
			$this->db->where('id', $id);
			if($this->db->delete('bandas')){
				redirect('Entrar/menu');
			}else{
				echo "nao foi possivel excluir";
			}
		}
		public function pdf(){
			$dados['band'] = $this->db->get('bandas')->result();
			$this->load->view('pdf',$dados);
		}
	}
