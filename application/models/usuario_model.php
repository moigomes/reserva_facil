<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_model extends CI_Model
{

    public function salvar_usuario($dados = NULL)
    {
        if ($dados != NULL)
        {
            $this->db->insert('usuarios', $dados);
        }
    }

    public function listar_usuarios()
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->order_by("nomeUsuario");
        return $this->db->get();
    }
    
    public function listar_usuario_por_idUsuario($idUsuario)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.idUsuario', $idUsuario);
        return $this->db->get();
    }

    public function excluir_usuario($idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $this->db->delete('usuarios');
    }
    
     public function atualizar_usuario($dados, $idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuarios', $dados);
    }

}
