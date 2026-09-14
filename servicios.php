<?php
/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Módulo: Catálogo de Servicios (servicios.php)
 * Descripción: Muestra de manera organizada el portafolio técnico, categorías,
 * descripciones y precios referenciales en Soles (S/) del taller.
 * Entorno: XAMPP (PHP / MySQL)
 * -------------------------------------------------------------------------
 */
$page = 'servicios'; // Variable clave para indicar al header modular qué pestaña marcar como activa
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios - Machin3 IT</title>
    <!-- Enlace a la hoja de estilos global externa ubicada en la carpeta css/ -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Inclusión del componente modular compartido para la barra de navegación -->
    <?php include 'includes/header.php'; ?>

    <!-- Contenido del Catálogo -->
    <div class="container">
        <h1 class="header-title">Catálogo de Servicios</h1>
        
        <div class="grid">
            <!-- Mantenimiento: Limpieza -->
            <div class="card">
                <div>
                    <span class="category">Mantenimiento</span>
                    <h3>Limpieza profunda y optimización</h3>
                    <p class="desc">Desensamble total, eliminación de polvo, cambio de pasta térmica y optimización del flujo de aire y procesos del sistema.</p>
                </div>
                <div><p class="price">S/ 80.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>
            
            <!-- Mantenimiento General -->
            <div class="card">
                <div>
                    <span class="category">Mantenimiento</span>
                    <h3>Mantenimiento general</h3>
                    <p class="desc">Revisión preventiva física y lógica para evitar fallos térmicos o de rendimiento a largo plazo.</p>
                </div>
                <div><p class="price">S/ 60.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Hardware: Reparaciones -->
            <div class="card">
                <div>
                    <span class="category">Hardware</span>
                    <h3>Reparaciones (Hardware)</h3>
                    <p class="desc">Diagnóstico electrónico y sustitución de componentes dañados (placas, fuentes de poder, pantallas o flex).</p>
                </div>
                <div><p class="price">S/ 120.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Hardware: Repotenciación -->
            <div class="card">
                <div>
                    <span class="category">Hardware</span>
                    <h3>Repotenciación</h3>
                    <p class="desc">Instalación de unidades SSD y ampliación de memoria RAM para multiplicar la velocidad operativa del equipo.</p>
                </div>
                <div><p class="price">S/ 70.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Hardware: Ensamblaje -->
            <div class="card">
                <div>
                    <span class="category">Hardware</span>
                    <h3>Ensamblaje</h3>
                    <p class="desc">Armado profesional de equipos a medida, gestión del cableado interno (cable management) y pruebas de estrés.</p>
                </div>
                <div><p class="price">S/ 150.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Software: Actualizaciones -->
            <div class="card">
                <div>
                    <span class="category">Software</span>
                    <h3>Actualizaciones (S.O.)</h3>
                    <p class="desc">Migración segura a versiones recientes de Windows o Linux garantizando la conservación íntegra de los archivos.</p>
                </div>
                <div><p class="price">S/ 60.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Software: Instalaciones -->
            <div class="card">
                <div>
                    <span class="category">Software</span>
                    <h3>Instalaciones (Software)</h3>
                    <p class="desc">Despliegue y configuración de Microsoft Office, antivirus, y software especializado de diseño o ingeniería.</p>
                </div>
                <div><p class="price">S/ 50.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Software: Máquinas Virtuales -->
            <div class="card">
                <div>
                    <span class="category">Software</span>
                    <h3>Máquinas Virtuales</h3>
                    <p class="desc">Creación de entornos virtualizados aislados (ej. VMware, VirtualBox) para pruebas de seguridad o ejecución de software heredado.</p>
                </div>
                <div><p class="price">S/ 90.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Respaldo: Hogar -->
            <div class="card">
                <div>
                    <span class="category">Respaldo</span>
                    <h3>Respaldos (Hogar)</h3>
                    <p class="desc">Copia de seguridad local de archivos personales a discos externos y recuperación básica de información eliminada.</p>
                </div>
                <div><p class="price">S/ 60.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Respaldo: Empresas -->
            <div class="card">
                <div>
                    <span class="category">Respaldo</span>
                    <h3>Backups empresariales</h3>
                    <p class="desc">Diseño e implementación de políticas de copia de seguridad automatizadas en servidores NAS o red local para empresas.</p>
                </div>
                <div><p class="price">S/ 250.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Impresoras -->
            <div class="card">
                <div>
                    <span class="category">Impresoras</span>
                    <h3>Mantenimiento de impresoras</h3>
                    <p class="desc">Limpieza de cabezales, destape de inyectores, reseteo de almohadillas y calibración de impresión.</p>
                </div>
                <div><p class="price">S/ 70.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Redes -->
            <div class="card">
                <div>
                    <span class="category">Redes</span>
                    <h3>Configuración de red local</h3>
                    <p class="desc">Implementación de cableado estructurado, configuración de switches, routers y optimización de cobertura Wi-Fi.</p>
                </div>
                <div><p class="price">S/ 150.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Seguridad -->
            <div class="card">
                <div>
                    <span class="category">Seguridad</span>
                    <h3>Instalación de cámaras</h3>
                    <p class="desc">Montaje físico, tendido de red y configuración de sistemas CCTV o cámaras IP con acceso remoto desde móviles.</p>
                </div>
                <div><p class="price">S/ 120.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

            <!-- Gestión TI -->
            <div class="card">
                <div>
                    <span class="category">Gestión TI</span>
                    <h3>Consultoría Tecnológica</h3>
                    <p class="desc">Asesoramiento profesional para la compra de equipos, diseño de infraestructura de red o modernización empresarial.</p>
                </div>
                <div><p class="price">S/ 100.00</p><a href="solicitud.php" class="btn">Solicitar</a></div>
            </div>

        </div>
    </div>
</body>
</html>