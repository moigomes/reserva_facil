<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    function __construct(){
        parent::__construct();
        verifica_login(); //Verifica se tem usuario logado
       
    }
    public function index() {
       
        $dados = array('titulo_pagina' => 'Reserva Fácil - Tela inicial');
       
        $this->load->view('includes/cabecalho', $dados);
        $this->load->view('includes/inicio');
        $this->load->view('includes/rodape');
    }
    

}