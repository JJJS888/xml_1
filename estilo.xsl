<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" />

    <xsl:template match="/">
        <html>
            <head>
                <title>Listado de Alumnos</title>

                <!-- Bootstrap -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

                <!-- DataTables -->
                <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
                <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" />

                <style>
                    .actions { display: flex; gap: 5px; justify-content: center; }
                </style>
            </head>

            <body style="background-color: #ebedef;">
                <div class="container mt-4">
                    <h1 class="text-center"><b>Listado de Alumnos</b></h1>

                    <div class="text-end mb-3">
                        <a href="agregar.php" class="btn btn-success">Agregar Alumno</a>
                    </div>

                    <table id="miTabla" class="table table-striped table-bordered">
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
                            <xsl:for-each select="alumnos/alumno">
                                <tr>
                                    <td><xsl:value-of select="expediente" /></td>
                                    <td><xsl:value-of select="nombre" /></td>
                                    <td><xsl:value-of select="apellidos" /></td>
                                    <td><xsl:value-of select="curso" /></td>
                                    <td><xsl:value-of select="notaMedia" /></td>
                                    <td class="actions">
                                        <a>
                                            <xsl:attribute name="href">
                                                <xsl:text>editar.php?expediente=</xsl:text>
                                                <xsl:value-of select="expediente" />
                                            </xsl:attribute>
                                            <xsl:attribute name="class">btn btn-warning btn-sm</xsl:attribute>
                                            Editar
                                        </a>
                                        <a>
                                            <xsl:attribute name="href">
                                                <xsl:text>eliminar.php?expediente=</xsl:text>
                                                <xsl:value-of select="expediente" />
                                            </xsl:attribute>
                                            <xsl:attribute name="class">btn btn-danger btn-sm</xsl:attribute>
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </div>

                <!-- JS -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
                <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

                <script>
                    $(document).ready(function () {
                        $('#miTabla').DataTable({ select: true });
                    });
                </script>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
