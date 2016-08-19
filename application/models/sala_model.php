<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sala_model extends CI_Model {

    public function salvar_sala($dados = NULL) {
        if ($dados != NULL)
            $this->db->insert('salas', $dados);
    }

    public function atualizar_sala($dados, $idSala) {
        
            $this->db->where('idSala', $idSala);
            $this->db->update('salas', $dados);
    }

    public function listar_salas() {
        $this->db->select('salas.*');
        $this->db->from('salas');   
        $this->db->order_by('salas.nomeSala');
        return $this->db->get();
    }

   

    public function excluir_sala($idSala) {
        $this->db->where('idSala', $idSala);
        $this->db->delete('salas');
    }

    public function listar_sala_por_idSala($idSala) {
        $this->db->select('salas.*');
        $this->db->from('salas');
        $this->db->where('idSala', $idSala);
        return $this->db->get();
    }

    
}
