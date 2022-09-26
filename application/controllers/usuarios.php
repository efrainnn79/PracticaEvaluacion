
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


    public function testAdmin()
    {
        if($this->session->userdata('Rol')=='Administrador'){
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
            $data  = array(
                'infoUsuarios' => $this->usuario_model->lista(), 
            );
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('usuarios/usuarios_view', $data);
            $this->load->view('layout/footer');
        }else{
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
            $data  = array(
                'infoUsuarios' => $this->usuario_model->lista(), 
                'roles' => $this->usuario_model->getRoles(),
            );
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('usuarios/usuarios_view', $data);
            $this->load->view('layout/footer');
        }
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

            $username=UsuarioPassword($_POST['Cedula'],$_POST['Nombre'],$_POST['ApellidoPaterno'],$_POST['ApellidoMaterno']);
            $Consulta = $this->usuario_model->validarid($username);

            if($Consulta->num_rows()>0){
                redirect('usuarios/testAdmin/1','refresh');
            }else{ 
            $nombres = $this->input->post("Nombre");
            $apellidoPat = $this->input->post("ApellidoPaterno");
            $apellidoMat = $this->input->post("ApellidoMaterno");
            $Sexo = $this->input->post("Sexo");
            $Cedula = $this->input->post("Cedula");
            $rol = $this->input->post("rol");
            $Correo = $this->input->post("Correo");
            $Telefono = $this->input->post("Telefono");
            $usu_usuario = $username;
            $usu_password = md5($username);

            $data  = array(
            'nombres' => $nombres, 
            'apellidoPat' => $apellidoPat,
            'apellidoMat' => $apellidoMat,
            'Sexo' => $Sexo,
            'Telefono' => $Telefono,
            'Cedula' => $Cedula,
            'email' => $Correo,
            'username' => $username,
            'password' => $usu_password,
            'idRol' => $rol,
            'estado' => "1"
            );

            if ($this->usuario_model->save($data)) {
                redirect('usuarios/testAdmin/0','refresh');
            }
            else{
                $this->session->set_flashdata("error","No se pudo guardar la informacion");
                //redirect(base_url()."administrador/usuarios/add");
            }
        }
            
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuarios/index/3','refresh');

    }
    public function git3()
    {
      

    }
    public function deleteRestorebd()
    {
        $idUsuario = $this->input->post("idUsuario");
        $data['Estado'] =  $_POST['estado'];
        $this->usuario_model->update($idUsuario, $data);
        redirect('usuarios/testAdmin','refresh');  
    }
    
	public function update(){
        $username=UsuarioPassword($_POST['Cedula'],$_POST['Nombre'],$_POST['ApellidoPaterno'],$_POST['ApellidoMaterno']);
        $Consulta = $this->usuario_model->validarid($username);
        if($Consulta->num_rows()>0){
            redirect('usuarios/testAdmin/1','refresh');
        }else{ 
            $idusuario = $this->input->post("idUsuario");
            $nombres = $this->input->post("Nombre");
            $apellidoPat = $this->input->post("ApellidoPaterno");
            $apellidoMat = $this->input->post("ApellidoMaterno");
            $Sexo = $this->input->post("Sexo");
            $Cedula = $this->input->post("Cedula");
            $rol = $this->input->post("rol");
            $Correo = $this->input->post("Correo");
            $Telefono = $this->input->post("Telefono");
            $usu_usuario = $username;
            $usu_password = md5($username);

            $data  = array(
                'nombres' => $nombres, 
                'apellidopat' => $apellidoPat,
                'apellidomat' => $apellidoMat,
                'Sexo' => $Sexo,
                'Telefono' => $Telefono,
                'Cedula' => $Cedula,
                'email' => $Correo,
                'username' => $username,
                'password' => $usu_password
            );

            if ($this->usuario_model->update($idusuario,$data)) {
                //redirect(base_url()."administrador/usuarios");
                //$this->session->set_flashdata("error","No se pudo actualizar la informacion");
                redirect('usuarios/testAdmin/0','refresh');
            }
            else{
                $this->session->set_flashdata("error","No se pudo actualizar la informacion");
                //redirect(base_url()."administrador/usuarios/edit/".$idusuario);
            }
        }

		
	}

       
}