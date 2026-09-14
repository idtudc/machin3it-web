<?php
/**
 * Conexión a la base de datos mediante PDO.
 * Entorno local: XAMPP / Apache / MySQL.
 */
$host = 'localhost';
$dbname = 'machin3it_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    // En desarrollo se informa el problema sin mostrar credenciales.
    die("No fue posible conectar con la base de datos.");
}
?>
