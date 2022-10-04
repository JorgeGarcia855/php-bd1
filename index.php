<?php
  require_once "config.php";
  $sel = $conn->query("select * from tipo_cotizante;");
	$tpo_cotizantes = $sel->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tipos</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
	<link rel="stylesheet" href="tablesort.css">
</head>
<body>
	<h2>Formulario Tipo Cotizante</h2>
  <form method="post" action="insertTipoCotizante.php">
		<label for="descripcion">Descripcion:</label>
		<br>
		<input name="descripcion" required type="text" id="descripcion" placeholder="Escribe la descripcion del tipo">
		<!-- <br><br>
		<label for="estado">Estado</label>
		<select name="estado" required name="estado" id="estado">
			<option value="">--Selecciona--</option>
			<option value=1>Activo</option>
			<option value=0>Inactivo</option>
		</select> -->
		<br><br><input type="submit" value="Registrar">
	</form>
  <br>
	<h2>Tipos Cotizantes</h2>
	<br>
	<table class="table-sortable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Descripcion</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($tpo_cotizantes as $tpo_cotizante){ ?>
			<tr>
				<td><?php echo $tpo_cotizante->id ?></td>
				<td><?php echo $tpo_cotizante->descripcion ?></td>
				<td><?php echo $tpo_cotizante->estado == 1 ? "Activo" : "Inactivo" ?></td>
				<td><a href="<?php echo "crearSubtipoCotizante.php?id=" . $tpo_cotizante->id?>">Ver Subtipos</a></td>
        <td><a href="<?php echo "editarTipoCotizante.php?id=" . $tpo_cotizante->id?>">Editar</a></td>
				<td><a href="<?php echo "eliminarTipoCotizante.php?id=" . $tpo_cotizante->id?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<script src="tablesort.js"></script>
</body>
</html>