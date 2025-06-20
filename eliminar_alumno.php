<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['expediente'])) {
    die("No se ha recibido expediente.");
}

$expediente = $_GET['expediente'];
$archivo = 'alumnos.xml';

if (!file_exists($archivo)) {
    die("Archivo XML no encontrado.");
}

// Cargar el XML con DOMDocument
$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;
$doc->load($archivo);

$xpath = new DOMXPath($doc);
$query = "//alumno[expediente='$expediente']";

$nodes = $xpath->query($query);

if ($nodes->length === 0) {
    die("Alumno con expediente $expediente no encontrado.");
}

// Eliminar el nodo alumno
foreach ($nodes as $node) {
    $node->parentNode->removeChild($node);
}

// Guardar cambios
if ($doc->save($archivo)) {
    header("Location: index.php");
    exit;
} else {
    die("Error al guardar el archivo XML.");
}






