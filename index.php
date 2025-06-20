<?php
$xml = simplexml_load_file('alumnos.xml');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" />
</head>
<body class="container mt-4">
    <h1 class="text-center">Listado de Alumnos</h1>
    <a href="agregar.php" class="btn btn-success mb-3">Agregar Alumno</a>

    <table id="tablaAlumnos" class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
                <th>Expediente</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Curso</th>
                <th>Nota Media</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xml->alumno as $alumno): ?>
                <tr>
                    <td><?= $alumno->expediente ?></td>
                    <td><?= $alumno->nombre ?></td>
                    <td><?= $alumno->apellidos ?></td>
                    <td><?= $alumno->curso ?></td>
                    <td><?= $alumno->notaMedia ?></td>
                    <td>
                        <a href="editar.php?expediente=<?= urlencode($alumno->expediente) ?>" class="btn btn-warning btn-sm">Editar</a>
                      <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion('<?= htmlspecialchars($alumno->expediente) ?>')">Eliminar</button>


                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<script>
function confirmarEliminacion(expediente) {
    if (confirm("¿Estás seguro de que deseas eliminar al alumno con expediente " + expediente + "?")) {
        window.location.href = "eliminar_alumno.php?expediente=" + encodeURIComponent(expediente);
    }
}
</script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tablaAlumnos').DataTable();
        });
    </script>







</body>
</html>
