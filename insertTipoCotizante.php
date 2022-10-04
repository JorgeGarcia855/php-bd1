<?php
if(!isset($_POST["descripcion"])) exit();

require_once "config.php";

$descripcion = $_POST["descripcion"];;

$stmt = $conn->prepare("insert into tipo_cotizante values (default,?, true);");
$inserted = $stmt->execute([$descripcion]);

if($inserted === TRUE) echo "El nuevo tipo se ha registrado";
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
  <a href="<?php echo "index.php"?>">Regresar</a>
</body>
</html>