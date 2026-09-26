# 💻 Machin3 IT - Sistema Web de Gestión de Servicios Tecnológicos

Este repositorio contiene el código fuente final correspondiente al **Producto Académico 3 (PA3)**. El proyecto es un sistema transaccional web completo desarrollado bajo el patrón de **Arquitectura de Tres Capas** (Three-Tier Architecture), diseñado para la gestión integral de servicios técnicos en la ciudad de Arequipa.

## ✨ Nuevas Funcionalidades (Versión PA3)
En esta etapa, el sistema pasó de ser una maqueta visual a una aplicación web 100% funcional y dinámica:
* **Catálogo Dinámico:** Integración en tiempo real con MySQL, con filtros por categoría en la URL.
* **Constructor de Presupuestos (Cotizador):** Interfaz interactiva con agrupación de servicios, detalles desplegables (acordeón) y cálculo dinámico en JavaScript.
* **Sistema de Tickets (HelpDesk):** Generación automática de solicitudes técnicas con códigos únicos (Ej. SRV-XXXX).
* **Módulo de Seguimiento (Tracking):** Permite al cliente consultar el estado exacto de su equipo mediante una barra de progreso interactiva.
* **Dashboard Administrativo:** Panel de control privado (con sesiones seguras) para visualizar métricas, administrar tickets y cambiar estados de reparación.
* **Integración de Mapas:** Página de contacto con iframe interactivo de Google Maps y botones de acción (WhatsApp).

## 🚀 Tecnologías Utilizadas
* **Capa de Presentación (Frontend):** HTML5, CSS3 (Arquitectura modular, Flexbox/Grid, Responsive Design), JavaScript (Vanilla).
* **Capa de Proceso (Backend):** PHP 8.x, PDO (PHP Data Objects), Sesiones Seguras.
* **Capa de Datos (Base de Datos):** MySQL (Motor InnoDB, Modelo Relacional Normalizado).

## 📁 Estructura del Proyecto

* `/css` - Hojas de estilo globales unificadas (`styles.css` v8.0).
* `/database` - Script relacional y datos semilla actualizados (`schema.sql`).
* `/img` - Recursos gráficos, logotipo oficial e imágenes corporativas.
* `/includes` - Componentes visuales reutilizables (`header.php` con submenús, `footer.php` modular).
* `/php` - Middleware, controladores transaccionales, Dashboard Admin y conexión PDO (`conexion.php`, `admin_dashboard.php`).
* *Directorio Raíz* - Archivos principales de navegación (`index.php`, `servicios.php`, `solicitud.php`, `seguimiento.php`, `cotizador.php`, `contacto.php`, `login.php`).

## ⚙️ Despliegue en Entorno Local (XAMPP)

1. Clonar este repositorio dentro del directorio raíz del servidor web (`htdocs`).
2. Crear una base de datos llamada `machin3it_db` en phpMyAdmin.
3. Importar el archivo `database/schema.sql` para generar la estructura de tablas y registros iniciales.
4. Validar las credenciales en `php/conexion.php` (por defecto configurado para XAMPP: usuario `root`, sin contraseña).
5. Acceder mediante el navegador al sitio público: `http://localhost/machin3it-web/index.php`.
6. Para acceder al panel, ingresar a `login.php` con credenciales de administrador.

---
* **Desarrollador:** Michael Roger Mamani Mamani
* **Institución:** Universidad Continental
* **Entrega:** Producto Académico 3 (Sistema Web Funcional V.3) *by Mike*