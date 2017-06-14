<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function verificaAcesso($dados) {
        $resultado = $this->db->get_where("login",$dados);
        return $resultado->result_array();
    }
}