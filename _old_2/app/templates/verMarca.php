<?php ob_start()?>

<h1><?php echo $parametros['marca']?></h1>
<table border="1">

	<tr>

		<td>Marca Vehículo</td>
		<td><?php echo $marca['marca']?></td>
	</tr>
<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>
</table>
