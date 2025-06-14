<?php
session_start();
require 'auth.php';
require 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2 class="mb-4">Citas agendadas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Especialidad</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM citas ORDER BY fecha, hora");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['nombre_apellido']}</td>
                <td>{$row['cedula']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['especialidad']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['hora']}</td>
                <td>{$row['estado']}</td>
                <td>
                    <a href='efectuada.php?id={$row['id']}' class='btn btn-success btn-sm'>✅</a>
                    <a href='reprogramar.php?id={$row['id']}' class='btn btn-warning btn-sm'>🔁</a>
                    <a href='cancelar.php?id={$row['id']}' class='btn btn-danger btn-sm'>❌</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>