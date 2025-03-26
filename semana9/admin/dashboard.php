<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_email'])) {
    header("Location: ../access_denegate.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

$email_usuario = $_SESSION['usuario_email'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      .sidebar {
        background-color: #f8f9fa; /* Color de fondo de la barra lateral */
        border-right: 1px solid #dee2e6; /* Borde derecho de la barra lateral */
        padding-top: 1rem;
        height: 100vh; /* Asegura que la barra lateral tenga la altura completa de la ventana */
        position: fixed; /* Fija la barra lateral para que no se desplace al hacer scroll */
        top: 0;
        left: 0;
        z-index: 100; /* Asegura que la barra lateral esté sobre otros elementos */
      }

      .sidebar .nav-link {
        color: #343a40; /* Color del texto de los enlaces de la barra lateral */
        margin-bottom: 0.5rem;
        display: flex; /* Añade flexbox para alinear el icono y el texto */
        align-items: center; /* Centra verticalmente el icono y el texto */
      }

      .sidebar .nav-link:hover {
        background-color: #e9ecef; /* Color de fondo al pasar el ratón por encima */
        color: #0078d7; /* Color del texto al pasar el ratón por encima */
      }

      .sidebar .nav-link i {
        margin-right: 0.5rem; /* Espacio entre el icono y el texto */
        width: 1rem; /* Ancho fijo para el icono */
        text-align: center; /* Centra el icono dentro de su espacio */
      }

      main {
        margin-left: 250px; /* Ajusta el margen izquierdo para el ancho de la barra lateral */
        padding: 1rem;
      }

      .modal-header {
        background-color: #f0f0f0; /* Color de fondo del encabezado del modal */
        border-bottom: 1px solid #dee2e6; /* Borde inferior del encabezado del modal */
      }

      .modal-body {
        padding: 1rem;
      }

      .modal-footer {
        background-color: #f0f0f0; /* Color de fondo del pie del modal */
        border-top: 1px solid #dee2e6; /* Borde superior del pie del modal */
      }

      .table-responsive {
        margin-top: 1rem;
      }

      .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05); /* Estilo de tabla rayada */
      }

      .btn-primary {
        background-color: #0078d7; /* Color de fondo del botón primario */
        border-color: #0078d7;
      }

      .btn-primary:hover {
        background-color: #0056b3; /* Color de fondo del botón primario al pasar el ratón */
        border-color: #0056b3;
      }

      .btn-warning {
        background-color: #f39c12; /* Color de fondo del botón de advertencia */
        border-color: #f39c12;
      }

      .btn-warning:hover {
        background-color: #c87800; /* Color de fondo del botón de advertencia al pasar el ratón */
        border-color: #c87800;
      }

      .btn-danger {
        background-color: #dc3545; /* Color de fondo del botón de peligro */
        border-color: #dc3545;
      }

      .btn-danger:hover {
        background-color: #c82333; /* Color de fondo del botón de peligro al pasar el ratón */
        border-color: #c82333;
      }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-section="maestros">
                                <i class="bi bi-person-fill"></i> Maestros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="materias">
                                <i class="bi bi-book-fill"></i> Materias
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="main-content">
                </main>
        </div>
    </div>

    <div class="modal fade" id="agregarMaestroModal" tabindex="-1" aria-labelledby="agregarMaestroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarMaestroModalLabel">Agregar Maestro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAgregarMaestro">
                        <div class="mb-3">
                            <label for="nombreMaestro" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreMaestro" required>
                            <div class="invalid-feedback">Por favor, ingrese el nombre del maestro.</div>
                        </div>
                        <div class="mb-3">
                            <label for="emailMaestro" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="emailMaestro" required>
                             <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardarMaestro">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agregarMateriaModal" tabindex="-1" aria-labelledby="agregarMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarMateriaModalLabel">Agregar Materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAgregarMateria">
                        <div class="mb-3">
                            <label for="nombreMateria" class="form-label">Nombre de la Materia</label>
                            <input type="text" class="form-control" id="nombreMateria" required>
                            <div class="invalid-feedback">Por favor, ingrese el nombre de la materia.</div>
                        </div>
                        <div class="mb-3">
                            <label for="creditosMateria" class="form-label">Créditos</label>
                            <input type="number" class="form-control" id="creditosMateria" required>
                            <div class="invalid-feedback">Por favor, ingrese los créditos de la materia.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardarMateria">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const mainContent = document.getElementById('main-content');
        const agregarMaestroModalEl = document.getElementById('agregarMaestroModal');
        const agregarMateriaModalEl = document.getElementById('agregarMateriaModal');
        const formAgregarMaestro = document.getElementById('formAgregarMaestro');
        const formAgregarMateria = document.getElementById('formAgregarMateria');
        const guardarMaestroBtn = document.getElementById('guardarMaestro');
        const guardarMateriaBtn = document.getElementById('guardarMateria');


        let maestros = [
            { id: 1, nombre: 'Juan Pérez', email: 'juan.perez@ejemplo.com' },
        ];
        let materias = [
            { id: 1, nombre: 'Matemáticas', creditos: 5 },
        ];

        function mostrarMaestros() {
            let html = `
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Maestros</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMaestroModal">Agregar Maestro</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            maestros.forEach(maestro => {
                html += `
                            <tr>
                                <td>${maestro.id}</td>
                                <td>${maestro.nombre}</td>
                                <td>${maestro.email}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#agregarMaestroModal" data-id="${maestro.id}">Editar</button>
                                    <button class="btn btn-sm btn-danger" data-id="${maestro.id}">Eliminar</button>
                                </td>
                            </tr>
                `;
            });
            html += `
                        </tbody>
                    </table>
                </div>
            `;
            mainContent.innerHTML = html;

            // Eventos para botones de editar y eliminar
            document.querySelectorAll('.btn-warning').forEach(button => {
                button.addEventListener('click', () => {
                    const id = parseInt(button.dataset.id);
                    const maestro = maestros.find(m => m.id === id);
                    if (maestro) {
                        document.getElementById('nombreMaestro').value = maestro.nombre;
                        document.getElementById('emailMaestro').value = maestro.email;
                        agregarMaestroModalEl.querySelector('.modal-title').textContent = 'Editar Maestro';
                        agregarMaestroModalEl.show();
                        guardarMaestroBtn.dataset.id = id; // Almacena el ID del maestro a editar
                    }
                });
            });

            document.querySelectorAll('.btn-danger').forEach(button => {
                button.addEventListener('click', () => {
                    const id = parseInt(button.dataset.id);
                    if (confirm(`¿Estás seguro de eliminar al maestro con ID ${id}?`)) {
                        maestros = maestros.filter(m => m.id !== id);
                        mostrarMaestros(); // Vuelve a renderizar la tabla
                    }
                });
            });
        }

        function mostrarMaterias() {
            let html = `
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Materias</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMateriaModal">Agregar Materia</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            materias.forEach(materia => {
                html += `
                            <tr>
                                <td>${materia.id}</td>
                                <td>${materia.nombre}</td>
                                <td>${materia.creditos}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#agregarMateriaModal" data-id="${materia.id}">Editar</button>
                                    <button class="btn btn-sm btn-danger" data-id="${materia.id}">Eliminar</button>
                                </td>
                            </tr>
                `;
            });
            html += `
                        </tbody>
                    </table>
                </div>
            `;
            mainContent.innerHTML = html;

             // Eventos para botones de editar y eliminar de materias
            document.querySelectorAll('.btn-warning').forEach(button => {
                button.addEventListener('click', () => {
                    const id = parseInt(button.dataset.id);
                    const materia = materias.find(m => m.id === id);
                    if (materia) {
                        document.getElementById('nombreMateria').value = materia.nombre;
                        document.getElementById('creditosMateria').value = materia.creditos;
                        agregarMateriaModalEl.querySelector('.modal-title').textContent = 'Editar Materia';
                        agregarMateriaModalEl.show();
                        guardarMateriaBtn.dataset.id = id; // Almacena el ID de la materia a editar
                    }
                });
            });

            document.querySelectorAll('.btn-danger').forEach(button => {
                button.addEventListener('click', () => {
                    const id = parseInt(button.dataset.id);
                    if (confirm(`¿Estás seguro de eliminar la materia con ID ${id}?`)) {
                        materias = materias.filter(m => m.id !== id);
                        mostrarMaterias(); // Vuelve a renderizar la tabla
                    }
                });
            });
        }

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                const section = this.dataset.section;
                if (section === 'maestros') {
                    mostrarMaestros();
                } else if (section === 'materias') {
                    mostrarMaterias();
                }
            });
        });

        // Evento para el botón Guardar del modal de Maestros
        guardarMaestroBtn.addEventListener('click', () => {
            if (formAgregarMaestro.checkValidity()) {
                const nombre = document.getElementById('nombreMaestro').value;
                const email = document.getElementById('emailMaestro').value;
                const id = guardarMaestroBtn.dataset.id ? parseInt(guardarMaestroBtn.dataset.id) : Math.max(0, ...maestros.map(m => m.id)) + 1;


                if (guardarMaestroBtn.dataset.id) {
                    // Si existe un ID, estamos editando un maestro existente
                    const index = maestros.findIndex(m => m.id === parseInt(guardarMaestroBtn.dataset.id));
                    if (index !== -1) {
                        maestros[index] = { id: id, nombre: nombre, email: email };
                    }
                    guardarMaestroBtn.dataset.id = ''; // Limpia el ID
                } else {
                  // Si no existe un ID, estamos agregando un nuevo maestro
                    maestros.push({ id: id, nombre: nombre, email: email });
                }
                agregarMaestroModalEl.hide();
                formAgregarMaestro.reset();
                mostrarMaestros();
            } else {
                formAgregarMaestro.classList.add('was-validated');
            }
        });

        // Evento para el botón Guardar del modal de Materias
        guardarMateriaBtn.addEventListener('click', () => {
            if (formAgregarMateria.checkValidity()) {
                const nombre = document.getElementById('nombreMateria').value;
                const creditos = parseInt(document.getElementById('creditosMateria').value);
                const id = guardarMateriaBtn.dataset.id ? parseInt(guardarMateriaBtn.dataset.id) : Math.max(0, ...materias.map(m => m.id)) + 1;

                if(guardarMateriaBtn.dataset.id){
                    const index = materias.findIndex(m => m.id === parseInt(guardarMateriaBtn.dataset.id));
                    if(index !== -1){
                        materias[index] = {id: id, nombre: nombre, creditos: creditos};
                    }
                    guardarMateriaBtn.dataset.id = '';
                }
                else{
                    materias.push({ id: id, nombre: nombre, creditos: creditos });
                }

                agregarMateriaModalEl.hide();
                formAgregarMateria.reset();
                mostrarMaterias();
            } else {
                formAgregarMateria.classList.add('was-validated');
            }
        });

        // Cargar la sección de Maestros por defecto al cargar la página
        mostrarMaestros();
    </script>
</body>
</html>
