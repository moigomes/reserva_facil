<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function verifica_usuario($email = NULL, $senha = NULL) {


        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.email', $email);
        $this->db->where('usuarios.senha', $senha);

        return $this->db->get();
    }

    function busca_por_email($email) {

        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.email', $email);
        return $this->db->get();
    }

}
