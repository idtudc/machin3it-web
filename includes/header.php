<?php
/**
 * Componente Reutilizable: Barra de Navegación Superior
 * Ubicación: C:\xampp\htdocs\machin3it-web\includes\header.php
 */
?>
<div class="navbar">
    <h2><a href="index.php">Machin3 IT</a></h2>
    <nav class="nav-links">
        <a href="index.php" class="<?php echo ($page == 'index') ? 'active' : ''; ?>">Inicio</a>
        <a href="servicios.php" class="<?php echo ($page == 'servicios') ? 'active' : ''; ?>">Servicios</a>
        <a href="solicitud.php" class="<?php echo ($page == 'solicitud') ? 'active' : ''; ?>">Solicitud</a>
        <a href="seguimiento.php" class="<?php echo ($page == 'seguimiento') ? 'active' : ''; ?>">Seguimiento</a>
        <a href="cotizador.php" class="<?php echo ($page == 'cotizador') ? 'active' : ''; ?>">Cotizador</a>
        <a href="login.php" class="btn-login">Login</a>
    </nav>
</div>