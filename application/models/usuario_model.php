<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_ModeL {



    public function validar($Correo,$password)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('username',$Correo);
        $this->db->where('password',$password);
        $this->db->where('estado','1');
        return $this->db->get();
    }
    public function lista()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        return $this->db->get();
    }
    public function getRoles(){
		$resultados = $this->db->get("roles");
		return $resultados->result();
	}
    public function save($data){
		return $this->db->insert("usuario",$data);
	}

    public function validarid($username)
	{
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where('username', $username);
			return $this->db->get();
	}
    public function update($id,$data){
		$this->db->where("idUsuario",$id);
		return $this->db->update("usuario",$data);
	}

}
