<?php ob_start()?>

<form name="formBusqueda" action="index.php?ctl=buscar" method="post">

	<table>
	
	<tr>
	<td>
	<input type="text" name="marca" value="<?php echo $parametro['marca'];?>">Puedes utilizar comodín "%".
	</td>
	<td>
	<input type="submit" value="Buscar"></td>
	</tr>
	</table>
</form>

<?php foreach ($parametros['resultado'] as $marca):?>
<table>
<tr>

<td><a href="index.php?ctl=ver&id=<?php echo $alimento['id']?>">
<?php $marca['marca']?></a></td>

</tr>
<?php endforeach;?>
</table>

<?php $contenido=ob_get_clean();?>
<?php include 'layout.php'?>

