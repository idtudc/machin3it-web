<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Cotizador Dinámico de Servicios (cotizador.php)
 * Descripción: Permite calcular en tiempo real el presupuesto estimado total 
 * mediante la selección interactiva de múltiples servicios del portafolio técnico,
 * utilizando componentes y estilos modulares externos.
 * Entorno: XAMPP (PHP / MySQL)
 * -------------------------------------------------------------------------
 */

$page = 'cotizador'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cotizador Dinámico - Machin3 IT</title>
    <!-- Hoja de estilos global externa -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container" style="max-width: 800px;">
        <div class="cotizador-box">
            <h2 class="header-title" style="text-align: center; margin-top: 0;">Cotizador Dinámico de Servicios</h2>
            <p class="cotizador-desc">Seleccione los servicios requeridos para calcular el presupuesto total estimado en tiempo real.</p>
            
            <form id="cotizador-form" class="cotizador-form">
                
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="80.00"> Limpieza profunda y optimización</label>
                    <span class="servicio-precio">S/ 80.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="60.00"> Mantenimiento general</label>
                    <span class="servicio-precio">S/ 60.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="120.00"> Reparaciones (Hardware)</label>
                    <span class="servicio-precio">S/ 120.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="70.00"> Repotenciación</label>
                    <span class="servicio-precio">S/ 70.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="150.00"> Ensamblaje</label>
                    <span class="servicio-precio">S/ 150.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="60.00"> Actualizaciones (S.O.)</label>
                    <span class="servicio-precio">S/ 60.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="50.00"> Instalaciones (Software)</label>
                    <span class="servicio-precio">S/ 50.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="90.00"> Máquinas Virtuales</label>
                    <span class="servicio-precio">S/ 90.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="60.00"> Respaldos (Hogar)</label>
                    <span class="servicio-precio">S/ 60.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="250.00"> Backups empresariales</label>
                    <span class="servicio-precio">S/ 250.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="70.00"> Mantenimiento de impresoras</label>
                    <span class="servicio-precio">S/ 70.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="150.00"> Configuración de red local</label>
                    <span class="servicio-precio">S/ 150.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="120.00"> Instalación de cámaras de seguridad</label>
                    <span class="servicio-precio">S/ 120.00</span>
                </div>
                <div class="servicio-item">
                    <label class="servicio-label"><input type="checkbox" class="servicio-chk" value="100.00"> Consultoría Tecnológica</label>
                    <span class="servicio-precio">S/ 100.00</span>
                </div>

                <div class="total-box">
                    <div>
                        <h2 class="total-title">Total Presupuesto:</h2>
                        <span class="total-subtitle">Incluye servicios seleccionados</span>
                    </div>
                    <div>
                        <span id="total-amount" class="total-amount">S/ 0.00</span>
                    </div>
                </div>

                <div class="btn-print-container">
                    <button type="button" class="btn-submit" style="width: auto;" onclick="alert('Cotización generada y lista para imprimir o exportar.');">Imprimir Cotización</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Enlace al archivo JavaScript externo -->
    <script src="js/cotizador.js"></script>
</body>
</html>