<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Catálogo de Servicios (servicios.php) - DINÁMICO Y FILTRABLE
 * -------------------------------------------------------------------------
 */
$page = 'servicios'; 
require_once 'php/conexion.php';

// Capturamos la categoría si viene desde el menú desplegable
$filtro_categoria = isset($_GET['cat']) ? $_GET['cat'] : '';
$titulo_catalogo = "Catálogo Completo de Servicios";

try {
    if (!empty($filtro_categoria)) {
        // Lógica de filtrado dinámico según lo que se hizo clic en el menú
        if ($filtro_categoria === 'Redes_Seguridad') {
            $sql = "SELECT id_servicio, nombre, categoria, descripcion, precio_referencial 
                    FROM servicios WHERE estado = 'Activo' AND categoria IN ('Redes', 'Seguridad') ORDER BY categoria, nombre";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $titulo_catalogo = "Servicios de Redes y Seguridad";
            
        } elseif ($filtro_categoria === 'Software') {
            $sql = "SELECT id_servicio, nombre, categoria, descripcion, precio_referencial 
                    FROM servicios WHERE estado = 'Activo' AND categoria IN ('Software', 'Respaldo') ORDER BY categoria, nombre";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $titulo_catalogo = "Software y Respaldos de Datos";
            
        } elseif ($filtro_categoria === 'Consultoria') {
            $sql = "SELECT id_servicio, nombre, categoria, descripcion, precio_referencial 
                    FROM servicios WHERE estado = 'Activo' AND categoria = 'Consultoría' ORDER BY categoria, nombre";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $titulo_catalogo = "Consultoría Tecnológica";
            
        } else {
            // Filtro exacto para Mantenimiento o Hardware
            $sql = "SELECT id_servicio, nombre, categoria, descripcion, precio_referencial 
                    FROM servicios WHERE estado = 'Activo' AND categoria = :cat ORDER BY categoria, nombre";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':cat' => $filtro_categoria]);
            $titulo_catalogo = "Servicios de " . htmlspecialchars($filtro_categoria);
        }
    } else {
        // Si no hay filtro (se hizo clic en 'Servicios' principal), muestra todos
        $sql = "SELECT id_servicio, nombre, categoria, descripcion, precio_referencial 
                FROM servicios WHERE estado = 'Activo' ORDER BY categoria, nombre";
        $stmt = $conn->query($sql);
    }
    
    $lista_servicios = $stmt->fetchAll();
} catch (PDOException $e) {
    $lista_servicios = [];
    $error_bd = "No se pudieron cargar los servicios en este momento.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios - Machin3 IT</title>
    <link rel="stylesheet" href="css/styles.css?v=8.0">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #cbd5e1; padding-bottom: 10px; margin-bottom: 30px;">
            <h1 class="header-title" style="border: none; margin: 0; padding: 0;"><?= $titulo_catalogo ?></h1>
            
            <?php if (!empty($filtro_categoria)): ?>
                <!-- Botón para limpiar el filtro si el usuario quiere ver todo -->
                <a href="servicios.php" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 14px;">Ver todo el catálogo</a>
            <?php endif; ?>
        </div>
        
        <div class="grid">
            <?php if (isset($error_bd)): ?>
                <p style="color: red; text-align: center; width: 100%; grid-column: 1 / -1;"><?= htmlspecialchars($error_bd) ?></p>
            <?php elseif (count($lista_servicios) > 0): ?>
                
                <?php foreach ($lista_servicios as $servicio): ?>
                    <div class="card">
                        <div>
                            <span class="category"><?= htmlspecialchars($servicio['categoria']) ?></span>
                            <h3><?= htmlspecialchars($servicio['nombre']) ?></h3>
                            <p class="desc"><?= htmlspecialchars($servicio['descripcion']) ?></p>
                        </div>
                        <div>
                            <p class="price">S/ <?= number_format($servicio['precio_referencial'], 2) ?></p>
                            <a href="solicitud.php?id_srv=<?= $servicio['id_servicio'] ?>" class="btn">Solicitar</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p style="text-align: center; width: 100%; grid-column: 1 / -1; color: #64748b; font-size: 18px;">No hay servicios disponibles en esta categoría por el momento.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>