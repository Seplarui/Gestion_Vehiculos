<?php

// app/Model.php
include_once ("Marca.php");
class Model {
	protected $conexion;
	public function __construct($dbname, $dbuser, $dbpas, $dbhost) {
		$this->conexion = NULL;
		
		try {
			
			$bdconexion = new PDO ( 'mysql:host' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass );
			
			$this->conexion = $bdconexion;
		} catch ( PDOException $e ) {
			echo 'Error: ' . $e->getMessage ();
		}
	}
	public function dameMarca() {
		$consulta = "select * from marcas";
		
		$resultado = $this->conexion->query ( $consulta );
		
		$marcas = array ();
		$cont = 0;
		
		$filas = $resultado->fetchAll ( PDO::FETCH_OBJ );
		
		foreach ( $filas as $fila ) {
			
			$marca = new Marca ( $fila->id, $fila->marca );
			$marcas [$cont] = $marca;
			$cont ++;
		}
		
		$conexion = false;
		return $marcas;
	}
	public function buscarMarcaPorMarca($marca) {
		$marca = htmlspecialchars ( $marca );
		
		$sql = "select * from marcas where marca like'" . $marca;
		$resultado = $this->conexion->query ( $sql );
		$marcas = array ();
		$cont = 0;
		
		$filas = $resultado->fetchAll ( PDO::FETCH_OBJ );
		foreach ( $filas as $fila ) {
			$marca = new Marca ( $fila->id, $fila->marca );
			$marcas [$cont] = $marca;
			$cont ++;
		}
		
		$conexion = false;
		return $marcas;
	}
	public function dameMarca($id) {
		$consulta = "select * from marcas where id=:id;";
		$resultado = $this->conexion->prepare ( $consulta );
		$resultado = execute ( array (
				":id" => $id 
		) );
		$marcas = array ();
		$cont = 0;
		
		$fila = $resultado->fetch ( PDO::FETCH_OBJ );
		
		$marca = new Marca ( $fila->id, $fila->marca );
		$conexion = false;
		
		return $marca;
	}
	public function insertarMarca($marca) {
		try {
			$sql = "insert into marcas(marca) values('.$marca')";
			
			$resultado = $this->conexion->prepare ( $sql );
			
			if (! $resultado) {
				
				print_r ( $this->conexion->errorInfo () );
			}
			
			$count = $result->execute ( array (
					":marca" => $marca 
			) );
		} catch ( PDOException $e ) {
			echo 'Error: ' . $e->getMessage ();
			return false;
		}
		
		$conexion = false;
		if ($count == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function validarDatos($marca) {
		$valido=is_string($marca);
		return ($valido);
	}
}