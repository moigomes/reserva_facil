<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reserva extends CI_Controller {

    function __construct() {
        parent::__construct();
        verifica_login(); //Verifica se tem usuario logado
        $this->load->model('sala_model');
        $this->load->model('reserva_model');
    }

    public function index() {


        $reservas = $this->reserva_model->listar_reservas()->result();

        $dados = array('titulo_pagina' => 'Reserva Fácil - Lista de Reservas');
        $dados2 = array('reservas' => $reservas);

        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('reserva/reserva_lista_view', $dados2);
        $this->load->view('includes/rodape');
    }

    public function form_reserva() {

        $dados = array('titulo_pagina' => 'Reserva Fácil - Cadastro de Reservas');
        $dados2 = array('salas' => $this->sala_model->listar_salas()->result());
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('reserva/reserva_cadastro_view', $dados2);
        $this->load->view('includes/rodape');
    }

    //Reune os dados vindo do formulario, valida e manda para o model salvar no banco
    public function salvar_reserva() {

        //Valida os campos
        $this->form_validation->set_rules('idSala', 'idSala');
        $this->form_validation->set_rules('data', 'DATA', 'required');
        $this->form_validation->set_rules('horaInicial', 'HORA', 'required');
        $this->form_validation->set_rules('descricao', 'DESCRIÇÃO', 'required|ucwords');


        if ($this->form_validation->run() == FALSE) {
            if ($idReserva == '')
                $this->form_reserva();
            else
                $this->form_editar_reserva(null);
        }
        else {
            $dados = elements(array('reserva'), $this->input->post());

            if ($idReserva == '')
                $this->reserva_model->salvar_reserva($dados);
            else
                $this->reserva_model->atualizar_reserva($dados, $idReserva);

            redirect('reserva');
        }
    }

    function excluir_reserva($idReserva) {

        $this->reserva_model->excluir_reserva($idReserva);
        redirect('reserva');
    }

    public function form_editar_reserva($idReserva) {

        $reserva = $this->reserva_model->listar_reserva_por_idReserva($idReserva)->result();
        $dados = array(
            'titulo_pagina' => 'Reserva Fácil - Editar Reserva'
        );

        $dados2 = array(
            'reserva' => $reserva[0],
        );
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('reserva/reserva_edita_view', $dados2);
        $this->load->view('includes/rodape');
    }

    function verifica_horarios() {
        $idSala = $this->input->post('idSala');
        $data = $this->input->post('data');
        $data = explode('/', $data);
        $data = $data[2] . '-' . $data[1] . '-' . $data[0];

        if ($this->reserva_model->verifica_horarios($idSala, $data)->num_rows() > 0) {
            $resultados = $this->reserva_model->verifica_horarios($idSala, $data)->result();
            //Cria um array com os horarios ja reservados para a sala na data selecionada
            $i = 0;
            foreach ($resultados as $resultado) {
                $hora[$i] = $resultado->horaInicial;
                $i++;
            }
        } else {
            $hora[0] = 0;
        }

        $horarios = '<option value="0">Selecione</option>';
        for ($i = 8; $i <= 18; $i++) {

            if (array_search($i, $hora) === FALSE) {

                $horarios .='<option value="' . $i . '">' . $i . '</option>';
            }
        }

        echo $horarios;
    }

}
