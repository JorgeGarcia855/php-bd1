<?php 
if (!isset($_GET["id"])) exit();

$id = $_GET["id"];
require_once "config.php";

$stmt = $conn->prepare("select * from tipo_cotizante where id = ?;");
$stmt->execute([$id]);
$tpo_cot = $stmt->fetch(PDO::FETCH_OBJ);

if ($tpo_cot === false) {
  echo "No existe ese tipo de cotizante";
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar persona</title>
</head>
<body>
	<h2>Editar Tipo Cotizante</h2>
	<form method="post" action="updateTipoCotizante.php">
		<input type="hidden" name="id" value="<?php echo $tpo_cot->id; ?>">
		<label for="descripcion">Descripcion:</label>
		<br>
		<input value="<?php echo $tpo_cot->descripcion ?>" name="descripcion" required type="text" id="descripcion" placeholder="Escribe la descripcion del tipo">
		<!-- <br><br>
		<label for="estado">Estado</label>
		<select name="estado" required name="estado" id="estado">
			<option value="">--Selecciona--</option>
			<option <?php //echo $tpo_cot->estado == 1 ? "selected='selected'": "" ?> value=1>Activo</option>
			<option <?php //echo $tpo_cot->estado == 0 ? "selected='selected'": "" ?> value=0>Inactivo</option>
		</select> -->
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>