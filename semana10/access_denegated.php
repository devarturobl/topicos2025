<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .access-denied-container {
            text-align: center;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .access-denied-icon {
            font-size: 5rem;
            color: #800020;
            margin-bottom: 1rem;
        }
        .access-denied-title {
            font-size: 2rem;
            color: #343a40;
            margin-bottom: 1rem;
        }
        .access-denied-message {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }
        .btn-home {
            background-color: #800020;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-home:hover {
            background-color: #5a0015;
        }
    </style>
</head>
<body>
    <div class="access-denied-container animate__animated animate__fadeIn">
        <div class="access-denied-icon">
            <i class="fas fa-ban"></i>
        </div>
        <h1 class="access-denied-title">Acceso Denegado</h1>
        <p class="access-denied-message">
            Lo sentimos, no tienes permiso para acceder a esta página.
            Por favor, contacta al administrador si crees que esto es un error.
        </p>
        <a href="https://www.google.com/" class="btn-home">Salir</a>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>