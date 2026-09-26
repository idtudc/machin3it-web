<?php
$page = 'contacto';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Machin3 IT</title>
    <link rel="stylesheet" href="css/styles.css?v=8.0">
    <style>
        .contacto-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-top: 4px solid #3b82f6;
            margin-bottom: 50px;
        }
        .contacto-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .contacto-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
        }
        @media (max-width: 800px) {
            .contacto-grid { grid-template-columns: 1fr; }
        }
        .contacto-info {
            background: #f8fafc;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .info-item {
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        .info-icon {
            font-size: 24px;
        }
        .mapa-container {
            width: 100%;
            height: 100%;
            min-height: 400px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        .mapa-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .btn-whatsapp {
            display: block;
            background-color: #25D366;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            transition: 0.3s;
            margin-top: 30px;
            box-shadow: 0 4px 6px rgba(37, 211, 102, 0.2);
        }
        .btn-whatsapp:hover { background-color: #128C7E; transform: translateY(-2px); }
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <div class="contacto-container">
            <div class="contacto-header">
                <h1 style="color: #0f172a; margin-top: 0; margin-bottom: 10px; font-size: 32px;">Ponte en Contacto</h1>
                <p style="color: #64748b; font-size: 16px; margin: 0;">Visítanos en nuestra oficina técnica o escríbenos directamente para asesorarte.</p>
            </div>

            <div class="contacto-grid">
                
                <!-- Columna Izquierda: Información de Contacto -->
                <div class="contacto-info">
                    <h3 style="color: #1e293b; margin-top: 0; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 25px;">Sede Principal</h3>
                    
                    <div class="info-item">
                        <span class="info-icon">📍</span>
                        <div>
                            <strong style="color: #334155; display: block; margin-bottom: 3px;">Dirección:</strong>
                            <!-- Dirección actualizada según tu ficha de Google Maps -->
                            <span style="color: #64748b;">Urbanización Magisterial II Etapa C-4A<br>Yanahuara, Arequipa 04013</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon">📱</span>
                        <div>
                            <strong style="color: #334155; display: block; margin-bottom: 3px;">Teléfono / WhatsApp:</strong>
                            <span style="color: #64748b;">957 140 295</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon">✉️</span>
                        <div>
                            <strong style="color: #334155; display: block; margin-bottom: 3px;">Correo Electrónico:</strong>
                            <span style="color: #64748b;">machin3it@gmail.com</span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-icon">🕒</span>
                        <div>
                            <strong style="color: #334155; display: block; margin-bottom: 3px;">Horario de Atención:</strong>
                            <!-- Horario actualizado según tu ficha de Google Maps -->
                            <span style="color: #64748b;">Abierto las 24 horas</span>
                        </div>
                    </div>

                    <!-- Enlace directo a WhatsApp con tu número -->
                    <a href="https://wa.me/51957140295" target="_blank" class="btn-whatsapp">
                        💬 Escríbenos por WhatsApp
                    </a>
                </div>

                <!-- Columna Derecha: Mapa Interactivo (Enlace Embed corregido) -->
                <div class="mapa-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.458908316824!2d-71.54936682414002!3d-16.3963105843314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424b78bc4375f7%3A0x68b176f766e3b3cc!2sMachin3%20IT!5e0!3m2!1ses!2spe!4v1700000000000!5m2!1ses!2spe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>