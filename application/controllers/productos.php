<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function index() 
	{
        if ($this->session->userdata('tipo')=='admi')
        {
        $lista=$this->estudiante_model->listaestudiantes();
        $data['estudiantes']=$lista;

        $fechaprueba='2022-07-23 08:12:25';
        $data['fechatest']=formatearFecha($fechaprueba);

        $this->load->view('inc/header');
		$this->load->view('lista1',$data);
        $this->load->view('inc/footer');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
	}
    public function guest()
	{
        if ($this->session->userdata('tipo')=='guest')
        {
        $this->load->view('inc/header');
		$this->load->view('panelguest');
        $this->load->view('inc/footer');
        }
	}
	public function agregar()
	{

        $this->load->view('inc/header');
		$this->load->view('formulario');
        $this->load->view('inc/footer');
	}
    public function agregarbd()
	{
        $data['nombre']=$_POST['nombre'];
        $data['primerApellido']=$_POST['primerapellido'];
        $data['segundoApellido']=$_POST['segundoapellido'];

        $lista=$this->estudiante_model->agregarestudiante($data);
        redirect('estudiante/index','refresh');