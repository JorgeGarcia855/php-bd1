<?php 
if (!isset($_GET["id"]) ||!isset($_GET["id_cot"])) exit();

$id = $_GET["id"];
$id_cot = $_GET["id_cot"];
require_once "config.php";

$stmt = $conn->prepare("select * from subtipo_cotizante where id = ? and id_cot = ?;");
$stmt->execute([$id, $id_cot]);
$sub_tpo_cot = $stmt->fetch(PDO::FETCH_OBJ);

if ($sub_tpo_cot === false) {
  echo "No existe ese subtipo de cotizante";
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
	<h2>Editar Subtipo Cotizante</h2>
	<form method="post" action="updateSubtipoCotizante.php">
		<input type="hidden" name="id" value="<?php echo $sub_tpo_cot->id; ?>">
    <input type="hidden" name="id_cot" value="<?php echo $sub_tpo_cot->id_cot; ?>">
		<label for="descripcion">Descripcion:</label>
		<br>
		<input value="<?php echo $sub_tpo_cot->descripcion ?>" name="descripcion" required type="text" id="descripcion" placeholder="Escribe la descripcion del subtipo">
		<!-- <br><br>
		<label for="estado">Estado</label>
		<select name="estado" required name="estado" id="estado">
			<option value="">--Selecciona--</option>
			<option <?php //echo $sub_tpo_cot->estado == 1 ? "selected='selected'": "" ?> value=1>Activo</option>
			<option <?php //echo $sub_tpo_cot->estado == 0 ? "selected='selected'": "" ?> value=0>Inactivo</option>
		</select> -->
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>