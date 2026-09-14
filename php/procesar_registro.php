<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../registro.php');
    exit();
}

$nombre = trim($_POST['nombre'] ?? '');
$usuario = trim($_POST['usuario'] ?? '');
$contrasena = $_POST['contrasena'] ?? '';

if ($nombre === '' || $usuario === '' || $contrasena === '') {
    header('Location: ../registro.php?error=datos');
    exit();
}

if (strlen($contrasena) < 6) {
    header('Location: ../registro.php?error=password');
    exit();
}

// Para PA2 el registro corresponde a una cuenta administrativa.
// El acceso al área privada sigue restringido al rol Administrador.
$rol_defecto = 'Administrador';
$hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO usuarios (nombre, usuario, contrasena, rol)
            VALUES (:nombre, :usuario, :contrasena, :rol)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':usuario' => $usuario,
        ':contrasena' => $hash_contrasena,
        ':rol' => $rol_defecto
    ]);

    header('Location: ../login.php?registro=ok');
    exit();

} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        header('Location: ../registro.php?error=duplicado');
        exit();
    }

    header('Location: ../registro.php?error=servidor');
    exit();
}
?>
