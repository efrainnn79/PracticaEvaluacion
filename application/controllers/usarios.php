<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {

	public function listaestudiantes()
	{
                $this->db->select('*');
                $this->db->from('estudiantes');
                $this->db->where('habilitado','1');
                //$this->db->where('nota<=',61)
                return $this->db->get();
	}
        public function agregarestudiante($data)
	{
                $this->db->insert('estudiantes',$data);
	}
        public function eliminarestudiante($idestudiante)
        {
                $this->db->where('idEstudiante',$idestudiante);
                $this->db->delete('estudiantes');
        }
        public function recuperarestudiante($idestudiante)
        {
                $this->db->select('*');
                $this->db->from('estudiantes');
                $this->db->where('idEstudiante',$idestudiante);
                return $this->db->get();
        }
        public function modificarestudiante($idestudiante,$data)
        {
                $this->db->where('idEstudiante',$idestudiante);
                $this->db->update('estudiantes',$data);
        }
        public function listaestudiantesdeshabilitados()
	{
                $this->db->select('*');
                $this->db->from('estudiantes');
                $this->db->where('habilitado','0');
                return $this->db->get();
	}
	
}
