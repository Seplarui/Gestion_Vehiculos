<!DOCTYPE html>

<html>

<head>
<title>Gesti�n de Veh�culos</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="../web/css/estilo.css" />
</head>
<body>

	<div id="cabecera">
		<h1>Gesti�n de Veh�culos</h1>
	</div>

	<div id="menu">
		<hr />

		<a href="index.php?ctl=inicio">Inicio</a> <a
			href="index.php?ctl=listar">Ver Marcas</a> <a
			href="index.php?ctl=insertar">Inserta Marca</a> <a
			href="index.php?ctl=buscar">Buscar Marca por Nombre</a>
		<hr />
	</div>

	<div id="contenido">
	
	<?php echo $contenido?>
	
	</div>
	<div id="footer">

		<hr />
		<div align="center">Footer</div>

	</div>


</body>

</html>