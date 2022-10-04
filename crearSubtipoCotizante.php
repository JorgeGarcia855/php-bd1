<?php
  require_once "config.php";
  $id_cot = $_GET["id"];
  $sel = $conn->query("select * from subtipo_cotizante where id_cot = {$id_cot};");
	$sub_tpo_cotizantes = $sel->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Subtipos Cotizantes</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
	<link rel="stylesheet" href="tablesort.css">
</head>
<body>
	<h2>Formulario Subtipo Cotizante</h2>
  <form method="post" action="<?php echo "insertSubtipoCotizante.php?id_cot=" . $id_cot?>">
		<label for="descripcion">Descripcion:</label>
		<br>
		<input name="descripcion" required type="text" id="descripcion" placeholder="Escribe la descripcion del subtipo">
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
	<h2>Subtipos Cotizantes</h2>
	<br>
	<table class="table-sortable">
		<thead>
			<tr>
				<th>ID</th>
        <th>ID Tipo Cotizante</th>
				<th>Descripcion</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($sub_tpo_cotizantes as $sub_tpo_cotizante){ ?>
			<tr>
				<td><?php echo $sub_tpo_cotizante->id ?></td>
        <td><?php echo $sub_tpo_cotizante->id_cot ?></td>
				<td><?php echo $sub_tpo_cotizante->descripcion ?></td>
				<td><?php echo $sub_tpo_cotizante->estado == 1 ? "Activo" : "Inactivo" ?></td>
        <td><a href="<?php echo "editarSubtipoCotizante.php?id=" . $sub_tpo_cotizante->id . "&" . "id_cot=" . $sub_tpo_cotizante->id_cot?>">Editar</a></td>
				<td><a href="<?php echo "eliminarSubtipoCotizante.php?id=" . $sub_tpo_cotizante->id . "&" . "id_cot=" . $sub_tpo_cotizante->id_cot?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
  <a href="<?php echo "index.php"?>">Regresar</a>
	<script src="tablesort.js"></script>
</body>
</html>