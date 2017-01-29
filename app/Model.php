<?php


//app/Model.php

include_once("Marca.php");

class Model {
	
	protected $conexion;
	
	public function __construct($dbname, $dbuser,$dbpas,$dbhost) {
		
		
		$this->conexion=NULL;
		
		try {
			
			$bdconexion=new PDO('mysql:host'.$dbhost.';dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
			
			$this->conexion=$bdconexion;
			
		} catch (PDOException $e) {
			echo 'Error: '.$e->getMessage();
		}
		
		
	}
	
	
}