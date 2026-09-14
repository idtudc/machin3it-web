<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Acceso Administrativo (login.php)
 * Descripción: Interfaz de autenticación exclusiva para administradores,
 * unificada con los estilos globales y enlace de retorno al inicio.
 * Entorno: XAMPP (PHP / MySQL)
 * -------------------------------------------------------------------------
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema - Machin3 IT</title>
    <!-- Hoja de estilos global externa (código limpio) -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Envoltorio para centrar la caja -->
    <div class="auth-wrapper">
        <div class="login-box">
            <h2 class="header-title">Ingreso al Sistema</h2>
            <p style="text-align:center; color:#64748b; font-size:13px;">Acceso exclusivo para administradores registrados.</p>
            
            <?php if (isset($_GET['error'])): ?>
                <p style="color:#b91c1c; background:#fef2f2; padding:10px; border-radius:6px; font-size:13px; text-align:center;">
                    <?php
                    $mensajes = [
                        'datos' => 'Complete usuario y contraseña.',
                        'credenciales' => 'Usuario o contraseña incorrectos.',
                        'servidor' => 'No fue posible procesar el acceso. Intente nuevamente.'
                    ];
                    echo htmlspecialchars($mensajes[$_GET['error']] ?? 'No fue posible iniciar sesión.');
                    ?>
                </p>
            <?php elseif (isset($_GET['registro']) && $_GET['registro'] === 'ok'): ?>
                <p style="color:#166534; background:#f0fdf4; padding:10px; border-radius:6px; font-size:13px; text-align:center;">
                    Administrador registrado correctamente. Ya puede iniciar sesión.
                </p>
            <?php endif; ?>

            <form action="php/procesar_login.php" method="POST">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" placeholder="Ej. admin" required>
                </div>
                
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="contrasena" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-submit">Ingresar</button>
            </form>

            <a href="registro.php" class="back-home" style="margin-top: 15px;">Registrar nuevo usuario</a>
            <a href="index.php" class="back-home">← Volver a la página principal</a>
        </div>
    </div>

</body>
</html>