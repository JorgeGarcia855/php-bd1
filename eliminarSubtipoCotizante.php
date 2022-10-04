<?php
if(!isset($_GET["id"]) || !isset($_GET["id_cot"])) exit();
$id = $_GET["id"];
$id_cot = $_GET["id_cot"];

require_once "config.php";
$stmt = $conn->prepare("DELETE FROM subtipo_cotizante WHERE id = ? AND id_cot = ?;");
$deleted = $stmt->execute([$id, $id_cot]);
if($deleted === TRUE) echo "Subtipo eliminado correctamente";
else echo "Error al elimnar";
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