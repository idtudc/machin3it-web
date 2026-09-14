<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Registro de Nuevos Usuarios (registro.php)
 * Descripción: Interfaz para crear nuevas cuentas de acceso, cumpliendo 
 * con el requisito de almacenar nuevos usuarios en la BD.
 * -------------------------------------------------------------------------
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario - Machin3 IT</title>
    <!-- Hoja de estilos global externa (código limpio) -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <!-- Envoltorio para centrar la caja -->
    <div class="auth-wrapper">
        <div class="login-box">
            <h2 class="header-title">Registrar Administrador</h2>
            <p style="text-align:center; color:#64748b; font-size:13px;">Registro de una cuenta administrativa para el sistema.</p>
            
            <?php if (isset($_GET['error'])): ?>
                <p style="color:#b91c1c; background:#fef2f2; padding:10px; border-radius:6px; font-size:13px; text-align:center;">
                    <?php
                    $mensajes = [
                        'datos' => 'Todos los campos son obligatorios.',
                        'password' => 'La contraseña debe tener al menos 6 caracteres.',
                        'duplicado' => 'El nombre de usuario ya está registrado.',
                        'servidor' => 'No fue posible registrar la cuenta.'
                    ];
                    echo htmlspecialchars($mensajes[$_GET['error']] ?? 'No fue posible registrar la cuenta.');
                    ?>
                </p>
            <?php endif; ?>

            <form action="php/procesar_registro.php" method="POST">
                <div class="form-group">
                    <label>Nombre Completo:</label>
                    <input type="text" name="nombre" placeholder="Ej. Michael Mamani" required>
                </div>

                <div class="form-group">
                    <label>Nombre de Usuario (Login):</label>
                    <input type="text" name="usuario" placeholder="Ej. mmamani" required>
                </div>
                
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="contrasena" placeholder="Mínimo 6 caracteres" minlength="6" required>
                </div>

                <button type="submit" class="btn-submit">Registrar Usuario</button>
            </form>

            <a href="login.php" class="back-home">¿Ya tienes cuenta? Inicia sesión aquí</a>
        </div>
    </div>

</body>
</html>