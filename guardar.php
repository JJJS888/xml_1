<?php
$xml = simplexml_load_file("alumnos.xml");

$nuevo = $xml->addChild("alumno");
$nuevo->addChild("expediente", $_POST["expediente"]);
$nuevo->addChild("nombre", $_POST["nombre"]);
$nuevo->addChild("apellidos", $_POST["apellidos"]);
$nuevo->addChild("curso", $_POST["curso"]);
$nuevo->addChild("notaMedia", $_POST["notaMedia"]);

$xml->asXML("alumnos.xml");
header("Location: index.php");