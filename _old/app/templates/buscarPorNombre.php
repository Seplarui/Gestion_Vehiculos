<?php ob_start();?>

<form name="formBusqueda" action="index.php?ctl=buscar" method="post">


	<table>

		<tr>
			<td>Nombre de Vehículo</td>

			<td><input type="text" name="marca"
				value="<?php echo $parametros['marca']; ?>">Puedes utilizar '%' como
				comodín)</td>

			<td><input type="submit" value="Buscar"></td>

		</tr>

	</table>
	
	</form>
	
	<?php if(count($parametros['resultado'])>0):?>
	
	<table>
	
	<tr>
	<th>Marca Vehículo</th>
	</tr>
	<?php foreach ($parametros['resultado'] as $marca): ?>
	
	
	<tr>
	<td><a href="index.php?ctl=ver&id=<?php echo $marca['id']?>">
	
	<?php echo $marca['marca']?>	</a></td>
	
	</tr>
	
	<?php endforeach;?>
	</table>
	
	<?php endif;?>
	
	<?php $contenido=ob_get_clean()?>
	
	<?php include_once 'layout.php';?>


