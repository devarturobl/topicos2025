<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: access_denegate.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

$nombre_usuario = $_SESSION['usuario_nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pase de Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #800020; /* Color vino */
            color: white;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
        .btn-primary {
            background-color: #800020;
            border-color: #800020;
        }
        .btn-primary:hover {
            background-color: #5a0015;
            border-color: #5a0015;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <h1 class="mb-4">Sistema de Pase de Lista</h1>
        <form id="grupoForm" class="mb-4">
            <label for="grupo" class="form-label">Elige un grupo:</label>
            <select id="grupo" name="grupo" class="form-select">
                <option value="">Seleccione...</option>
                <option value="grupo1">Grupo 1</option>
                <option value="grupo2">Grupo 2</option>
            </select>
        </form>
        <h2 class="mb-3">Lista de Asistencia</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="tablaAsistencia">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre del Alumno</th>
                        <th>Asistencia</th>
                        <th>Falta</th>
                        <th>Falta Justificada</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        const alumnos = {
            grupo1: ["Ana Pérez", "Luis Gómez", "Carlos Ramírez"],
            grupo2: ["María López", "Pedro Torres", "Juan Díaz"]
        };

        document.getElementById('grupo').addEventListener('change', function() {
            let grupoSeleccionado = this.value;
            let tbody = document.querySelector('#tablaAsistencia tbody');
            tbody.innerHTML = '';
            
            if (alumnos[grupoSeleccionado]) {
                alumnos[grupoSeleccionado].forEach(alumno => {
                    let fila = `<tr>
                        <td>${alumno}</td>
                        <td><input type="radio" name="asistencia_${alumno}" value="asistencia"></td>
                        <td><input type="radio" name="asistencia_${alumno}" value="falta"></td>
                        <td><input type="radio" name="asistencia_${alumno}" value="justificada"></td>
                    </tr>`;
                    tbody.innerHTML += fila;
                });
            }
        });
    </script>
</body>
</html>
