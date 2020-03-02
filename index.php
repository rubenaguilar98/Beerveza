<?php

$con = $_GET['con'] ?? $_POST['con'] ?? "Login";
$ope = $_GET['ope'] ?? $_POST['ope'] ?? "sesionOn";

require_once "./controladores/{$con}Controller.php";

$nom = "{$con}Controller";

$control = new $nom();

$control->$ope();