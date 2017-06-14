<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CadastrarModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setCadastro($dados) {
        $resultado = $this->db->insert("login",$dados);
    }
}
