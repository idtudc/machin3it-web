<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Registro de Solicitudes (solicitud.php) - PA3 FINAL
 * -------------------------------------------------------------------------
 */
$page = 'solicitud';
require_once 'php/conexion.php';

$mensaje_exito = "";
$mensaje_error = "";
$codigo_generado = "";

// 1. PROCESAR EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $dni = $_POST['dni'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $equipo = $_POST['equipo'] ?? '';
    $fecha_ingreso = $_POST['fecha_ingreso'] ?? date('Y-m-d');
    $estado_ingreso = $_POST['estado_ingreso'] ?? '';
    $id_servicio = $_POST['id_servicio'] ?? '';
    $precio_estimado = $_POST['precio_estimado'] ?? 0;
    $descripcion = $_POST['descripcion'] ?? '';

    if (!empty($nombre) && !empty($correo) && !empty($equipo) && !empty($id_servicio) && !empty($descripcion)) {
        try {
            // A. Generar el código SRV-XXXX
            $stmt_max = $conn->query("SELECT MAX(id_solicitud) AS max_id FROM solicitudes");
            $row_max = $stmt_max->fetch();
            $next_id = ($row_max['max_id'] ? $row_max['max_id'] : 0) + 1;
            $codigo = 'SRV-' . str_pad($next_id, 4, '0', STR_PAD_LEFT);

            // B. Insertar todos los campos del diseño en MySQL
            $sql_insert = "INSERT INTO solicitudes 
                           (codigo, id_servicio, nombre_cliente, correo_cliente, dni, telefono, equipo, estado_ingreso, precio_estimado, descripcion, fecha, id_estado) 
                           VALUES 
                           (:codigo, :id_servicio, :nombre, :correo, :dni, :telefono, :equipo, :estado_ingreso, :precio_estimado, :descripcion, :fecha, 1)";
            
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->execute([
                ':codigo' => $codigo,
                ':id_servicio' => $id_servicio,
                ':nombre' => $nombre,
                ':correo' => $correo,
                ':dni' => $dni,
                ':telefono' => $telefono,
                ':equipo' => $equipo,
                ':estado_ingreso' => $estado_ingreso,
                ':precio_estimado' => $precio_estimado,
                ':descripcion' => $descripcion,
                ':fecha' => $fecha_ingreso
            ]);

            $mensaje_exito = "¡Ticket generado exitosamente!";
            $codigo_generado = $codigo;

        } catch (PDOException $e) {
            $mensaje_error = "Error al registrar la solicitud en la base de datos.";
        }
    } else {
        $mensaje_error = "Por favor, completa los campos obligatorios.";
    }
}

// 2. OBTENER SERVICIOS Y PRECIOS DESDE MYSQL
$servicios = [];
try {
    $stmt_srv = $conn->query("SELECT id_servicio, nombre, categoria, precio_referencial FROM servicios WHERE estado = 'Activo' ORDER BY categoria, nombre");
    $servicios = $stmt_srv->fetchAll();
} catch (PDOException $e) {
    $mensaje_error = "Error al cargar los servicios.";
}

$id_srv_url = $_GET['id_srv'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Servicio - Machin3 IT</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .alert-success { background: #d4edda; color: #155724; padding: 20px; border-radius: 5px; text-align: center; margin-bottom: 20px; border: 1px solid #c3e6cb;}
        .alert-error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .codigo-seguimiento { font-size: 28px; font-weight: bold; color: #0f2b46; letter-spacing: 2px; margin: 15px 0; display: block; }
        .btn-seguimiento { display: inline-block; background-color: #1a4a76; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px; margin-top: 10px;}
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <div class="ticket-box">
            <h2 class="header-title" style="margin-top: 0;">Registrar Nueva Solicitud (Ticket)</h2>
            
            <?php if (!empty($mensaje_error)): ?>
                <div class="alert-error"><?= htmlspecialchars($mensaje_error) ?></div>
            <?php endif; ?>

            <?php if (!empty($mensaje_exito)): ?>
                <div class="alert-success">
                    <h3><?= htmlspecialchars($mensaje_exito) ?></h3>
                    <p>Guarda este código para consultar el estado de tu equipo:</p>
                    <span class="codigo-seguimiento"><?= htmlspecialchars($codigo_generado) ?></span>
                    <a href="seguimiento.php" class="btn-seguimiento">Ir a Seguimiento</a>
                </div>
            <?php else: ?>

                <form action="solicitud.php" method="POST">
                    
                    <!-- Fila 1: Datos Personales (Mismo diseño de la imagen) -->
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">Nombre del Cliente *:</label>
                            <input type="text" name="nombre" class="form-input" placeholder="Ej. Michael Mamani" required>
                        </div>
                        <div class="form-col">
                            <label class="form-label">DNI:</label>
                            <input type="text" name="dni" class="form-input" placeholder="8 dígitos" pattern="\d{8}" maxlength="8">
                        </div>
                        <div class="form-col">
                            <label class="form-label">Teléfono / WhatsApp:</label>
                            <input type="text" name="telefono" class="form-input" placeholder="Ej. 987654321">
                        </div>
                    </div>

                    <!-- Fila 2: Correo (Añadido) y Equipo -->
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">Correo Electrónico *:</label>
                            <input type="email" name="correo" class="form-input" placeholder="Ej. cliente@correo.com" required>
                        </div>
                        <div class="form-col-2">
                            <label class="form-label">Tipo y Modelo de Equipo *:</label>
                            <input type="text" name="equipo" class="form-input" placeholder="Ej. Laptop HP Pavilion 15" required>
                        </div>
                    </div>

                    <!-- Fila 3: Estado Físico y Fecha -->
                    <div class="form-row">
                        <div class="form-col-2">
                            <label class="form-label">Detalles y Estado de Ingreso:</label>
                            <textarea name="estado_ingreso" rows="2" class="form-input" placeholder="Ej. Ingresa con pantalla rayada, sin cargador..."></textarea>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Fecha de Ingreso *:</label>
                            <!-- Autocompletado con la fecha de hoy por defecto -->
                            <input type="date" name="fecha_ingreso" class="form-input" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>

                    <!-- Fila 4: Servicio y Precio Estimado -->
                    <div class="form-row">
                        <div class="form-col-2">
                            <label class="form-label">Servicio Requerido *:</label>
                            <select id="select_servicio" name="id_servicio" class="form-input" required>
                                <option value="" data-precio="">Seleccione un servicio del catálogo...</option>
                                <?php foreach ($servicios as $srv): 
                                    $selected = ($srv['id_servicio'] == $id_srv_url) ? 'selected' : ''; 
                                ?>
                                    <!-- Guardamos el precio en data-precio para leerlo con JS -->
                                    <option value="<?= $srv['id_servicio'] ?>" data-precio="<?= $srv['precio_referencial'] ?>" <?= $selected ?>>
                                        [<?= htmlspecialchars($srv['categoria']) ?>] - <?= htmlspecialchars($srv['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Precio Estimado (S/):</label>
                            <input type="number" id="input_precio" name="precio_estimado" class="form-input" placeholder="Ej. 80.00" step="0.01" min="0">
                        </div>
                    </div>

                    <!-- Fila 5: Descripción Final -->
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">Descripción del Problema Reportado *:</label>
                            <textarea name="descripcion" rows="3" class="form-input" placeholder="Detalle la falla que reporta el cliente..." required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit" style="margin-top: 20px;">GENERAR TICKET DE SERVICIO</button>
                </form>

            <?php endif; ?>
        </div>
    </div>

    <!-- Script para autocompletar el precio cuando se selecciona un servicio -->
    <script>
        document.getElementById('select_servicio').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var precio = selectedOption.getAttribute('data-precio');
            var inputPrecio = document.getElementById('input_precio');
            
            if(precio) {
                inputPrecio.value = parseFloat(precio).toFixed(2);
            } else {
                inputPrecio.value = '';
            }
        });

        // Disparar el evento al cargar la página por si viene un ID de servicio por URL
        window.addEventListener('load', function() {
            var select = document.getElementById('select_servicio');
            if (select.value !== "") {
                select.dispatchEvent(new Event('change'));
            }
        });
    </script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>