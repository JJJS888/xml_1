<?php
$xml = simplexml_load_file('alumnos.xml');

if (isset($_GET['expediente'])) {
    $expedienteBuscado = $_GET['expediente'];
    $alumno = null;

    foreach ($xml->alumno as $a) {
        if ((string)$a->expediente === $expedienteBuscado) {
            $alumno = $a;
            break;
        }
    }

    if (!$alumno) {
        die("Alumno no encontrado.");
    }
} else {
    die("Expediente no especificado.");
}

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alumno->nombre = $_POST['nombre'];
    $alumno->apellidos = $_POST['apellidos'];
    $alumno->curso = $_POST['curso'];
    $alumno->notaMedia = $_POST['notaMedia'];

    $xml->asXML('alumnos.xml');
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Editar Alumno</h1>
    <form method="post">
        <div class="mb-3">
            <label>Expediente:</label>
            <input type="text" name="expediente" class="form-control" value="<?= htmlspecialchars($alumno->expediente) ?>" disabled>
        </div>
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($alumno->nombre) ?>" required>
        </div>
        <div class="mb-3">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" class="form-control" value="<?= htmlspecialchars($alumno->apellidos) ?>" required>
        </div>
        <div class="mb-3">
            <label>Curso:</label>
            <input type="text" name="curso" class="form-control" value="<?= htmlspecialchars($alumno->curso) ?>" required>
        </div>
        <div class="mb-3">
            <label>Nota Media:</label>
            <input type="number" step="0.1" min="0" max="10" name="notaMedia" class="form-control" value="<?= htmlspecialchars($alumno->notaMedia) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>

