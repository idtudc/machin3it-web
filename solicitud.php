<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Registro de Solicitud de Servicio (solicitud.php)
 * Descripción: Formulario para ingresar nuevos tickets de soporte técnico, 
 * utilizando componentes y estilos modulares externos.
 * Entorno: XAMPP (PHP / MySQL)
 * -------------------------------------------------------------------------
 */
$page = 'solicitud'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Servicio - Machin3 IT</title>
    <!-- Hoja de estilos global externa -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Inclusión de la barra de navegación modular -->
    <?php include 'includes/header.php'; ?>

    <!-- Contenido principal -->
    <div class="container">
        <div class="ticket-box">
            <h2 class="header-title" style="margin-top: 0;">Registrar Nueva Solicitud (Ticket)</h2>
            
            <form action="#" method="POST">
                
                <!-- Fila 1: Datos de identificación y contacto del cliente -->
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">Nombre del Cliente:</label>
                        <input type="text" class="form-input" placeholder="Ej. Michael Mamani" required>
                    </div>
                    <div class="form-col">
                        <label class="form-label">DNI:</label>
                        <input type="text" class="form-input" placeholder="8 dígitos" pattern="\d{8}" maxlength="8" required>
                    </div>
                    <div class="form-col">
                        <label class="form-label">Teléfono / WhatsApp:</label>
                        <input type="text" class="form-input" placeholder="Ej. 987654321" required>
                    </div>
                </div>

                <!-- Fila 2: Especificaciones del hardware e ingreso -->
                <div class="form-row">
                    <div class="form-col-2">
                        <label class="form-label">Tipo y Modelo de Equipo:</label>
                        <input type="text" class="form-input" placeholder="Ej. Laptop HP Pavilion 15" required>
                    </div>
                    <div class="form-col">
                        <label class="form-label">Fecha de Ingreso:</label>
                        <input type="date" class="form-input" required>
                    </div>
                </div>

                <!-- Fila 3: Evaluación del estado físico externo -->
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">Detalles y Estado de Ingreso:</label>
                        <textarea rows="2" class="form-input" placeholder="Ej. Ingresa con pantalla rayada, sin cargador, golpe..." required></textarea>
                    </div>
                </div>

                <!-- Fila 4: Selección de servicio del catálogo y costo estimado -->
                <div class="form-row">
                    <div class="form-col-2">
                        <label class="form-label">Servicio Requerido:</label>
                        <select class="form-input" required>
                            <option value="">Seleccione un servicio del catálogo...</option>
                            <optgroup label="Mantenimiento">
                                <option value="Limpieza">Limpieza profunda y optimización</option>
                                <option value="Mantenimiento">Mantenimiento general</option>
                            </optgroup>
                            <optgroup label="Hardware">
                                <option value="Reparacion HW">Reparaciones (Hardware)</option>
                                <option value="Repotenciacion">Repotenciación</option>
                                <option value="Ensamblaje">Ensamblaje</option>
                            </optgroup>
                            <optgroup label="Software">
                                <option value="Actualizacion SO">Actualizaciones (S.O.)</option>
                                <option value="Instalacion SW">Instalaciones (Software)</option>
                                <option value="Maquinas Virtuales">Máquinas Virtuales</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-col">
                        <label class="form-label">Precio Estimado (S/):</label>
                        <input type="number" class="form-input" placeholder="Ej. 80.00" step="0.01" min="0" required>
                    </div>
                </div>

                <!-- Fila 5: Reporte de la falla técnica descrita -->
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">Descripción del Problema Reportado:</label>
                        <textarea rows="3" class="form-input" placeholder="Detalle la falla que reporta el cliente..." required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn-submit" style="margin-top: 20px;">GENERAR TICKET DE SERVICIO</button>
            </form>
        </div>
    </div>
</body>
</html>