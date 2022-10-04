<?php
if(!isset($_POST["descripcion"]) || !isset($_GET["id_cot"])) exit();

require_once "config.php";

$id_cot = $_GET["id_cot"];
$descripcion = $_POST["descripcion"];

$stmt = $conn->prepare("insert into subtipo_cotizante values (default,?,?,true);");
$inserted = $stmt->execute([$id_cot,$descripcion]);

if($inserted === TRUE) echo "El nuevo subtipo se ha registrado";
else echo "Error";


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