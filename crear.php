<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file("alumnos.xml");
    $alumno = $xml->addChild("alumno");
    $alumno->addChild("expediente", $_POST["expediente"]);
    $alumno->addChild("nombre", $_POST["nombre"]);
    $alumno->addChild("apellidos", $_POST["apellidos"]);
    $alumno->addChild("curso", $_POST["curso"]);
    $alumno->addChild("notaMedia", $_POST["notaMedia"]);
    $xml->asXML("alumnos.xml");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Agregar Alumno</h2>
    <form method="post">
        <div class="mb-3"><label>Expediente</label><input type="text" name="expediente" class="form-control" required></div>
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" required></div>
        <div class="mb-3"><label>Apellidos</label><input type="text" name="apellidos" class="form-control" required></div>
        <div class="mb-3"><label>Curso</label><input type="text" name="curso" class="form-control" required></div>
        <div class="mb-3"><label>Nota Media</label><input type="number" name="notaMedia" step="0.1" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
