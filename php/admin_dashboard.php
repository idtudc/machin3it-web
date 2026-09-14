<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Panel de Control Administrativo (admin_dashboard.php)
 * Descripción: Interfaz privada para administradores autenticados que gestionan 
 * las operaciones del taller, estadísticas rápidas y accesos de control, utilizando 
 * los estilos globales externos.
 * Entorno: XAMPP (PHP / MySQL)
 * Ubicación: C:\xampp\htdocs\machin3it-web\php\admin_dashboard.php
 * -------------------------------------------------------------------------
 */
session_start();
if (!isset($_SESSION['usuario_activo'], $_SESSION['rol'])
    || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}
$admin = $_SESSION['usuario_activo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo - Machin3 IT</title>
    <!-- Hoja de estilos global externa -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <!-- Barra superior del panel -->
    <div class="navbar">
        <h2>Machin3 IT — Panel de Control</h2>
        <div class="admin-nav-controls">
            <a href="../index.php" class="nav-text">Inicio</a>
            <span>Admin: <b><?php echo htmlspecialchars($admin); ?></b></span>
            <a href="logout.php" class="btn-login" style="padding: 6px 14px; font-size: 14px; text-decoration: none;">Cerrar Sesión</a>
        </div>
    </div>

    <!-- Contenido principal del Dashboard -->
    <div class="container" style="max-width: 1000px;">
        
        <!-- Panel de Bienvenida -->
        <div class="dashboard-panel welcome-panel">
            <h2>Bienvenido al Sistema de Gestión Técnica</h2>
            <p style="color: #64748b; margin-bottom: 0;">Desde aquí puedes supervisar el estado de los equipos en el taller, registrar tickets y administrar los servicios de Machin3 IT.</p>
            <p style="font-size:12px; color:#94a3b8; margin-top:10px;">Los indicadores mostrados en esta etapa son demostrativos; la consulta dinámica de solicitudes corresponde a la siguiente fase (PA3).</p>
        </div>

        <!-- Tarjetas de Resumen Rápido -->
        <div class="stats-grid">
            <div class="stat-card blue">
                <h3>Equipos en Taller</h3>
                <p>12</p>
            </div>
            <div class="stat-card orange">
                <h3>En Reparación / Diagnóstico</h3>
                <p>5</p>
            </div>
            <div class="stat-card green">
                <h3>Listos para Entrega</h3>
                <p>3</p>
            </div>
        </div>

        <!-- Accesos directos administrativos -->
        <div class="dashboard-panel actions-panel">
            <h3 class="actions-title">Acciones Rápidas</h3>
            <div class="actions-grid">
                <a href="../solicitud.php" class="action-btn dark">+ Registrar Nuevo Ticket</a>
                <a href="../servicios.php" class="action-btn slate">Ver Servicios</a>
                <a href="../cotizador.php" class="action-btn green">Abrir Cotizador</a>
            </div>
        </div>

    </div>

</body>
</html>