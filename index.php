<?php
$page = 'inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Machin3 IT - Soluciones Tecnológicas</title>
    <!-- Actualizamos a v=8.0 para forzar la carga de la nueva estructura -->
    <link rel="stylesheet" href="css/styles.css?v=8.0">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container">
        
        <!-- Banner Principal -->
        <div class="hero">
            <h1>Soluciones Tecnológicas para tus Equipos</h1>
            <p>Mantenimiento preventivo, reparación de hardware, redes y soporte técnico especializado para garantizar el rendimiento óptimo de tu tecnología en Arequipa.</p>
            <a href="solicitud.php" class="btn-hero">Registrar una Solicitud</a>
        </div>

        <!-- Sección: Quiénes Somos -->
        <div id="nosotros" style="text-align: center; max-width: 800px; margin: 0 auto 50px auto;">
            <h2 style="color: #0f172a; font-size: 28px;">¿Por qué elegir Machin3 IT?</h2>
            <p style="color: #64748b; font-size: 16px;">Centralizamos la gestión de tus requerimientos técnicos en una plataforma moderna. Desde la limpieza profunda de un equipo hasta la configuración de un servidor NAS empresarial, te brindamos seguimiento transparente en cada etapa del proceso.</p>
        </div>

        <!-- Tarjetas de Acceso Rápido -->
        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">📋</span>
                <h3>Catálogo de Servicios</h3>
                <p>Revisa nuestro portafolio de servicios técnicos y precios referenciales actualizados directamente desde nuestra base de datos.</p>
                <a href="servicios.php" class="feature-link">Ver Catálogo</a>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">🔍</span>
                <h3>Seguimiento en Línea</h3>
                <p>Ingresa tu código SRV y consulta el estado de reparación de tu equipo y el diagnóstico técnico en tiempo real.</p>
                <a href="seguimiento.php" class="feature-link">Rastrear Equipo</a>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">📊</span>
                <h3>Cotizador Rápido</h3>
                <p>Calcula el costo estimado sumando diferentes servicios o componentes antes de registrar formalmente tu ticket.</p>
                <a href="cotizador.php" class="feature-link">Generar Cotización</a>
            </div>
        </div>

        <!-- NUEVA SECCIÓN COMPACTA: Identidad Corporativa -->
        <div id="identidad" style="background: white; padding: 40px; border-radius: 12px; margin-bottom: 50px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
            
            <!-- Contenedor dividido en 2 columnas para matar el espacio vacío -->
            <div style="display: flex; flex-wrap: wrap; gap: 40px; align-items: stretch; margin-bottom: 50px;">
                
                <!-- Columna Izquierda: Textos de Misión y Visión -->
                <div style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                    <h2 style="font-size: 32px; color: #0f172a; margin-top: 0; margin-bottom: 5px;">Visión y Misión</h2>
                    <p style="color: #64748b; font-size: 16px; margin-bottom: 30px;">Impulsando el desarrollo tecnológico en la región sur.</p>

                    <div style="margin-bottom: 25px; padding: 25px; background: #f8fafc; border-left: 4px solid #3b82f6; border-radius: 0 8px 8px 0;">
                        <h3 style="margin-top: 0; color: #1e293b; font-size: 20px; display: flex; align-items: center; gap: 8px;">👀 Nuestra visión</h3>
                        <p style="color: #475569; margin-bottom: 0; font-size: 15px; line-height: 1.6;">Ser la empresa líder y de mayor confianza en consultoría y soporte informático en la región sur del país, destacando por nuestra innovación, calidad técnica y excelencia en la atención al cliente.</p>
                    </div>

                    <div style="padding: 25px; background: #f8fafc; border-left: 4px solid #f97316; border-radius: 0 8px 8px 0;">
                        <h3 style="margin-top: 0; color: #1e293b; font-size: 20px; display: flex; align-items: center; gap: 8px;">🎯 Nuestra misión</h3>
                        <p style="color: #475569; margin-bottom: 0; font-size: 15px; line-height: 1.6;">Brindar soluciones tecnológicas integrales y transparentes en soporte, mantenimiento y redes. Nos dedicamos a garantizar el óptimo rendimiento de los equipos mediante un servicio ágil y profesional.</p>
                    </div>
                </div>

                <!-- Columna Derecha: Imagen decorativa para llenar el espacio -->
                <div style="flex: 1; min-width: 300px;">
                    <img src="img/nosotros.jpg" alt="Soporte Técnico Machin3 IT" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); min-height: 400px;">
                </div>
            </div>

            <!-- Sección de Valores en Cuadrícula Compacta (3x2) -->
            <div id="valores" style="border-top: 2px dashed #e2e8f0; padding-top: 40px;">
                <h3 style="font-size: 28px; color: #0f172a; text-align: center; margin-bottom: 30px;">Nuestros valores 🤝</h3>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                    
                    <div style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                        <strong style="color: #3b82f6; font-size: 16px; display: block; margin-bottom: 8px;">Transparencia</strong>
                        <span style="color: #64748b; font-size: 14px;">Claridad absoluta en cada diagnóstico, cotización y reparación de tus equipos.</span>
                    </div>

                    <div style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                        <strong style="color: #3b82f6; font-size: 16px; display: block; margin-bottom: 8px;">Profesionalismo</strong>
                        <span style="color: #64748b; font-size: 14px;">Servicio técnico especializado basado en el conocimiento y la mejora continua.</span>
                    </div>

                    <div style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                        <strong style="color: #3b82f6; font-size: 16px; display: block; margin-bottom: 8px;">Innovación</strong>
                        <span style="color: #64748b; font-size: 14px;">Implementación de soluciones tecnológicas modernas y eficientes.</span>
                    </div>

                    <div style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                        <strong style="color: #3b82f6; font-size: 16px; display: block; margin-bottom: 8px;">Compromiso</strong>
                        <span style="color: #64748b; font-size: 14px;">Dedicación total hacia la satisfacción y operatividad de nuestros clientes.</span>
                    </div>

                    <div style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                        <strong style="color: #3b82f6; font-size: 16px; display: block; margin-bottom: 8px;">Integridad</strong>
                        <span style="color: #64748b; font-size: 14px;">Actuamos con transparencia respetando las normas, garantizando confianza y seguridad.</span>
                    </div>

                    <div style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                        <strong style="color: #3b82f6; font-size: 16px; display: block; margin-bottom: 8px;">Enfoque en el cliente</strong>
                        <span style="color: #64748b; font-size: 14px;">Nuestros clientes son el centro de nuestras decisiones para superar sus expectativas.</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Sección: Cómo Funciona -->
        <div id="como-funciona" class="process-section">
            <h2 style="color: #0f172a; margin-top: 0; font-size: 28px;">Nuestra Metodología de Trabajo</h2>
            <p style="color: #64748b; margin-bottom: 40px;">Un proceso simple y transparente para tu tranquilidad.</p>
            
            <div class="process-grid">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h4>Registro</h4>
                    <p>Ingresa tu solicitud en el sistema y recibe un código único (Ej. SRV-0001).</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h4>Diagnóstico</h4>
                    <p>Evaluamos el equipo y actualizamos el estado en nuestra plataforma.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h4>Reparación</h4>
                    <p>Nuestros técnicos ejecutan el servicio solicitado bajo altos estándares.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h4>Entrega</h4>
                    <p>Te notificamos cuando el equipo está listo y operando al 100%.</p>
                </div>
            </div>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>