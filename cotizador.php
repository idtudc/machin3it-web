<?php
$page = 'cotizador';
require_once 'php/conexion.php';

// Obtener servicios agrupados por categoría, AHORA INCLUYENDO LA DESCRIPCIÓN
$servicios_agrupados = [];
try {
    $stmt =$conn->query("SELECT id_servicio, nombre, descripcion, categoria, precio_referencial FROM servicios WHERE estado = 'Activo' ORDER BY categoria, nombre");
    $resultados =$stmt->fetchAll();
    
    foreach ($resultados as $row) {$servicios_agrupados[$row['categoria']][] =$row;
    }
} catch (PDOException $e) {$servicios_agrupados = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cotizador Avanzado - Machin3 IT</title>
    <link rel="stylesheet" href="css/styles.css?v=5.0">
    <style>
        .categoria-titulo { 
            background-color: #1e293b; 
            color: white; 
            padding: 12px 15px; 
            margin: 20px 0 0 0; 
            font-size: 15px; 
            border-radius: 6px 6px 0 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }
        
        /* Contenedor principal de cada fila para el acordeón */
        .servicio-wrapper {
            border: 1px solid #e2e8f0; 
            border-top: none;
            background: white;
            transition: background 0.2s;
        }
        .servicio-wrapper:last-child { border-radius: 0 0 6px 6px; overflow: hidden; }
        .servicio-wrapper:hover { background-color: #f8fafc; }
        
        /* Fila visible siempre */
        .servicio-header {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 12px 15px; 
        }
        
        .servicio-label { 
            cursor: pointer; 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            font-size: 15px; 
            color: #334155; 
            font-weight: 500; 
            flex: 1; 
        }
        
        .servicio-acciones {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Botón circular desplegable (+ / -) */
        .btn-toggle {
            background-color: #e0f2fe;
            color: #0284c7;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s;
        }
        .btn-toggle:hover { background-color: #bae6fd; transform: scale(1.1); }
        .btn-toggle.abierto { background-color: #f1f5f9; color: #64748b; }

        /* Contenido oculto (Descripción) */
        .servicio-detalle {
            display: none;
            padding: 0 15px 15px 45px;
            font-size: 13px;
            color: #64748b;
            border-top: 1px dashed #e2e8f0;
            background-color: #f8fafc;
            line-height: 1.5;
        }

        .btn-action { width: 100%; border: none; padding: 12px; border-radius: 6px; font-weight: bold; font-size: 15px; cursor: pointer; transition: 0.3s; margin-top: 15px; display: flex; justify-content: center; align-items: center; gap: 8px;}
        .btn-email { background-color: #3b82f6; color: white; }
        .btn-email:hover { background-color: #2563eb; }
        .btn-ticket { background-color: #10b981; color: white; margin-top: 15px; }
        .btn-ticket:hover { background-color: #059669; }
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h2 class="header-title" style="margin-top: 0;">Constructor de Presupuestos</h2>
        <p style="text-align: center; color: #64748b; margin-bottom: 30px;">Agrega los servicios requeridos para calcular tu presupuesto y genera tu solicitud técnica al instante.</p>
        
        <div class="cotizador-grid">
            
            <!-- Columna Izquierda: Lista de Servicios con Acordeón -->
            <div style="background: transparent; box-shadow: none; padding: 0;">
                <?php if (empty($servicios_agrupados)): ?>
                    <p style="text-align: center; color: red;">No hay servicios disponibles.</p>
                <?php else: ?>
                    <?php foreach ($servicios_agrupados as $categoria =>$servicios): ?>
                        <div class="categoria-titulo">📁 <?= htmlspecialchars($categoria) ?></div>
                        
                        <?php foreach ($servicios as$srv): ?>
                            <div class="servicio-wrapper">
                                <!-- Cabecera de la fila -->
                                <div class="servicio-header">
                                    <label class="servicio-label">
                                        <input type="checkbox" class="chk-servicio" value="<?= $srv['precio_referencial'] ?>" data-nombre="<?= htmlspecialchars($srv['nombre']) ?>" style="width: 18px; height: 18px; cursor: pointer;">
                                        <?= htmlspecialchars($srv['nombre']) ?>
                                    </label>
                                    
                                    <div class="servicio-acciones">
                                        <span class="servicio-precio">S/ <?= number_format($srv['precio_referencial'], 2) ?></span>
                                        <button type="button" class="btn-toggle" onclick="toggleDetalle(this)" title="Ver detalles del servicio">+</button>
                                    </div>
                                </div>
                                <!-- Descripción desplegable extraída de la BD -->
                                <div class="servicio-detalle">
                                    <strong>¿Qué incluye?</strong><br>
                                    <?= htmlspecialchars($srv['descripcion']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Columna Derecha: Resumen interactivo -->
            <div class="cotizador-resumen">
                <h3 style="margin-top: 0; color: white; border-bottom: 1px solid #334155; padding-bottom: 15px;">Resumen Oficial</h3>
                
                <div id="lista-resumen" style="min-height: 120px; margin-bottom: 20px; font-size: 14px; color: #cbd5e1;">
                    <p style="text-align: center; margin-top: 50px; font-style: italic; color: #64748b;">Selecciona servicios de la lista para agregarlos a la cotización.</p>
                </div>

                <div style="border-top: 2px dashed #475569; padding-top: 20px;">
                    <span style="font-size: 14px; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8;">Total Estimado:</span>
                    <span class="total-amount">S/ <span id="total-precio">0.00</span></span>
                </div>
                
                <button class="btn-print" onclick="window.print()">🖨️ Descargar PDF</button>
                <button class="btn-action btn-email" onclick="enviarCotizacion()">✉️ Enviar por Correo</button>
                <button class="btn-action btn-ticket" onclick="generarTicket()">🚀 Convertir en Solicitud</button>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <!-- Lógica JavaScript -->
    <script>
        // Función para abrir y cerrar el acordeón de descripciones
        function toggleDetalle(btn) {
            const wrapper = btn.closest('.servicio-wrapper');
            const detalle = wrapper.querySelector('.servicio-detalle');
            
            if (detalle.style.display === 'none' || detalle.style.display === '') {
                detalle.style.display = 'block';
                btn.textContent = '−';
                btn.classList.add('abierto');
            } else {
                detalle.style.display = 'none';
                btn.textContent = '+';
                btn.classList.remove('abierto');
            }
        }

        // Función para actualizar el resumen de cotización
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.chk-servicio');
            const totalEl = document.getElementById('total-precio');
            const listaResumen = document.getElementById('lista-resumen');

            checkboxes.forEach(chk => {
                chk.addEventListener('change', actualizarCotizacion);
            });

            function actualizarCotizacion() {
                let total = 0;
                let htmlResumen = '';

                checkboxes.forEach(chk => {
                    if (chk.checked) {
                        const precio = parseFloat(chk.value);
                        const nombre = chk.getAttribute('data-nombre');
                        total += precio;
                        htmlResumen += `<div style="display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #334155; padding-bottom: 5px;">
                                          <span style="width: 70%;">${nombre}</span>
                                          <span style="color: #38bdf8; font-weight: bold;">S/ ${precio.toFixed(2)}</span>
                                        </div>`;
                    }
                });

                if (total === 0) {
                    htmlResumen = '<p style="text-align: center; margin-top: 50px; font-style: italic; color: #64748b;">Selecciona servicios de la lista para agregarlos a la cotización.</p>';
                }

                listaResumen.innerHTML = htmlResumen;
                totalEl.textContent = total.toFixed(2);
            }
        });

        function enviarCotizacion() {
            let total = document.getElementById('total-precio').innerText;
            if (parseFloat(total) === 0) {
                alert("⚠️ Debes seleccionar al menos un servicio para cotizar.");
                return;
            }
            let correo = prompt("Ingrese el correo electrónico del cliente:");
            if (correo && correo.trim() !== "") {
                alert("✅ ¡Cotización oficial por S/ " + total + " enviada exitosamente a " + correo + "!");
            }
        }

        function generarTicket() {
            let total = document.getElementById('total-precio').innerText;
            if (parseFloat(total) === 0) {
                alert("⚠️ Selecciona un servicio antes de generar el ticket.");
                return;
            }
            window.location.href = "solicitud.php";
        }
    </script>
</body>
</html>