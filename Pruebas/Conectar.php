<?php
$dsn = 'mysql:dbname=seplarui;host=localhost';
$username="root";
$passwd="";

	
	$conexion=new PDO($dsn, $username, $passwd);
	
	echo "Conexión correcta";
	
	
	
$consulta="select * from marcas";

$conexion->query($consulta);







?>