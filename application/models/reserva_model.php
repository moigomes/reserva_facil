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

    public function listar_reservas_por_idUsuario($idUsuario) {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->join('salas', 'salas.idSala=reservas.idSala');
        $this->db->where('idUsuario', $idUsuario);
        $this->db->order_by('reservas.data', 'desc');
        $this->db->order_by('nomeSala', 'asc');
        $this->db->order_by('horaInicial', 'asc');
        return $this->db->get();
    }
    
     public function listar_reservas() {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->join('salas', 'salas.idSala=reservas.idSala');
        $this->db->join('usuarios', 'usuarios.idUsuario=reservas.idUsuario');
        $this->db->order_by('reservas.data', 'desc');
        $this->db->order_by('nomeSala', 'asc');
        $this->db->order_by('horaInicial', 'asc');
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
    
    function verifica_horarios($idSala, $data){
        $this->db->select('reservas.*');
        $this->db->from('reservas');
        $this->db->where(array('idSala' => $idSala, 'data' =>$data));
        return $this->db->get();
    }
    
    function verifica_reserva($idUsuario, $data, $horaInicial){
         $this->db->select('reservas.*');
        $this->db->from('reservas');
        $this->db->where(array('idUsuario' => $idUsuario, 'data' =>$data, 'horaInicial' => $horaInicial));
        
        return $this->db->get();
    }

    
}
