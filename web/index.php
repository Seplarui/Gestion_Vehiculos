<?php

// MODELO Y CONTROLADOR
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Controller.php';
require_once __DIR__ . '/../app/Model.php';

// RUTAS

$enrutamiento = array (
		
		'inicio' => array (
				'controller' => 'Controller',
				'action' => 'inicio' 
		),
		'listar' => array (
				'controller' => 'Controller',
				'action' => 'listar' 
		),
		'insertar' => array (
				'controller' => 'Controller',
				'action' => 'insertar' 
		),
		'buscar' => array (
				'controller' => 'Controller',
				'action' => 'buscar' 
		),
		'ver' => array (
				'controller' => 'Controller',
				'action' => 'ver' 
		) 
);

// PARSEO DE LA RUTA

if (isset ( $_GET ['ctl'] )) {
	if (isset ( $enrutamiento [$_GET ['ctl']] )) {
		$ruta = $_GET ['ctl'];
	} else {
		header ( 'Status: 404 Not Found' );
		echo '<html><body><h1>Error 404: No existe la ruta<i>' . $_GET ['ctl'] . '</i></h1></body></html>';
		exit ();
	}
} else {
	$ruta = 'inicio';
}

$controlador = $enrutamiento [$ruta];

// SE EJECUTA EL CONTROLADOR ASOCIADO A LA RUTA

if (method_exists ( $controlador ['controller'], $controlador ['action'] )) {
	call_user_func ( array (
			new $controlador ['controller'] (),
			$controlador ['action'] 
	) );
} else {
	header ( "Status: 404 Not Found" );
	echo "<html><body><h1>Error 404: El controlador <i>" . $controlador ['controller'] . "->" . $controlador ['action'] . "</i>no existe</h1></body></html>";
}