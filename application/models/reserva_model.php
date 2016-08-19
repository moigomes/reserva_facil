<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reserva_model extends CI_Model {

    public function salvar_reserva($dados = NULL) {
        if ($dados != NULL)
            $this->db->insert('reservas', $dados);
    }

    public function atualizar_reserva($dados, $idReserva) {
        
            $this->db->where('idReserva', $idReserva);
            $this->db->update('reservas', $dados);
    }

    public function listar_reservas() {
        $this->db->select('reservas.*');
        $this->db->from('reservas');   
        $this->db->order_by('reservas.nomeSala');
        return $this->db->get();
    }

   

    public function excluir_reserva($idReserva) {
        $this->db->where('idReserva', $idReserva);
        $this->db->delete('reservas');
    }

    public function listar_reserva_por_idReserva($idReserva) {
        $this->db->select('reservas.*');
        $this->db->from('reservas');
        $this->db->where('idReserva', $idReserva);
        return $this->db->get();
    }

    
}
