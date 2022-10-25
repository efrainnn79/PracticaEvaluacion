<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$data['msg']=$this->uri->segment(3);
		if ($this->session->userdata('login')) {
			//el usr ya esta logueado
			redirect('usuarios/panel','refresh');
		}
		else
		{
			//usuario no esta logueado
			$this->load->view('inc/header');
			$this->load->view('login',$data);
			$this->load->view('inc/footer');
		}

       
	}
	// public function prueba()
	// {
	// 	$query=$this->db->get('estudiantes');
	// 	$execonsulta=$query->result();
	// 	print_r($execonsulta);
	// }

	public function validar()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if ($consulta->num_rows()>0) 
		{
			//tenemos una validacion efectiva
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('idusuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuarios/panel','refresh');
			}
		}
		else 
		{
			//no hay validacion efectiva y redirigimos a login
			redirect('usuarios/index/2','refresh');
		}
	}
	public function panel()
	{
		if ($this->session->userdata('login'))
		{
			if ($this->session->userdata('tipo')=='admi') {
				//el usr ya esta logueado
			redirect('estudiante/index','refresh');
			}
			else 
			{
				redirect('estudiante/guest','refresh');
			}
			
		}
		else 
		{
			//usuario no esta logueado
			redirect('usuarios/index/3','refresh');  
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index/1','refresh');
	}
}
