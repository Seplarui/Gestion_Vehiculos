<?php
include_once ("MarcaVehiculo.php");
class Model {
	protected $conexion;
	public function __construct($dbname, $dbuser, $dbpass, $dbhost) {
		$this->conexion = NULL;
		
		try {
			$bdconexion = new PDO ( 'mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass );
			$this->conexion = $bdconexion;
		} catch ( PDOException $ex ) {
			echo "Error: " . $ex->getMessage ();
		}
	}
	
	// Consulta para mostrar las marcas introducidas en la BDA.
	public function consultarMarcas() {
		$consulta = "select * from marcas";
		$resultado = $this->conexion->query ( $consulta );
		$marcas = array ();
		$cont = 0;
		$filas = $resultado->fetchAll ( PDO::FETCH_OBJ );
		foreach ( $filas as $fila ) {
			$marca = new MarcaVehiculo( $fila->id, $fila->marca_vehiculo );
			$marcas [$cont] = $marca;
			$cont ++;
		}
		
		$conexion = false;
		return $marcas;
	}
	public function buscarMarcaPorMarca($marca) {
		$marca = htmlspecialchars ( $marca );
		$consulta = "select * from marcas where marka like'" . $marca;
		$resultado = $this->conexion->query ( $consulta );
		$marcas = array ();
		$cont = 0;
		
		$filas = $resultado->fetchAll ( PDO::FETCH_OBJ );
		foreach ( $filas as $fila ) {
			$marca = new MarcaVehiculo ( $fila->id, $fila->marca );
			$marcas [$cont] = $marca;
			$cont ++;
		}
		
		$conexion = false;
		return $marcas;
	}
	public function consultarMarcaId($id) {
		$consulta = "select * from marcas where id=:id;";
		$resultado = $this->conexion->prepare ( $consulta );
		$resultado->execute ( array (
				":id" => $id 
		) );
		$marcas = array ();
		$cont = 0;
		$fila = $resultado->fetchAll ( PDO::FETCH_OBJ );
		$marca = new MarcaVehiculo ( $fila->id, $fila->marca );
		$conexion = false;
		return $marca;
	}
	public function insertarMarca($marca_vehiculo) {
		try {
			$consulta = "insert into marcas (marca) values($marca_vehiculo)";
			$resultado = $this->conexion->prepare ( $consulta );
			if (! $resultado) {
				$this->conexion->errorInfo ();
			}
			$cont = $resultado->execute ( array (
					":marca" => $marca 
			) );
		} catch ( PDOException $ex ) {
			echo "Error: " . $ex->getMessage ();
			return false;
		}
		
		$conexion = false;
		if ($cont == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function validarDatos($marca_vehiculo) {
		$valido = is_string ( $marca_vehiculo );
		return ($valido);
	}
}
?>