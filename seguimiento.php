<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Seguimiento de Estado de Equipos (seguimiento.php)
 * Descripción: Permite a los clientes consultar de forma interactiva el progreso 
 * y estado actual de la reparación de su equipo ingresando el código único de ticket,
 * utilizando componentes y estilos modulares externos.
 * Entorno: XAMPP (PHP / MySQL)
 * -------------------------------------------------------------------------
 */
$page = 'seguimiento'; // Indicador de página activa para la barra modular
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Equipo - Machin3 IT</title>
    <!-- Hoja de estilos global externa -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Inclusión de la barra de navegación modular -->
    <?php include 'includes/header.php'; ?>

    <!-- Contenido principal -->
    <div class="container" style="max-width: 600px;">
        <div style="background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.04); border-top: 4px solid #1e293b;">
            <h2 class="header-title">Seguimiento de Estado de Equipo</h2>
            <p style="color: #64748b; text-align: center; font-size: 14px; margin-top: 10px;">Ingrese el código de su ticket para consultar el progreso en el taller.</p>
            
            <!-- Formulario de búsqueda por código único -->
            <form action="" method="GET" style="display: flex; gap: 10px; margin-top: 20px;">
                <input type="text" name="codigo" placeholder="Ej. SRV-0001" style="flex: 1; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 16px; text-transform: uppercase;" required>
                <button type="submit" style="padding: 10px 20px; background-color: #0f172a; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; transition: 0.3s;">Consultar</button>
            </form>

            <!-- Tarjeta de Resultado de Ejemplo (Mockup visual para validación académica PA2) -->
            <div style="margin-top: 25px; padding: 20px; border-radius: 6px; background-color: #f1f5f9; border: 1px solid #cbd5e1;">
                <h3 style="color: #0f172a; margin-top: 0;">Detalles del Ticket: <span style="color: #0f172a;">SRV-0047</span></h3>
                <p><strong>Cliente:</strong> Michael Mamani</p>
                <p><strong>Equipo:</strong> Laptop HP Pavilion 15</p>
                <p><strong>Servicio:</strong> Limpieza profunda y optimización</p>
                <p><strong>Fecha de Ingreso:</strong> 12/09/2026</p>
                <div>
                    <strong>Estado Actual:</strong><br>
                    <span style="display: inline-block; padding: 6px 12px; background-color: #d97706; color: white; font-weight: bold; border-radius: 20px; font-size: 14px; margin-top: 10px;">En reparación</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>