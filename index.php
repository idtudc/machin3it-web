<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Página Principal (index.php)
 * Descripción: Vista de bienvenida, presentación corporativa, trayectoria,
 * ubicación estratégica y partners tecnológicos del taller, adaptada con
 * la hoja de estilos global externa y el menú de navegación modular.
 * Entorno: XAMPP (PHP / MySQL)
 * -------------------------------------------------------------------------
 */
$page = 'index'; // Indicador de página activa para la barra modular
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Machin3 IT - Soluciones y Soporte Tecnológico en Arequipa</title>
    <!-- Hoja de estilos global externa -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Inclusión de la barra de navegación modular -->
    <?php include 'includes/header.php'; ?>

    <!-- Sección Hero con Texto Limpio y Botones Uniformes -->
    <div class="hero">
        <div class="hero-brand">Machin3 IT</div>
        <h1>Tu Socio en Soluciones de TI</h1>
        <p>Especialistas en soporte técnico avanzado, mantenimiento de hardware, redes y consultoría tecnológica en Arequipa desde el año 2010.</p>
        <div class="hero-btns">
            <a href="servicios.php" class="btn-outline">Ver Servicios</a>
            <a href="solicitud.php" class="btn-outline">Registrar Solicitud</a>
        </div>
    </div>

    <!-- Contenido Institucional -->
    <div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
        
        <div class="info-grid">
            <div class="info-card">
                <h3>Nuestra Trayectoria</h3>
                <p>Operamos de forma independiente desde el <strong>año 2010</strong>, brindando soluciones informáticas robustas tanto para usuarios particulares como para el sector empresarial de la región.</p>
            </div>
            <div class="info-card">
                <h3>Ubicación Estratégica</h3>
                <p>Radicamos y brindamos atención personalizada directamente en el tradicional distrito de <strong>Yanahuara, Arequipa</strong>, garantizando respuestas rápidas y soporte físico especializado.</p>
            </div>
        </div>

        <!-- Marcas y Partners Tecnológicos -->
        <div class="partners-section">
            <h3 style="color: var(--primary-dark); margin-top: 0;">Marcas y Partners de Confianza</h3>
            <p style="color: #64748b; font-size: 14px;">Trabajamos con componentes y repuestos originales compatibles con las principales marcas del mercado global:</p>
            <div class="partners-grid">
                <div class="partner-badge">Lenovo</div>
                <div class="partner-badge">HP</div>
                <div class="partner-badge">ASUS</div>
                <div class="partner-badge">Epson</div>
                <div class="partner-badge">TP-Link</div>
            </div>
        </div>

    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2026 Machin3 IT — Yanahuara, Arequipa, Perú. Todos los derechos reservados by Mike.<br>Entorno de desarrollo: XAMPP / PHP / MySQL</p>
    </footer>

</body>
</html>