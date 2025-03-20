<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Sistema de Asistencia TecNM Ajalpan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #800020; /* Color vino */
            color: white;
        }
        .login-container {
            max-width: 400px;
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
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 500px;
            color: black; /* Letras negras */
            text-align: left; /* Contenido alineado a la izquierda */
        }
        .close {
            color: red;
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
        .btn {
            background-color: #343a40; /* Gris oscuro */
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .btn:hover {
            background-color: #23272b; /* Gris más oscuro al pasar el cursor */
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <h1 class="mb-4">Bienvenido al Sistema de Asistencia TecNM Ajalpan</h1>
        <div class="login-container mx-auto">
            <h4 class="text-center mb-3">Iniciar Sesión</h4>
            <form>
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
            <div class="text-center mt-3">
                <button class="btn" onclick="openModal()">Recuperar Contraseña</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">Cerrar Ventana</span>
            <h2>Recuperar Contraseña</h2>
            <form id="recoveryForm">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" required>
                <label for="email">Correo electrónico</label>
                <input type="email" id="emailModal" required>
                <button type="submit" class="btn mt-3">Enviar</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        document.getElementById("recoveryForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var username = encodeURIComponent(document.getElementById("username").value);
            var email = encodeURIComponent(document.getElementById("emailModal").value);
            
            var mailtoLink = "mailto:arturobl00@msn.com?subject=Olvidé%20mi%20contraseña&body=Ayúdenme%20a%20recuperar%20mi%20contraseña.%20Mi%20usuario%20es%20" + username + "%20y%20el%20email%20" + email;
            
            window.location.href = mailtoLink;
            
            closeModal();
        });
    </script>
</body>
</html>
