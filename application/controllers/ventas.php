<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {


	public function testAdmin()
    {
        if($this->session->userdata('Rol')=='Administrador'){
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
            $data  = array(
                'infoVentas' => $this->Ventas_model->lista()
            );
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('ventas/list', $data);
            //$this->load->view('ventas/list');
            $this->load->view('layout/footer');
        }else{
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
            $data  = array(
                'infoVentas' => $this->Ventas_model->lista()
            );
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            $this->load->view('ventas/list', $data);
            //$this->load->view('ventas/list');
            $this->load->view('layout/footer');
        }
    }

	public function add(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			"clientes" => $this->Clientes_model->getClientes(),
			'categorias' => $this->Categorias_model->getCategorias(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");
	}

	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos($valor);
		echo json_encode($clientes);
	}

	public function store(){
		$fecha = $this->input->post("fecha");
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idcliente = $this->input->post("idcliente");
		$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");

		$idproductos = $this->input->post("idproductos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		$data = array(
			'fecha' => $fecha,
			'subtotal' => $subtotal,
			'igv' => $igv,
			'descuento' => $descuento,
			'total' => $total,
			'tipo_comprobante_id' => $idcomprobante,
			'cliente_id' => $idcliente,
			'usuario_id' => $idusuario,
			'num_documento' => $numero,
			'serie' => $serie,
		);

		if ($this->Ventas_model->save($data)) {
			$idventa = $this->Ventas_model->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detalle($idproductos,$idventa,$precios,$cantidades,$importes);
			//redirect(base_url()."movimientos/ventas");
			redirect('movimientos/ventas', 'refresh');

		}else{
			//redirect(base_url()."movimientos/ventas/add");
			redirect('movimientos/ventas/add', 'refresh');
		}
	}

	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->getComprobante($idcomprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}

	protected function save_detalle($productos,$idventa,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'producto_id' => $productos[$i], 
				'venta_id' => $idventa,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			$this->Ventas_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}

	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_model->getProducto($idproducto);
		$data = array(
			'stock' => $productoActual->stock - $cantidad, 
		);
		$this->Productos_model->update($idproducto,$data);
	}

	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa)
		);
		$this->load->view("admin/ventas/view",$data);
	}

	public function getProductosByCategoria(){
		$idcategoria = $this->input->post("idcategoria");
		$productos = $this->Ventas_model->getProductosByCategoria($idcategoria);
		echo json_encode($productos);
	}

	public function getProductoByCode(){
		$codigo_barra = $this->input->post("codigo_barra");
		$producto = $this->Ventas_model->getProductoByCode($codigo_barra);

		if ($producto != false) {
			echo json_encode($producto);
		}else{
			echo "0";
		}
	}

}