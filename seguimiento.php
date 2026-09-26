<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Seguimiento de Estado de Equipos (seguimiento.php) - PA3 FULL
 * -------------------------------------------------------------------------
 */
$page = 'seguimiento';
require_once 'php/conexion.php';

$ticket = null;
$error = "";

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {
    $codigo_buscado = trim(strtoupper($_GET['codigo']));

    try {
        // Actualizamos la consulta para traer TODOS los campos registrados
        $sql = "SELECT s.codigo, s.nombre_cliente, s.correo_cliente, s.dni, s.telefono, 
                       s.equipo, s.estado_ingreso, s.descripcion, s.precio_estimado, s.fecha, s.id_estado, 
                       srv.nombre AS servicio, e.nombre_estado
                FROM solicitudes s
                INNER JOIN servicios srv ON s.id_servicio = srv.id_servicio
                INNER JOIN estados e ON s.id_estado = e.id_estado
                WHERE s.codigo = :codigo LIMIT 1";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([':codigo' => $codigo_buscado]);
        $ticket = $stmt->fetch();

        if (!$ticket) {
            $error = "No se encontró ningún ticket con el código ingresado.";
        }
    } catch (PDOException $e) {
        $error = "Error al consultar la base de datos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Equipo - Machin3 IT</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .ticket-section-title {
            color: #1e293b; 
            border-bottom: 2px solid #e2e8f0; 
            padding-bottom: 5px; 
            margin-top: 20px; 
            margin-bottom: 15px; 
            font-size: 16px; 
            font-weight: bold;
        }
        .ticket-data-grid {
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 10px; 
            font-size: 14px;
        }
        .ticket-data-full {
            grid-column: 1 / -1; 
            background: #e2e8f0; 
            padding: 10px; 
            border-radius: 4px; 
            font-size: 14px;
        }
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container" style="max-width: 700px;">
        <div style="background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.04); border-top: 4px solid #1e293b;">
            <h2 class="header-title">Seguimiento de Estado de Equipo</h2>
            <p style="color: #64748b; text-align: center; font-size: 14px; margin-top: 10px;">Ingrese el código de su ticket para consultar el progreso en el taller.</p>
            
            <form action="seguimiento.php" method="GET" style="display: flex; gap: 10px; margin-top: 20px;">
                <input type="text" name="codigo" placeholder="Ej. SRV-0001" value="<?= isset($_GET['codigo']) ? htmlspecialchars($_GET['codigo']) : '' ?>" style="flex: 1; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 16px; text-transform: uppercase;" required>
                <button type="submit" style="padding: 10px 20px; background-color: #0f172a; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; transition: 0.3s;">Consultar</button>
            </form>

            <?php if (!empty($error)): ?>
                <div style="margin-top: 25px; padding: 15px; background-color: #fee2e2; color: #b91c1c; border: 1px solid #f87171; border-radius: 6px; text-align: center;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php elseif ($ticket): ?>
                
                <div style="margin-top: 25px; padding: 25px; border-radius: 6px; background-color: #f8fafc; border: 1px solid #cbd5e1;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="color: #0f172a; margin: 0; font-size: 22px;">Ticket: <span style="color: #2563eb;"><?= htmlspecialchars($ticket['codigo']) ?></span></h3>
                        <span style="font-size: 13px; color: #64748b; font-weight: bold;">Ingresado: <?= date('d/m/Y', strtotime($ticket['fecha'])) ?></span>
                    </div>

                    <!-- ESTADO ACTUAL (Destacado) -->
                    <div style="text-align: center; margin: 20px 0; padding: 15px; background: white; border-radius: 6px; border: 1px dashed #cbd5e1;">
                        <strong style="display: block; color: #64748b; margin-bottom: 5px; text-transform: uppercase; font-size: 12px;">Estado Actual de la Solicitud</strong>
                        <?php
                            $color_estado = '#d97706'; 
                            if ($ticket['id_estado'] == 1) $color_estado = '#3b82f6'; 
                            if ($ticket['id_estado'] == 4) $color_estado = '#10b981'; 
                            if ($ticket['id_estado'] == 5) $color_estado = '#14b8a6'; 
                        ?>
                        <span style="display: inline-block; padding: 8px 16px; background-color: <?= $color_estado ?>; color: white; font-weight: bold; border-radius: 20px; font-size: 16px;">
                            <?= htmlspecialchars($ticket['nombre_estado']) ?>
                        </span>
                    </div>

                    <!-- DATOS DEL CLIENTE -->
                    <div class="ticket-section-title">Datos del Cliente</div>
                    <div class="ticket-data-grid">
                        <div><strong>Nombre:</strong> <?= htmlspecialchars($ticket['nombre_cliente']) ?></div>
                        <div><strong>DNI:</strong> <?= htmlspecialchars($ticket['dni'] ?: 'No registrado') ?></div>
                        <div><strong>Correo:</strong> <?= htmlspecialchars($ticket['correo_cliente']) ?></div>
                        <div><strong>Teléfono:</strong> <?= htmlspecialchars($ticket['telefono'] ?: 'No registrado') ?></div>
                    </div>

                    <!-- DATOS DEL EQUIPO -->
                    <div class="ticket-section-title">Recepción del Equipo</div>
                    <div class="ticket-data-grid">
                        <div style="grid-column: 1 / -1;"><strong>Modelo de Equipo:</strong> <?= htmlspecialchars($ticket['equipo']) ?></div>
                        <div class="ticket-data-full">
                            <strong>Estado físico al ingreso:</strong><br>
                            <?= nl2br(htmlspecialchars($ticket['estado_ingreso'] ?: 'Sin observaciones físicas registradas.')) ?>
                        </div>
                        <div class="ticket-data-full">
                            <strong>Falla reportada por el cliente:</strong><br>
                            <?= nl2br(htmlspecialchars($ticket['descripcion'])) ?>
                        </div>
                    </div>

                    <!-- DATOS DEL SERVICIO -->
                    <div class="ticket-section-title">Servicio a Realizar</div>
                    <div class="ticket-data-grid">
                        <div><strong>Servicio Solicitado:</strong> <br><?= htmlspecialchars($ticket['servicio']) ?></div>
                        <div><strong>Precio Estimado:</strong> <br>S/ <?= number_format($ticket['precio_estimado'], 2) ?></div>
                    </div>

                </div>
                
            <?php endif; ?>

        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>