<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Panel de Control Administrativo (admin_dashboard.php)
 * -------------------------------------------------------------------------
 */
session_start();
if (!isset($_SESSION['usuario_activo'], $_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

$admin = $_SESSION['usuario_activo'];
require_once 'conexion.php';

$mensaje = "";

// Actualizar estado del ticket
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'actualizar_estado') {
    $id_solicitud = $_POST['id_solicitud'];
    $nuevo_estado = $_POST['nuevo_estado'];

    try {
        $stmtUpdate = $conn->prepare("UPDATE solicitudes SET id_estado = :estado WHERE id_solicitud = :id");
        $stmtUpdate->execute([':estado' => $nuevo_estado, ':id' => $id_solicitud]);
        $mensaje = "✅ El estado del ticket se actualizó correctamente.";
    } catch (PDOException $e) {
        $mensaje = "❌ Error al actualizar el ticket.";
    }
}

// Estadísticas reales
try {
    $stmtTaller = $conn->query("SELECT COUNT(*) FROM solicitudes WHERE id_estado != 5");
    $total_taller = $stmtTaller->fetchColumn();

    $stmtProceso = $conn->query("SELECT COUNT(*) FROM solicitudes WHERE id_estado IN (2, 3)");
    $total_proceso = $stmtProceso->fetchColumn();

    $stmtListos = $conn->query("SELECT COUNT(*) FROM solicitudes WHERE id_estado = 4");
    $total_listos = $stmtListos->fetchColumn();

    $stmtEstados = $conn->query("SELECT * FROM estados");
    $lista_estados = $stmtEstados->fetchAll();

    $stmtTickets = $conn->query("SELECT s.id_solicitud, s.codigo, s.nombre_cliente, s.equipo, s.fecha, s.id_estado, 
                                        e.nombre_estado, srv.nombre AS servicio 
                                 FROM solicitudes s
                                 INNER JOIN estados e ON s.id_estado = e.id_estado
                                 INNER JOIN servicios srv ON s.id_servicio = srv.id_servicio
                                 ORDER BY s.id_solicitud DESC");
    $tickets = $stmtTickets->fetchAll();

} catch (PDOException $e) {
    $mensaje = "Error al conectar con la base de datos.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo - Machin3 IT</title>
    <!-- Actualizado para asegurar la carga correcta de CSS -->
    <link rel="stylesheet" href="../css/styles.css?v=5.0">
</head>
<body>

    <!-- Barra superior oscura reparada -->
    <div class="navbar" style="background-color: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #f97316;">
        <div class="logo">
            <a href="../index.php" style="text-decoration: none; color: white; font-size: 24px; font-weight: bold; letter-spacing: 0.5px;">
                Machin3 <span style="color: #3b82f6;">IT</span>
            </a>
        </div>
        <div class="admin-nav-controls" style="display: flex; gap: 15px; align-items: center;">
            <a href="../index.php" class="nav-text" style="color: #cbd5e1; text-decoration: none;">Ver Sitio Público</a>
            <span style="color: white; margin: 0 15px;">Admin: <b><?php echo htmlspecialchars($admin); ?></b></span>
            <a href="logout.php" class="btn-login" style="background-color: #f97316; color: white; padding: 8px 16px; font-size: 14px; text-decoration: none; border-radius: 4px; font-weight: bold;">Cerrar Sesión</a>
        </div>
    </div>

    <div class="admin-container">
        
        <?php if (!empty($mensaje)): ?>
            <div class="alert-info" style="background: #e0f2fe; color: #0369a1; padding: 15px; border-radius: 6px; margin-bottom: 20px; text-align: center; border: 1px solid #bae6fd; font-weight: bold;"><?= $mensaje ?></div>
        <?php endif; ?>

        <!-- Tarjetas de Resumen -->
        <div class="stats-grid">
            <div class="stat-card blue">
                <h3>Equipos en Taller</h3>
                <p><?= $total_taller ?></p>
            </div>
            <div class="stat-card orange">
                <h3>En Diagnóstico / Rep.</h3>
                <p><?= $total_proceso ?></p>
            </div>
            <div class="stat-card green">
                <h3>Listos para Entrega</h3>
                <p><?= $total_listos ?></p>
            </div>
        </div>

        <!-- Acciones Rápidas -->
        <div class="dashboard-panel actions-panel" style="margin-top: 20px;">
            <div class="actions-grid">
                <a href="../solicitud.php" class="action-btn dark">+ Registrar Nuevo Ticket</a>
                <a href="../servicios.php" class="action-btn slate">Ver Catálogo</a>
                <a href="../cotizador.php" class="action-btn green">Abrir Cotizador</a>
            </div>
        </div>

        <!-- Tabla de Gestión -->
        <div class="table-wrapper">
            <div style="padding: 20px; border-bottom: 1px solid #e2e8f0;">
                <h3 style="margin: 0; color: #1e293b;">Gestión de Solicitudes Técnicas</h3>
            </div>
            
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Equipo</th>
                        <th>Estado Actual</th>
                        <th>Acción (Actualizar)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($tickets) > 0): ?>
                        <?php foreach ($tickets as $t): ?>
                            <tr>
                                <td><strong style="color: #2563eb;"><?= htmlspecialchars($t['codigo']) ?></strong></td>
                                <td><?= date('d/m/Y', strtotime($t['fecha'])) ?></td>
                                <td><?= htmlspecialchars($t['nombre_cliente']) ?></td>
                                <td>
                                    <?= htmlspecialchars($t['equipo']) ?><br>
                                    <small style="color: #64748b;"><?= htmlspecialchars($t['servicio']) ?></small>
                                </td>
                                <td>
                                    <?php 
                                        $badge_class = 'bg-orange';
                                        if ($t['id_estado'] == 1) $badge_class = 'bg-blue';
                                        if ($t['id_estado'] == 4) $badge_class = 'bg-green';
                                        if ($t['id_estado'] == 5) $badge_class = 'bg-teal';
                                    ?>
                                    <span class="badge <?= $badge_class ?>"><?= htmlspecialchars($t['nombre_estado']) ?></span>
                                </td>
                                <td>
                                    <form method="POST" action="admin_dashboard.php" class="form-update">
                                        <input type="hidden" name="accion" value="actualizar_estado">
                                        <input type="hidden" name="id_solicitud" value="<?= $t['id_solicitud'] ?>">
                                        
                                        <select name="nuevo_estado" class="select-estado" required>
                                            <?php foreach ($lista_estados as $est): ?>
                                                <?php $selected = ($est['id_estado'] == $t['id_estado']) ? 'selected' : ''; ?>
                                                <option value="<?= $est['id_estado'] ?>" <?= $selected ?>>
                                                    <?= htmlspecialchars($est['nombre_estado']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                        <button type="submit" class="btn-update">Guardar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 30px; color: #64748b;">No hay tickets registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Se incluye el pie de página centrado en el panel de control -->
    <?php include '../includes/footer.php'; ?>

</body>
</html>