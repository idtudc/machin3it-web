<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit();
}

$usuario_form = trim($_POST['usuario'] ?? '');
$contrasena_form = $_POST['contrasena'] ?? '';

if ($usuario_form === '' || $contrasena_form === '') {
    header('Location: ../login.php?error=datos');
    exit();
}

try {
    $sql = "SELECT id_usuario, nombre, contrasena, rol
            FROM usuarios
            WHERE usuario = :usuario
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':usuario' => $usuario_form]);
    $user = $stmt->fetch();

    if ($user && $user['rol'] === 'Administrador'
        && password_verify($contrasena_form, $user['contrasena'])) {

        // Evita reutilizar el identificador de sesión previo.
        session_regenerate_id(true);

        $_SESSION['usuario_activo'] = $user['nombre'];
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['rol'] = $user['rol'];

        header('Location: admin_dashboard.php');
        exit();
    }

    header('Location: ../login.php?error=credenciales');
    exit();

} catch (PDOException $e) {
    header('Location: ../login.php?error=servidor');
    exit();
}
?>
