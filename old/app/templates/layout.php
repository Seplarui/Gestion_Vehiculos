<!DOCTYPE html>

<html>

<head>
<title>Marcas de Vehículos</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css"
	href="<?php echo 'css/'.Config::$mvc_css;?>" />
</head>

<body>

	<div id="cabecera">

		<h1>Marcas de Vehículos</h1>

	</div>

	<div id="menu">
		<hr />
		<a href="index.php?ctl=inicio">Inicio</a> 
		<a href="index.php?ctl=listar">Listar Vehículos</a>  
		<a href="index.php?ctl=insertar">Insertar Marca</a> 
		<a href="index.php?ctl=buscar">Busca por Marca</a>
		<hr />
	</div>
	
	<div id="contenido">
	
	<?php echo $contenido;?>
	
	</div>
	
	<div id="footer">
	
	<hr/>
	<div align="center">Footer</div>
	
	</div>

</body>

</html>