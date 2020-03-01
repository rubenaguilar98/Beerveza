<?php

$con = $_GET['con'] ?? "login";
$ope = $_GET['ope'] ?? "sesionOn";

require_once "./controladores/{$con}Controller.php";

$nom = "{$con}Controller";

$control = new $nom();

$control->$ope();