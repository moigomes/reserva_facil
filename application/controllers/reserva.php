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

            $this->form_reserva();
        } else {



            $data = explode('/', $this->input->post('data'));
            $data = $data[2] . '-' . $data[1] . '-' . $data[0];
            $dados = array('descricao' => $this->input->post('descricao'),
                'idSala' => $this->input->post('idSala'),
                'data' => $data,
                'horainicial' => $this->input->post('horaInicial'),
                'idUsuario' => $this->session->userdata('idUsuario')
            );

            $this->reserva_model->salvar_reserva($dados);
            $this->session->set_flashdata('mensagem', 'Reserva cadastrada com sucesso!');

            redirect('reserva');
        }
    }

    function excluir_reserva($idReserva) {

        $this->reserva_model->excluir_reserva($idReserva);
        redirect('reserva');
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

        $horarios = '<option value="">Selecione</option>';
        for ($i = 8; $i <= 18; $i++) {

            if (array_search($i, $hora) === FALSE) {

                $horarios .='<option value="' . $i . '">' . $i . ':00 às ' . ($i + 1) . ':00</option>';
            } else {
                $horarios .='<option disabled value="' . $i . '">' . $i . ':00 às ' . ($i + 1) . ':00 (RESERVADO)</option>';
            }
        }

        echo $horarios;
    }

    //verifica se o usuario ja não reservou uma outra sala no mesmo horário
    function verifica_reserva() {
        $horaInicial = $this->input->post('horaInicial');
        $data = $this->input->post('data');
        $data = explode('/', $data);
        $data = $data[2] . '-' . $data[1] . '-' . $data[0];
        if ($this->reserva_model->verifica_reserva($this->session->userdata('idUsuario'), $data, $horaInicial)->num_rows() > 0) {
            //echo '<script>alert("Desculpa mas voce já reservou outra sala para esta mesma data e horário!");</script>';
            //$this->session->set_flashdata('mensagem', 'Erro ao atualizar Usuário!');
            echo 'Desculpa mas voce já reservou outra sala para esta mesma data e horário!';
        
            
        }
        return FALSE;
    }

}
