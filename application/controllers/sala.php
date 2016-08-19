<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sala extends CI_Controller {

    function __construct() {
        parent::__construct();
        verifica_login(); //Verifica se tem usuario logado
        $this->load->model('sala_model');
    }

    public function index() {


        $salas = $this->sala_model->listar_salas()->result();

        $dados = array('titulo_pagina' => 'Reserva Fácil - Lista de Produtos');
        $dados2 = array('salas' => $salas);

        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('sala/sala_lista_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function form_sala() {

        $dados = array('titulo_pagina' => 'Reserva Fácil - Cadastro de Salas');
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('sala/sala_cadastro_view');
        $this->load->view('includes/rodape');
    }

    //Reune os dados vindo do formulario, valida e manda para o model salvar no banco
    public function salvar_sala() {
        $idProduto = $this->input->post('idSala');
        //Valida os campos
        $this->form_validation->set_rules('idSala', 'idSala');
        $this->form_validation->set_rules('nomeSala', 'NOME SALA', 'required|ucwords');


        if ($this->form_validation->run() == FALSE) {
            if ($idSala == '')
                $this->form_sala();
            else
                $this->form_editar_sala(null);
        }
        else {
            $dados = elements(array('nomeSala'), $this->input->post());

            if ($idSala == '')
                $this->sala_model->salvar_sala($dados);
            else
                $this->sala_model->atualizar_sala($dados, $idSala);

            redirect('sala');
        }
    }

    function excluir_sala($idSala) {

        $this->sala_model->excluir_sala($idSala);
        redirect('sala');
    }

    public function form_editar_sala($idSala) {

        $sala = $this->sala_model->listar_sala_por_idSala($idSala)->result();
        $dados = array(
            'titulo_pagina' => 'Reserva Fácil - Editar Sala'
        );

        $dados2 = array(
        'sala' => $sala[0],
            );
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('sala/sala_edita_view', $dados2);
        $this->load->view('includes/rodape');
    }

}
