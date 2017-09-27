<?php defined('BASEPATH') or exit('No direct script access allowed');

    class Cadastro extends CI_Controller {

        private $categorias;

        public function __construct() {
            parent::__construct();
            $this->load->model('categorias_model', 'modelcategorias');
            $this->categorias = $this->modelcategorias->listar_categorias();
        }

        public function index() {
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header', $data_header);
            $this->load->view('novo_cadastro');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }

        public function esqueci_minha_senha() {
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header', $data_header);
            $this->load->view('form_recupera_login');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }

        public function recuperar_login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
        if($this->form_validation->run() == FALSE) {
            $this->esqueci_minha_senha();
        } else {
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('cpf', $this->input->post('cpf'));
            $this->db->where('status', 1);
            $cliente = $this->db->get('clientes')->result();

            if(count($cliente)==1) {
                $dados = $cliente[0];
                $mensagem = $this->load->view('emails/recuperar_senha.php', $dados, TRUE);
                $this->load->library('email');
                $this->email->from("2info.cefetvarginha@gmail.com", "Lojão do Terceirão");
                $this->email->to($dados->email);
                $this->email->subject('Lojão do Terceirão - confirmação de cadastro');
                $this->email->message($mensagem);

                if($this->email->send()) {
                    $data_header['categorias'] = $this->categorias;
                    $this->load->view('html-header');
                    $this->load->view('header', $data_header);
                    $this->load->view('senha_enviada');
                    $this->load->view('footer');
                    $this->load->view('html-footer');
                } else {
                    print_r($this->email->print_debugger());
                }
            } else {
                redirect(base_url("esqueci_minha_senha"));
            }
        }
    }


        public function enviar_email_confirmacao($dados) {

            // for($i = 0; $i < 100; $i++) {

            $mensagem = $this->load->view('emails/confirmar_cadastro.php', $dados, TRUE);
            $this->load->library('email');
            $this->email->from("2info.cefetvarginha@gmail.com", "Confirmação de cadastro");
            $this->email->to($dados['email']);
            $this->email->subject('Lojão do Terceirão - confirmação de cadastro');
            $this->email->message($mensagem);
            if($this->email->send()) {
                $data_header['categorias'] = $this->categorias;
                $this->load->view('html-header');
                $this->load->view('header', $data_header);
                $this->load->view('cadastro_enviado');
                $this->load->view('footer');
                $this->load->view('html-footer');
            } else {
                print_r($this->email->print_debugger());
            }

            // }

        }

        public function adicionar() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[5]');
            $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[clientes.email]');
            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                $dados['nome'] = $this->input->post('nome');
                $dados['sobrenome'] = $this->input->post('sobrenome');
                $dados['rg'] = $this->input->post('rg');
                $dados['cpf'] = $this->input->post('cpf');
                $dados['data_nascimento'] = dataBR_to_dataMySQL($this->input->post('data_nascimento'));
                $dados['sexo'] = $this->input->post('sexo');
                $dados['cep'] = $this->input->post('cep');
                $dados['rua'] = $this->input->post('rua');
                $dados['bairro'] = $this->input->post('bairro');
                $dados['cidade'] = $this->input->post('cidade');
                $dados['estado'] = $this->input->post('estado');
                $dados['numero'] = $this->input->post('numero');
                $dados['telefone'] = $this->input->post('telefone');
                $dados['celular'] = $this->input->post('celular');
                $dados['email'] = $this->input->post('email');
                $dados['senha'] = $this->input->post('senha');
                if($this->db->insert('clientes', $dados)) {
                    $this->enviar_email_confirmacao($dados);
                } else {
                    echo "Houve um erro ao processar seu cadastro";
                }
            }
        }

        public function form_login() {
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header', $data_header);
            $this->load->view('login');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }

        public function login() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            if($this->form_validation->run() == FALSE) {
                $this->form_login();
            } else {
                $this->db->where('email', $this->input->post('email'));
                $this->db->where('senha', $this->input->post('senha'));
                $this->db->where('status', 1);
                $cliente = $this->db->get('clientes')->result();
                if(count($cliente)==1) {
                    $dadosSessao['cliente'] = $cliente[0];
                    $dadosSessao['logado'] = TRUE;
                    $this->session->set_userdata($dadosSessao);
                    redirect(base_url("produtos"));
                } else {
                    $this->db->where('email', $this->input->post('email'));
                    $this->db->where('senha', $this->input->post('senha'));
                    $this->db->where('status', 1);
                    $adm = $this->db->get('administracao')->result();
                    if(count($adm)==1) {
                        $dadosSessao['cliente'] = $adm[0];
                        $dadosSessao['logado'] = TRUE;
                        $this->session->set_userdata($dadosSessao);
                        redirect(base_url("menuAdm"));
                    }else{
                        $dadosSessao['cliente'] = NULL;
                        $dadosSessao['logado'] = FALSE;
                        $this->session->set_userdata($dadosSessao);
                        redirect(base_url("login"));
                    }
                }
            }
        }

        public function logout() {
            $dadosSessao['cliente'] = null;
            $dadosSessao['logado'] = FALSE;
            $this->session->set_userdata($dadosSessao);
            redirect(base_url("login"));
        }

         public function confirmar($hashEmail) {
               $dados['status'] = 1;
               $this->db->where('md5(email)', $hashEmail);
               if($this->db->update('clientes', $dados)) {
                    $data_header['categorias'] = $this->categorias;
                    $this->load->view('html-header');
                    $this->load->view('header', $data_header);
                    $this->load->view('cadastro_liberado');
                    $this->load->view('footer');
                    $this->load->view('html-footer');
               } else {
                    echo "Houve um erro ao confirmar seu cadastro";
               }
        }

    }
