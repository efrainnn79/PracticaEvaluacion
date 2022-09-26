<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_ModeL {

    public function lista()
    {
        $this->db->select('*');
        $this->db->from('vwempleado');
        return $this->db->get();
    }
    public function save($data){
		return $this->db->insert("persona",$data);
	}

    public function update($id,$data){
		$this->db->where("idPersona",$id);
		return $this->db->update("persona",$data);
	}

}
