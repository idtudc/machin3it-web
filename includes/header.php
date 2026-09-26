<div class="navbar" style="background-color: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-bottom: 3px solid #f97316;">
    <div class="logo">
        <a href="index.php" style="text-decoration: none; display: flex; align-items: center;">
            <img src="img/logo.png" alt="Logo Machin3 IT" style="height: 50px; width: auto; object-fit: contain;">
        </a>
    </div>
    <div class="nav-links" style="display: flex; gap: 15px; align-items: center;">
        <?php 
            function active($current_page, $page_name) {
                return (isset($current_page) && $current_page === $page_name) ? 'active' : '';
            }
        ?>
        
        <div class="dropdown">
            <a href="index.php" class="dropbtn <?= active($page, 'inicio') ?>">Inicio ▼</a>
            <div class="dropdown-content">
                <a href="index.php#nosotros">Quiénes Somos</a>
                <a href="index.php#identidad">Misión y Visión</a>
                <a href="index.php#valores">Nuestros Valores</a>
                <a href="index.php#como-funciona">Cómo Funciona</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="servicios.php" class="dropbtn <?= active($page, 'servicios') ?>">Servicios ▼</a>
            <div class="dropdown-content">
                <a href="servicios.php?cat=Mantenimiento">Mantenimiento</a>
                <a href="servicios.php?cat=Hardware">Hardware & Ensamblaje</a>
                <a href="servicios.php?cat=Software">Software y Respaldos</a>
                <a href="servicios.php?cat=Redes_Seguridad">Redes y Seguridad</a>
                <a href="servicios.php?cat=Consultoria">Consultoría IT</a>
            </div>
        </div>

        <a href="solicitud.php" class="<?= active($page, 'solicitud') ?>">Registrar Ticket</a>
        <a href="seguimiento.php" class="<?= active($page, 'seguimiento') ?>">Seguimiento</a>
        <a href="cotizador.php" class="<?= active($page, 'cotizador') ?>">Cotizador</a>
        <a href="contacto.php" class="<?= active($page, 'contacto') ?>">Contacto</a>
        
        <a href="login.php" class="btn-login" style="margin-left: 15px; border-radius: 4px; padding: 8px 16px;">Admin Login</a>
    </div>
</div>