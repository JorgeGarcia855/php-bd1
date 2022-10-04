<?php
if(!isset($_POST["id"]) || !isset($_POST["id_cot"]) || !isset($_POST["descripcion"])) exit();

require_once "config.php";

$id = $_POST["id"];
$id_cot = $_POST["id_cot"];
$descripcion = $_POST["descripcion"];

$stmt = $conn->prepare("update subtipo_cotizante set descripcion = ?, estado = true where id = ? and id_cot = ?;");
$updated = $stmt->execute([$descripcion, $id, $id_cot]);

if($updated === TRUE) echo "Cambios guardados";
else echo "Error. Verifica que exista el tipo";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Exito</title>
</head>
<body>
  <br>
  <a href="<?php echo "crearSubtipoCotizante.php?id=" . $id_cot?>">Regresar</a>
</body>
</html>