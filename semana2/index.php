<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y MySQLi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-primary">CRUD con PHP y MySQLi</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Insertar Datos</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Edad:</label>
                                <input type="number" name="edad" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono:</label>
                                <input type="text" name="tel" class="form-control" pattern="\d{10}" required placeholder="10 dígitos">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Guardar</button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="mostrar.php" class="btn btn-outline-secondary">Ver Registros</a>
                </div>

                <?php
                include 'conexion.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['nombre'];
                    $age = $_POST['edad'];
                    $phone = $_POST['tel'];

                    $query_insert = "INSERT INTO datos (nombre, edad, telefono) VALUES ('$name', '$age', '$phone')";
                    if (mysqli_query($conexion, $query_insert)) {
                        echo '<div class="alert alert-success mt-3 text-center">Registro guardado correctamente.</div>';
                    } else {
                        echo '<div class="alert alert-danger mt-3 text-center">Error al guardar el registro.</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
