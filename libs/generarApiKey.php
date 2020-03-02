<?php
require_once "Sesion.php";
require_once "Database.php";

$sesion = Sesion::getInstance();

if (!$sesion->checkActiveSession()) {
    $sesion->redirect("index.php");
}
$db = Database::getInstance();

$idUsu = $sesion->getUsuario()->getIdUsu();
$api = $db->query("SELECT api_key FROM usuario WHERE idUsu='$idUsu';")->fetchColumn();

if (!isset($api))
{
    $api = md5($sesion->getUsuario()->getEmail() . time());
    $sql = "UPDATE usuario SET api_key=? WHERE idUsu=?";
    $idUsu = $sesion->getUsuario()->getIdUsu();
    $db->query($sql, [$api,$idUsu])
        or die("Ha habido algun error,no se ha asignado la API key");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BeerVeza</title>
</head>
<body>
    <h1>Generador de API KEY</h1>
    <h1>API KEY :  <?php echo $api;?> </h1>
</body>

</html>