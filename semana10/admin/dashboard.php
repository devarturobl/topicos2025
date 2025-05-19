<?php
session_start();

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: ../access_denegated.php");
    exit();
}

require_once 'db_functions.php';

$nombre_usuario = htmlspecialchars($_SESSION['usuario_nombre'], ENT_QUOTES, 'UTF-8');

// Procesar formulario de docentes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registrar_docente'])) {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if (registrarDocente($nombre, $email, $password)) {
            $_SESSION['alert'] = ['type' => 'success', 'message' => 'Docente registrado correctamente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['alert'] = ['type' => 'error', 'message' => 'Error al registrar docente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    } elseif (isset($_POST['editar_docente'])) {
        $id = intval($_POST['id']);
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $rol = trim($_POST['rol']);
        
        if (actualizarDocente($id, $nombre, $email, $rol)) {
            $_SESSION['alert'] = ['type' => 'success', 'message' => 'Docente actualizado correctamente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['alert'] = ['type' => 'error', 'message' => 'Error al actualizar docente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }

    if (isset($_POST['registrar_materia'])) {
        $nombre = trim($_POST['nombre']);
        $codigo = trim($_POST['codigo']);
        $creditos = trim($_POST['creditos']);
        $docente_id = intval($_POST['docente_id']);
        
        if (registrarMateria($nombre, $codigo, $creditos, $docente_id)) {
            $_SESSION['alert'] = ['type' => 'success', 'message' => 'Materia registrada correctamente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['alert'] = ['type' => 'error', 'message' => 'Error al registrar docente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    } elseif (isset($_POST['editar_docente'])) { //Agregar el codigo para las materias
        $id = intval($_POST['id']);
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $rol = trim($_POST['rol']);
        
        if (actualizarDocente($id, $nombre, $email, $rol)) {
            $_SESSION['alert'] = ['type' => 'success', 'message' => 'Docente actualizado correctamente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['alert'] = ['type' => 'error', 'message' => 'Error al actualizar docente'];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }
}

// Procesar eliminación de docente
if (isset($_GET['eliminar_docente'])) {
    $id = intval($_GET['eliminar_docente']);
    
    if (eliminarDocente($id)) {
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Docente eliminado correctamente'];
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        $_SESSION['alert'] = ['type' => 'error', 'message' => 'Error al eliminar docente'];
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

$docentes = obtenerDocentes();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style_dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Google+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-title">Dashboard Administrativo</div>
        <div class="profile">
            <div class="profile-img" id="profileImg">
                <?php echo strtoupper(substr($nombre_usuario, 0, 1)); ?>
            </div>
            <div class="profile-info">
                <div class="profile-name"><?php echo $nombre_usuario; ?></div>
                <div class="profile-role">Administrador</div>
            </div>
            <button class="theme-toggle" id="themeToggle">
                <i class="fas fa-moon"></i>
            </button>
        </div>
    </header>
    
    <!-- Sidebar -->
    <nav class="sidebar">
        <a href="#" class="sidebar-item active">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        
        <div class="sidebar-section">
            <a href="#docentes" class="sidebar-item" id="docentesTab">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Docentes</span>
            </a>
            <a href="#materias" class="sidebar-item" id="materiasTab">
                <i class="fas fa-book"></i>
                <span>Materias</span>
            </a>
        </div>
        
        <div class="sidebar-footer">
    <a href="#" onclick="confirmarCierreSesion()" class="sidebar-item">
        <span>Cerrar sesión</span>
    </a>
</div>
    </nav>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Mostrar mensajes -->
        <?php if (isset($mensaje_exito)): ?>
        <div class="card" style="background-color: #d4edda; color: #155724; margin-bottom: 20px;">
            <?php echo $mensaje_exito; ?>
        </div>
        <?php endif; ?>
        
        <?php if (isset($mensaje_error)): ?>
        <div class="card" style="background-color: #f8d7da; color: #721c24; margin-bottom: 20px;">
            <?php echo $mensaje_error; ?>
        </div>
        <?php endif; ?>
        
        <!-- Docentes Section -->
        <section id="docentesSection" class="content-section" style="display: block;">
            <div class="card">
                <h2 class="card-title">Registro de Docentes</h2>
                <form method="POST" action="">
                    <input type="hidden" name="registrar_docente" value="1">
                    <div class="form-group">
                        <label class="form-label" for="docenteNombre">Nombre completo</label>
                        <input type="text" class="form-control" id="docenteNombre" name="nombre" placeholder="Ej: Juan Pérez" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="docenteEmail">Correo electrónico</label>
                        <input type="email" class="form-control" id="docenteEmail" name="email" placeholder="Ej: juan.perez@tecnm.mx" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="docentePassword">Contraseña</label>
                        <input type="password" class="form-control" id="docentePassword" name="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="registrar_docente">
                        Registrar Docente
                    </button>
                </form>
            </div>
            
            <div class="card">
                <h2 class="card-title">Docentes Registrados</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="docentesTable">
                        <?php if (count($docentes) > 0): ?>
                            <?php foreach ($docentes as $docente): ?>
                            <tr>
                                <td><?php echo $docente['id']; ?></td>
                                <td><?php echo htmlspecialchars($docente['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($docente['email']); ?></td>
                                <td><?php echo htmlspecialchars($docente['rol']); ?></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="btn-edit btn-sm" onclick="abrirModalEditar(
                                            <?php echo $docente['id']; ?>, 
                                            '<?php echo htmlspecialchars($docente['nombre'], ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars($docente['email'], ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars($docente['rol'], ENT_QUOTES); ?>'
                                        )">
                                            Editar
                                        </button>
                                        <button class="btn-delete btn-sm" onclick="confirmarEliminacion(<?php echo $docente['id']; ?>)">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay docentes registrados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
        
        <!-- Sección de materias -->
        <section id="materiasSection" class="content-section" style="display: none;">
        <div class="card">
    <h2 class="card-title">Registro de Materias</h2>
    <form method="POST" action="">
        <input type="hidden" name="registrar_materia" value="1">
        <div class="form-group">
            <label class="form-label" for="materiaNombre">Nombre de la materia</label>
            <input type="text" class="form-control" id="materiaNombre" name="nombre" placeholder="Ej. Topicos Avanzados de Programación"required>
        </div>
        <div class="form-group">
            <label class="form-label" for="materiaCodigo">Código</label>
            <input type="text" class="form-control" id="materiaCodigo" name="codigo" placeholder="Ej: PROG-202"required>
        </div>
        <div class="form-group">
            <label class="form-label" for="materiaCreditos">Créditos</label>
            <input type="number" class="form-control" id="materiaCreditos" name="creditos" min="1"  placeholder="Ej: 6"required>
        </div>
        <div class="form-group">
            <label class="form-label" for="materiaDocente">Docente que la imparte</label>
            <select class="form-control" id="materiaDocente" name="docente_id">
                <option value="">Seleccione un docente</option>
                <?php foreach (obtenerDocentesParaSelect() as $docente): ?>
                    <option value="<?php echo $docente['id']; ?>">
                        <?php echo htmlspecialchars($docente['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="registrar_materia" onclick="registrarMateria();">
            Registrar Materia
        </button>
    </form>
</div>
            
<div class="card">
    <h2 class="card-title">Materias Registradas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Créditos</th>
                <th>Docente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (obtenerMateriasConDocentes() as $materia): ?>
            <tr>
                <td><?php echo htmlspecialchars($materia['codigo']); ?></td>
                <td><?php echo htmlspecialchars($materia['nombre']); ?></td>
                <td><?php echo $materia['creditos']; ?></td>
                <td><?php echo $materia['docente_nombre'] ?? 'Sin asignar'; ?></td>
                <td>
                    <button class="btn-edit btn-sm">Editar</button>
                    <button class="btn-delete btn-sm">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
        </section>
        <!-- Modal para editar docente -->
<!-- Modal para editar docente -->
<div id="editarDocenteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Editar Docente</h3>
            <button class="modal-close" onclick="cerrarModalEditar()">&times;</button>
        </div>
        <form id="formEditarDocente" method="POST" action="">
            <input type="hidden" name="editar_docente" value="1">
            <input type="hidden" name="id" id="editarDocenteId">
            <div class="form-group">
                <label class="form-label" for="editarDocenteNombre">Nombre completo</label>
                <input type="text" class="form-control" id="editarDocenteNombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editarDocenteEmail">Correo electrónico</label>
                <input type="email" class="form-control" id="editarDocenteEmail" name="email" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editarDocenteRol">Rol</label>
                <select class="form-control" id="editarDocenteRol" name="rol" required>
                    <option value="Docente">Docente</option>
                    <option value="Administrador">Administrador</option>
                </select>
            </div>
            <div class="form-group" style="margin-top: 24px;">
                <button type="submit" class="btn btn-success" style="margin-right: 8px;">
                    Guardar Cambios
                </button>
                <button type="button" class="btn btn-secondary" onclick="cerrarModalEditar()">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
    </main>
    <script>
    // Theme toggle functionality
    const themeToggle = document.getElementById('themeToggle');
    const icon = themeToggle.querySelector('i');
    
    // Función para mostrar alertas con el tema correcto
    function showAlert(type, message) {
        const isDarkMode = document.body.classList.contains('dark-mode');
        
        Swal.fire({
            title: type === 'success' ? 'Éxito' : 'Error',
            text: message,
            icon: type,
            background: isDarkMode ? '#2d2d2d' : '#ffffff',
            color: isDarkMode ? '#f8f9fa' : '#212529',
            confirmButtonColor: isDarkMode ? '#9b1b30' : '#800020'
        });
    }
    
    // Mostrar mensajes de operaciones
    <?php if (isset($_SESSION['alert'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('<?php echo $_SESSION['alert']['type']; ?>', '<?php echo $_SESSION['alert']['message']; ?>');
        });
        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>
    
    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme') || 
                      (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    
    // Apply saved theme
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        icon.classList.replace('fa-moon', 'fa-sun');
    }
    
    themeToggle.addEventListener('click', () => {
        const wasDarkMode = document.body.classList.contains('dark-mode');
        document.body.classList.toggle('dark-mode');
        
        if (!wasDarkMode) {
    Swal.fire({
        title: 'Modo oscuro detectado',
        text: 'Las alertas se adaptarán al modo oscuro',
        icon: 'info',
        background: '#2d2d2d',
        color: '#f8f9fa',
        confirmButtonColor: '#9b1b30'
    });
}
        
        if (wasDarkMode) {
            icon.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('theme', 'light');
        } else {
            icon.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('theme', 'dark');
        }
    });

    // [El resto de tus funciones permanecen igual...]
    // Tab Navigation, Modal functions, etc...
    
    // Confirmación de eliminación con SweetAlert2
    function confirmarEliminacion(id) {
        const isDarkMode = document.body.classList.contains('dark-mode');
        
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción eliminará al docente permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            background: isDarkMode ? '#2d2d2d' : '#ffffff',
            color: isDarkMode ? '#f8f9fa' : '#212529'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `?eliminar_docente=${id}`;
            }
        });
    }
    function confirmarCierreSesion() {
    const isDarkMode = document.body.classList.contains('dark-mode');
    
    Swal.fire({
        title: 'Cerrar sesión',
        text: '¿Estás seguro de que deseas salir?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: isDarkMode ? '#9b1b30' : '#800020',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar',
        background: isDarkMode ? '#2d2d2d' : '#ffffff',
        color: isDarkMode ? '#f8f9fa' : '#212529'
    }).then((result) => {
        if (result.isConfirmed) {
            // Cerrar sesión directamente
            realizarLogout();
        }
    });
}

function realizarLogout() {
    const isDarkMode = document.body.classList.contains('dark-mode');
    
    // Hacer la petición al servidor para cerrar sesión
    fetch('logout.php')
        .then(response => {
            if (response.ok) {
                // Mostrar confirmación breve y redirigir
                Swal.fire({
                    title: 'Has cerrado sesión',
                    text: '¡Hasta pronto!',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                    background: isDarkMode ? '#2d2d2d' : '#ffffff',
                    color: isDarkMode ? '#f8f9fa' : '#212529',
                    willClose: () => {
                        window.location.href = 'index.php';
                    }
                });
            } else {
                throw new Error('Error al cerrar sesión');
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'No se pudo cerrar la sesión',
                icon: 'error',
                background: isDarkMode ? '#2d2d2d' : '#ffffff',
                color: isDarkMode ? '#f8f9fa' : '#212529'
            });
        });
}
// Abrir modal de edición
// Abrir modal de edición
function abrirModalEditar(id, nombre, email, rol) {
    const modal = document.getElementById("editarDocenteModal");
    document.getElementById("editarDocenteId").value = id;
    document.getElementById("editarDocenteNombre").value = nombre;
    document.getElementById("editarDocenteEmail").value = email;
    document.getElementById("editarDocenteRol").value = rol;
    modal.style.display = "flex";
}

// Cerrar modal de edición
function cerrarModalEditar() {
    const modal = document.getElementById("editarDocenteModal");
    modal.style.display = "none";
}

// Cerrar modal si se hace clic fuera del contenido
window.onclick = function(event) {
    const modal = document.getElementById("editarDocenteModal");
    if (event.target === modal) {
        cerrarModalEditar();
    }
};
document.addEventListener('DOMContentLoaded', function() {
    // Obtener elementos del DOM
    const docentesTab = document.getElementById("docentesTab");
    const materiasTab = document.getElementById("materiasTab");
    const docentesSection = document.getElementById("docentesSection");
    const materiasSection = document.getElementById("materiasSection");

    // Manejar clic en pestaña Docentes
    docentesTab.addEventListener("click", function(e) {
        e.preventDefault();
        // Mostrar sección de docentes y ocultar otras
        docentesSection.style.display = "block";
        materiasSection.style.display = "none";
        
        // Actualizar clases activas
        docentesTab.classList.add("active");
        materiasTab.classList.remove("active");
    });

    // Manejar clic en pestaña Materias
    materiasTab.addEventListener("click", function(e) {
        e.preventDefault();
        // Mostrar sección de materias y ocultar otras
        materiasSection.style.display = "block";
        docentesSection.style.display = "none";
        
        // Actualizar clases activas
        materiasTab.classList.add("active");
        docentesTab.classList.remove("active");
    });
});
</script>

</body>
</html>