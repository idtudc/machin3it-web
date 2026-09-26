<?php
session_start();
if (isset($_SESSION['usuario_activo'])) {
    header("Location: php/admin_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Administrativo - Machin3 IT</title>
    <!-- Actualizamos a v=4.0 para forzar el rediseño -->
    <link rel="stylesheet" href="css/styles.css?v=4.0">
</head>
<body style="background-color: #0f172a;">

    <div class="auth-wrapper">
        <div class="login-box">
            <h2 class="header-title">Acceso al Sistema</h2>
            <p style="color: #64748b; font-size: 14px; margin-bottom: 25px;">Área exclusiva para personal de Machin3 IT.</p>
            
            <form action="php/procesar_login.php" method="POST">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" required placeholder="Ingresa tu usuario">
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="contrasena" required placeholder="••••••••">
                </div>
                <button type="submit" class="btn-submit">Iniciar Sesión</button>
            </form>
            
            <!-- Aquí está restaurado tu enlace de registro -->
            <a href="registro.php" style="display: block; text-align: center; margin-top: 15px; font-size: 14px; font-weight: bold; color: #3b82f6; text-decoration: none;">Registrar nuevo usuario</a>
            
            <a href="index.php" class="back-home">← Volver al sitio público</a>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
</body>
</html>