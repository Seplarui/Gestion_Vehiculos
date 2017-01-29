<?php

// app/Controller.php

// ACCIONES ASOCIADAS A LAS URL'S DE LA CLASE CONTROLLER.
class Controller {
	public function inicio() {
		$parametros = array (
				'mensaje' => 'Gestión de Vehículos',
				'fecha' => date ( 'd-m-y' ) 
		);
		
		require_once __DIR__ . '/templates/inicio.php';
	}
	public function listar() {
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_clave, Config::$bd_hostname );
		$parametros = array (
				'marca' => $m->dameMarca () 
		);
		require __DIR__ . '/templates/mostrarMarcas.php';
	}
	public function insertar() {
		$parametros = array (
				'marca' => '' 
		);
		
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_clave, Config::$bd_hostname );
		
		if ($_SERVER ['REQUEST_METHOD'] == 'POST')
			;
			
			// COMPROBAR FORMULARIO
		
		if ($m->validarDatos ( $_POST ['marca'] )) {
			$m->insertaMarca ( $_POST ['marca'] );
			header ( 'Location: index.php?ctl=listar' );
		} else {
			$parametros = array (
					'marca' => $_POST ['marca'] 
			);
			
			$parametros ['mensaje'] = 'No se ha podido insertar la marca, comprueba el formulario';
		}
		require_once __DIR__ . '/templates/formInsertar.php';
	}
	public function buscarPorMarca() {
		$parametros = array (
				'marca' => '',
				'resultado' => array () 
		);
		
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_clave, Config::$bd_hostname );
		
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$parametros ['marca'] = $_POST ['marca'];
			$parametros ['resultado'] = $m->buscarVehiculosPorMarca ( $_POST ['marca'] );
		}
		require_once __DIR__ . '/templates/buscarPorMarca.php';
	}
	public function ver() {
		if (! isset ( $_GET ['id'] )) {
			
			throw new Exception ( 'Página no encontrada' );
		}
		
		$id = $_GET ['id'];
		
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_clave, Config::$bd_hostname );
		$marca = $m->dameMarca ( $id );
		$parametros = $marca;
		
		require __DIR__ . '/templates/verMarca.php';
	}
}
?>