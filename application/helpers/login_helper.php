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

function verifica_usuario(){
    $CI =& get_instance (); 
     $nivelAcesso = $CI->session->userdata('nivelAcesso');

        if ($nivelAcesso > 0) {
          $mensagem_sessao = "Você não tem permissão para acessar esta opção, contate o Administrador do Sistema!" ; 
          $CI -> session -> set_flashdata ( 'mensagem' , $mensagem_sessao );   
          redirect('inicio');
        }
}