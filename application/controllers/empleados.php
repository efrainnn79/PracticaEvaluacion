
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {


    public function testAdmin()
    {
     /*   if($this->session->userdata('Rol')=='Administrador'){
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
            $data  = array(
                'infoClients' => $this->client_model->lista(), 
            );
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('clientes/clients_view', $data);
            $this->load->view('layout/footer');
        }else{*/
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
            $data  = array(
                'infoEmpleados' => $this->empleado_model->lista(), 
            );
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('empleados/empleados_view', $data);
            $this->load->view('layout/footer');
       // }
    }

        public function index()
        {
            $data['msg']=$this->uri->segment(3);
            if($this->session->userdata('NombreUsuario'))
            {
                redirect('usuarios/panel','refresh');
    
            }
            else{
                //cargar un login form
                //$this->load->view('inc_head.php');	//archivos de cabeceras
                $this->load->view('login/vlogin',$data); //contenido
                //$this->load->view('inc_footer.php'); //archivos del pie de pagina*/
    
            }

        }
        public function validarusuario(){
            $Correo=$_POST['Correo'];
            $password=md5($_POST['password']);
            $consulta=$this->usuario_model->validar($Correo,$password);
            
            if($consulta->num_rows()>0)
            {
                foreach($consulta->result() as $row)
                {
                    //crear las variables de session
                    $this->session->set_userdata('idusuario',$row->idUsuario);
                    $this->session->set_userdata('Correo',$row->email);
                    $this->session->set_userdata('Rol',$row->Rol);
                    redirect('usuarios/panel','refresh');
                }
            }
            else{
                //sino redirigimos al index enviando 1 en el urisegment 3
                redirect('usuarios/index/1','refresh');
            }
        }


        public function panel()
        {
            if($this->session->userdata('Correo'))
            {
                if($this->session->userdata('Rol')=='Administrador')
                {
                    redirect('usuarios/testAdmin','refresh');
                }
                else
                {
                    redirect('usuarios/testAdmin','refresh');
                }
            }
            else{
                   //sino redirigimos al index enviando 2 en el urisegment 3
                   redirect('usuarios/index/2','refresh');
    
            }
    
    
    
        }

        public function store(){

            $nombres = $this->input->post("Nombre");
            $apellidoPaterno = $this->input->post("ApellidoPaterno");
            $apellidoMaterno = $this->input->post("ApellidoMaterno");
            $Sexo = $this->input->post("Sexo");
            $Direccion = $this->input->post("Direccion");
            $Correo = $this->input->post("Correo");
            $Telefono = $this->input->post("Telefono");

            $data  = array(
            'Nombre' => $nombres, 
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'Sexo' => $Sexo,
            'Direccion' => $Direccion,
            'Correo' => $Correo,
            'Telefono' => $Telefono,
            );

            if ($this->client_model->save($data)) {
                redirect('clients/testAdmin/0','refresh');
            }
            else{
                $this->session->set_flashdata("error","No se pudo guardar la informacion");
                //redirect(base_url()."administrador/usuarios/add");
            }
        
            
    }

    public function add()
    {
      //  if ($this->session->userdata('roll') == '1' || $this->session->userdata('roll') == '2') {
          // $data['provincia'] = $this->institutos_model->getProvincia();
            //$notific['infoResolucionesTop'] = $this->resoluciones_model->getResoluciones();
            /*$this->load->view('incrustaciones/head');
            $this->load->view('incrustaciones/menu-topnav');
            $this->load->view('incrustaciones/menu-sidenav');
            $this->load->view('institutos/insertar_instituto_view');
            $this->load->view('incrustaciones/footer');*/
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('clientes/clientsadd_view');
            $this->load->view('layout/footer');
      //  } else {
            //redirect('welcome/Index', 'refresh');
       // }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuarios/index/3','refresh');

    }
    public function deleteRestorebd()
    {
        $idPersona = $this->input->post("idPersona");
        $data['Estado'] =  $_POST['Estado'];
        $this->client_model->update($idPersona, $data);
        redirect('clients/testAdmin','refresh');  
    }
    
	public function update(){
            $idPersona = $this->input->post("idPersona");
            $Nombre = $this->input->post("Nombre");
            $apellidoPaterno = $this->input->post("ApellidoPaterno");
            $apellidoMaterno = $this->input->post("ApellidoMaterno");
            $Sexo = $this->input->post("Sexo");
            $Direccion = $this->input->post("Direccion");
            $Telefono = $this->input->post("Telefono");
            $Correo = $this->input->post("Correo");

            $data  = array(
                'Nombre' => $Nombre, 
                'ApellidoPaterno' => $apellidoPaterno,
                'ApellidoMaterno' => $apellidoMaterno,
                'Sexo' => $Sexo,
                'Direccion' => $Direccion,
                'Telefono' => $Telefono,
                'Correo' => $Correo
            );

            if ($this->client_model->update($idPersona,$data)) {
                //redirect(base_url()."administrador/usuarios");
                //$this->session->set_flashdata("error","No se pudo actualizar la informacion");
                redirect('clients/testAdmin/0','refresh');
            }
            else{
                $this->session->set_flashdata("error","No se pudo actualizar la informacion");
                //redirect(base_url()."administrador/usuarios/edit/".$idusuario);
            }	
	}

       
}