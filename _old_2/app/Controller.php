<?php
class Controller {
	public function inicio() {
		$parametros = array (
				'mensaje' => "Bienvenido a Gestión de Vehículos",
				'fecha' => date ( 'd-m-yyy' ) 
		);
		
		require __DIR__ . '/templates/inicio.php';
	}
	public function listar() {
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_pass, Config::$bd_hostname );
		$parametros = array (
				'marcas' => $m->consultarMarcas () 
		);
		
		require __DIR__ . '/templates/mostrarMarca.php';
	}
	public function insertar() {
		$parametros = array (
				'marca' => '' 
		);
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_pass, Config::$bd_hostname );
		
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			if ($m->validarDatos ( $_POST ['marca'] )) {
				$m->insertarMarca ( $_POST ['marca'] );
				header ( 'Location: index.php?ctl=listar' );
			} else {
				$parametros = array (
						'marca' => $_POST ['marca'] 
				);
				$parametros ['mensaje'] = "No se ha podido insertar el elemento";
			}
		}
		require __DIR__ . '/templates/formInsertar.php';
	}
	public function buscarPorMarca() {
		$parametros = array (
				'marca' => '',
				'resultado' => '' 
		);
		
		$m = new Model ( Config::$bd_nombre, Config::$bd_usuario, Config::$bd_pass, Config::$bd_hostname );
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$parametros ['marca'] = $_POST ['marca'];
			$parametros ['resultado'] = $m->buscarMarcaPorMarca ( $_POST ['marca'] );
		}
		
		require __DIR__ . '/templates/buscarPorMarca.php';
	}
	public function ver() {
		if (! isset ( $_GET ['id'] )) {
			throw new Exception ( 'Página no encontrada' );
		}
		
		$id = $_GET ['id'];
		$m = new Model ( $Config::$db_nombre, Config::$bd_usuario, Config::$bd_clave, Config::$bd_hostname );
		
		$marca = $m->dameMarca ( $id );
		
		$parametros = $marca;
		
		require __DIR__ . '/templates/verMarca.php';
	}
}

?>
	
	