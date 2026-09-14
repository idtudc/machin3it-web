# 💻 Machin3 IT - Sistema Web de Gestión de Servicios Tecnológicos

Este repositorio contiene el código fuente correspondiente al **Producto Académico 2 (PA2)**. El proyecto es un sistema transaccional web desarrollado bajo el patrón de **Arquitectura de Tres Capas** (Three-Tier Architecture).

## 🚀 Tecnologías Utilizadas
* **Capa de Presentación (Frontend):** HTML5, CSS3 (Arquitectura modular, Flexbox/Grid), JavaScript (Vanilla).
* **Capa de Proceso (Backend):** PHP 8.x, PDO (PHP Data Objects), Sesiones Seguras, Criptografía Bcrypt.
* **Capa de Datos (Base de Datos):** MySQL (Motor InnoDB, Modelo Relacional Normalizado).

## 📁 Estructura del Proyecto
* `/css` - Hojas de estilo globales y variables corporativas (`styles.css`).
* `/database` - Script relacional y datos semilla (`schema.sql`).
* `/includes` - Componentes visuales reutilizables (`header.php`).
* `/js` - Lógica asíncrona del cliente y manipulación del DOM (`cotizador.js`).
* `/php` - Middleware, controladores transaccionales y conexión (`conexion.php`, `procesar_login.php`).

## ⚙️ Despliegue en Entorno Local (XAMPP)
1. Clonar este repositorio dentro del directorio raíz del servidor web (`htdocs`).
2. Crear una base de datos llamada `machin3it_db` en phpMyAdmin.
3. Importar el archivo `database/schema.sql` para generar la estructura de tablas y registros iniciales.
4. Validar las credenciales en `php/conexion.php` (por defecto configurado para XAMPP: usuario `root`, sin contraseña).
5. Acceder mediante el navegador: `http://localhost/machin3it-web/index.php`.

---
**Desarrollador:** Michael Roger Mamani  
**Institución:** Universidad Continental  
**Entrega:** Producto Académico 2 (Proyecto segunda etapa)
**by Mike**
