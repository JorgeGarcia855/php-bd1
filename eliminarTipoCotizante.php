<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
require_once "config.php";
$stmt = $conn->prepare("DELETE FROM tipo_cotizante WHERE id = ?;");
$deleted = $stmt->execute([$id]);
if($deleted === TRUE) echo "Tipo eliminado correctamente";
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
  <a href="<?php echo "index.php"?>">Regresar</a>
</body>
</html>