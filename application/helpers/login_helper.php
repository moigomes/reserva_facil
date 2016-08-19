<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function verifica_login(){
    $CI =& get_instance (); 
     $logado = $CI->session->userdata('logado');

        if (!isset($logado) || $logado != true) {
          $mensagem_sessao = "<script>alert('Faça o login para acessar o sistema!');</script>" ; 
          $CI -> session -> set_flashdata ( 'mensagem_sessao' , $mensagem_sessao );   
          redirect('login');
        }
      
}