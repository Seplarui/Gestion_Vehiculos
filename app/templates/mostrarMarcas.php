<?php
ob_start ();

// error_reporting(E_ALL);
// init_set('display_error','1');

?>

<table>
	<tr>
		<th>Marca de Veh�culo</th>
	</tr>

<?php  echo "Mostrando Marcas de Veh�culos"?>

<?php foreach ($parametros['marca'] as $marca):?>
<tr>
		<td><a href="index.php?ctl=ver&id=<?php echo $marca->getId();?>">
<?php echo $marca->getMarca();?></a></td>
	</tr>
<?php endforeach;?>
</table>

