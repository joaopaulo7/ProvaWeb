<?php defined('BASEPATH') OR exit('o direct script access allowed');

    class Categorias_model extends CI_Model {

        public $id;
        public $titulo;
        public $descricao;

        public function __construct() {
            parent::__construct();
        }

        public function listar_categorias() {
            $this->db->order_by('titulo', 'ASC');
            return $this->db->get('categorias')->result();
        }

        public function detalhes_categoria($id) {
            $this->db->where('id', $id);
            return $this->db->get('categorias')->result();
        }

        public function listar_produtos_categoria($id) {
            $dados['detalhes'] = $this->detalhes_categoria($id);
            $this->db->select('*');
            $this->db->from('produtos');
            $this->db->join('produtos_categoria', 'produtos_categoria.produto = produtos.id AND produtos_categoria.categoria = '.$id);
            $dados['produtos'] = $this->db->get()->result();
            return $dados;
        }

        public function getCategoria( $id){
            $res = $this->db->get_where('categorias',' id = '.$id)->result()[0];
            if( $res == null)
                return null;
            else
                return $res;
        }

        public function addNovo( $dados){
            $this->db->insert('categorias',  array( 'titulo' =>$dados['titulo'], 'descricao' =>$dados['descricao']));
        }

        public function alterar( $dados){
            $this->db->where(' id', $dados["id"]);
            $this->db->update('categorias', array( 'titulo' =>$dados['titulo'], 'descricao' =>$dados['descricao']));
        }
        
        public function podeDel( $id){
			if( $this->db->get_where("produtos_categoria", "categoria =". $id)->result() != null)
				return false;
			else
				return true;
		}
		
		public function del( $id){
			$this->db->where(" id", $id);
			$this->db->delete("categorias");
		}
    }
