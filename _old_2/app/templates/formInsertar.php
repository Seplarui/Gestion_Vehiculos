<?php
ob_start ();
if (isset ( $parametros ['mensaje'] )) :
	?>

<b><span style="color: red;"><?php echo $parametros['mensaje'];?></span></b>
<?php endif;?>

<br />

<form name="formInsertar" action="index.php?ctl=insertar" method="post">
	<table>

		<tr>
			<th>Marca Vehículo</th>
		</tr>
		<tr>
			<td><input type="text" name="marca"
				value="<?php echo $parametros['marca'];?>" /></td>
		</tr>
	</table>
	<input type="submit" value="Insertar" name="insertar" />
</form>
<?php $contenido=ob_get_clean();?>
<?php include 'layout.php';?>


