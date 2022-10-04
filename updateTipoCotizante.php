<?php
if(!isset($_POST["id"]) || !isset($_POST["descripcion"])) exit();

require_once "config.php";

$id = $_POST["id"];
$descripcion = $_POST["descripcion"];


$stmt = $conn->prepare("update tipo_cotizante set descripcion = ?, estado = true where id = ?;");
$updated = $stmt->execute([$descripcion, $id]);

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
  <a href="<?php echo "index.php"?>">Regresar</a>
</body>
</html>