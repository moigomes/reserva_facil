<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        $this->load->view('login_view');
    }

    //Função que limpa a sessão e chama a tela de login
    public function sair() {
        $this->session->sess_destroy();
        redirect('login');
    }

    //Função responsável por pegar os dados vindo do formulario
    // de login e verificar no banco
    public function logar() {
        $this->load->model('login_model');
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');



        $this->form_validation->set_rules('email', 'E-MAIL', 'required');
        $this->form_validation->set_rules('senha', 'SENHA', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->index();
        } else {

            if ($this->login_model->verifica_usuario($email, $senha)->num_rows() > 0) {
                $usuario = $this->login_model->verifica_usuario($email, $senha)->result();

                $nomeUsuario = $usuario[0]->nomeUsuario;
                $idUsuario = $usuario[0]->idUsuario;
                $nivelAcesso = $usuario[0]->nivelAcesso;


                $data = array('email' => $email, 'nomeUsuario' => $nomeUsuario, 'idUsuario' => $idUsuario, 'nivelAcesso' => $nivelAcesso, 'logado' => true);
                $this->session->set_userdata($data);

                $this->enviar_email();

                redirect('inicio');
            } else {
                $this->session->set_flashdata('mensagem', 'E-mail e/ou a senha incorreto(s)!');
                redirect('login');
            }
        }
    }

    function recupera_senha() {
        $this->load->model('login_model');
        $email = $this->input->post('email');

        if ($this->login_model->busca_por_email($email)->result()) {
            $dados = $this->login_model->busca_por_email($email)->result();


            $senha = $dados[0]->senha;

            $nomeUsuario = $dados[0]->nomeUsuario;

            $this->load->library('email');

            $this->email->from('naoresponder@reservafacil.com', 'Reserva Fácil');
            $this->email->to($email);
            
            $this->email->subject('Recuperação de senha do usuário Reserva Fácil ');
            $this->email->message('Olá ' . $nomeUsuario . ', sua senha para acessar o Reserva Fácil é: ' . $senha . '.');

            $this->email->send();

            $this->session->set_flashdata('mensagem', 'Sua senha foi enviada para o E-mail: ' . $email . '!');
        } else {
            $this->session->set_flashdata('mensagem', 'O usuário <B>' . $email . '</B> não está cadastrado!');
        }

        redirect('login');
    }

    function enviar_email() {
        $this->load->library('email');

        $this->email->from('naoresponder@reservafacil.com.br', 'Reserva Fácil');
        $this->email->to(array('moigomes@gmail.com'));
        //$this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Login no Sistema Reserva Fácil');
        $this->email->message('O usuaio ' . $this->session->userdata('nomePessoa') . ', fez login no sistema Reserva Fácil as ' .
                date("h:m") . ' do dia ' . date("d/m/Y"));

        $this->email->send();
    }

}
