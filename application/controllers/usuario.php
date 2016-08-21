<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        verifica_login(); //Verifica se tem usuario logado
        $this->load->model('usuario_model');
    }

    public function index() {
        $this->load->view('rodape');
    }

    public function form_usuario() {
        verifica_usuario();


        $dados = array('titulo_pagina' => 'RESERVA FÁCIL - Cadastro de Usuario');


        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_cadastro_view');
        $this->load->view('includes/rodape');
    }

    public function form_editar_usuario($idUsuario) {
        verifica_usuario();

        $usuario = $this->usuario_model->listar_usuario_por_idUsuario($idUsuario)->result();

        $dados = array('titulo_pagina' => 'RESERVA FÁCIL - Cadastro de Usuario');

        $dados2 = array(
            'usuario' => $usuario[0],
        );
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_edita_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function form_alterar_senha($idUsuario) {


        $usuario = $this->usuario_model->listar_usuario_por_idUsuario($idUsuario)->result();

        $dados = array('titulo_pagina' => 'RESERVA FÁCIL - Cadastro de Usuario');

        $dados2 = array(
            'usuario' => $usuario[0],
        );
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_altera_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function salvar_usuario() {
        verifica_usuario();
        $idUsuario = $this->input->post('idUsuario');
        $this->form_validation->set_rules('idUsuario', 'idUsuario');
        $this->form_validation->set_rules('nivelAcesso', 'NÍVEL DE ACESSO', 'required');
        $this->form_validation->set_rules('nomeUsuario', 'NOME', 'required');
        $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'SENHA', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($idUsuario == "")
                $this->form_usuario();
            else
                $this->form_editar_usuario($idUsuario);
        }else {
            $dados = elements(array('nomeUsuario', 'senha', 'nivelAcesso', 'email'), $this->input->post());
            if ($idUsuario == "") {
                if ($this->usuario_model->salvar_usuario($dados) == 0)
                    $this->session->set_flashdata('mensagem', 'Usuário inserido com Sucesso!');
                else
                    $this->session->set_flashdata('mensagem', 'Erro ao inserir usuário!');
            } else {
                if ($this->usuario_model->atualizar_usuario($dados, $idUsuario) == 0)
                    $this->session->set_flashdata('mensagem', 'Usuário atualizado com Sucesso!');
                else
                    $this->session->set_flashdata('mensagem', 'Erro ao atualizar Usuário!');
            }
            redirect(base_url('usuario/listar_usuarios'));
        }
    }

    public function alterar_senha() {

        $idUsuario = $this->input->post('idUsuario');
        $this->form_validation->set_rules('senha', 'SENHA', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->form_alterar_senha($idUsuario);
        } else {
            $dados = elements(array('senha'), $this->input->post());

            if ($this->usuario_model->atualizar_usuario($dados, $idUsuario) == 0)
                $this->session->set_flashdata('mensagem', 'Usuário atualizado com Sucesso! Faça Login novamente!');
            else
                $this->session->set_flashdata('mensagem', 'Erro ao atualizar Usuário!');
            redirect(base_url('login/sair'));
        }
    }

    public function listar_usuarios() {
        verifica_usuario();
        $usuarios = $this->usuario_model->listar_usuarios()->result();

        $dados = array('titulo_pagina' => 'RESERVA FÁCIL - Lista de Usuarios');
        $dados2 = array(
            'usuarios' => $usuarios
        );

        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_lista_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function excluir_usuario($idUsuario) {
        if ($this->usuario_model->excluir_usuario($idUsuario) == 0)
            $this->session->set_flashdata('mensagem', 'Usuário excluido com Sucesso!');
        else
            $this->session->set_flashdata('mensagem', 'Erro ao excluir!');
        redirect('usuario/listar_usuarios');
    }

}
