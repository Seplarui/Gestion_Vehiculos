<?php
$dsn = 'mysql:dbname=seplarui;host=localhost';
$username = "alumno";
$passwd = "alumno";

$conexion = new PDO ( $dsn, $username, $passwd );

echo "Conexión correcta<br/>";

$consulta = "select * from marcas";

$resultado = $conexion->query ( $consulta );

foreach ($resultado as $fila) {
	echo $fila['id']." ";
	echo $fila['marca']."<br/>";
}



?>