<?php ob_start()?>

<table>

	<tr>
		<th>Marca Vehículo</th>
	</tr>

<?php foreach ($parametros['marcas']as $marca):?>
<tr>
		<td><a href="index.php?ctl=ver&id=<?php echo $marca['id']?>">
<?php echo $marca['marca']?></a></td>
<?php endforeach;?>


</table>
<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>
