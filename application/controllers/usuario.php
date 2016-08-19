<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller{
    function __construct()    {
        parent::__construct();
        verifica_login(); //Verifica se tem usuario logado
        $this->load->model('usuario_model');
    }

    public function index(){
        $this->load->view('rodape');
    }

    public function form_usuario(){
        

        
        $dados = array('titulo_pagina' => 'ANSERVE - Cadastro de Usuario');

       
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_cadastro_view');
        $this->load->view('includes/rodape');
    }

    public function form_editar_usuario($idUsuario){
        $this->load->model('pessoa_model');
       
        $usuario = $this->usuario_model->listar_usuario_por_idUsuario($idUsuario)->result();
        
        $dados = array('titulo_pagina' => 'SIS ENCANTO - Cadastro de Usuario');

        $dados2 = array(
            'usuario' => $usuario[0],
        );
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_edita_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function salvar_usuario(){
        $idUsuario = $this->input->post('idUsuario');
        $this->form_validation->set_rules('idUsuario', 'idUsuario');
        $this->form_validation->set_rules('nivelAcesso', 'NÍVEL DE ACESSO', 'required');
        $this->form_validation->set_rules('nome', 'NOME', 'required');
        $this->form_validation->set_rules('email', 'E-MAIL', 'required');
        $this->form_validation->set_rules('login', 'LOGIN', 'required|is_unique[usuarios.login]');
        $this->form_validation->set_rules('senha', 'SENHA', 'required');

        if ($this->form_validation->run() == FALSE){
            if ($idUsuario == "")
                $this->form_usuario();
            else
                $this->form_editar_usuario($idUsuario);
        }else{
            $dados = elements(array('nome', 'login', 'senha', 'nivelAcesso', 'email'), $this->input->post());
            if ($idUsuario == ""){
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

    public function listar_usuarios(){
        $usuarios = $this->usuario_model->listar_usuarios()->result();

        $dados = array( 'titulo_pagina' => 'SIS ENCANTO - Lista de Usuarios' );
        $dados2 = array(
            'usuarios' => $usuarios
        );

        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('usuario/usuario_lista_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function excluir_usuario($idUsuario){
        if ($this->usuario_model->excluir_usuario($idUsuario) == 0)
            $this->session->set_flashdata('mensagem', 'Usuário excluido com Sucesso!');
        else
            $this->session->set_flashdata('mensagem', 'Erro ao excluir!');
        redirect('usuario/listar_usuarios');
    }
}
