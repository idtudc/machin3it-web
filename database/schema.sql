-- ================================================================
-- BASE DE DATOS - SISTEMA WEB DE GESTIÓN DE SERVICIOS TECNOLÓGICOS
-- MACHIN3 IT | PROYECTO PARTE II
-- ================================================================

DROP DATABASE IF EXISTS machin3it_db;
CREATE DATABASE machin3it_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE machin3it_db;

-- 1. USUARIOS: credenciales y rol de acceso
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    rol VARCHAR(20) NOT NULL DEFAULT 'Administrador'
) ENGINE=InnoDB;

-- 2. SERVICIOS: catálogo y precios referenciales
CREATE TABLE servicios (
    id_servicio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descripcion TEXT,
    precio_referencial DECIMAL(10,2) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB;

-- 3. ESTADOS: catálogo de estados del servicio
CREATE TABLE estados (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- 4. SOLICITUDES: tickets de atención técnica
CREATE TABLE solicitudes (
    id_solicitud INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20) NOT NULL UNIQUE,
    id_usuario INT NOT NULL,
    id_servicio INT NOT NULL,
    equipo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha DATE NOT NULL,
    id_estado INT NOT NULL,
    CONSTRAINT fk_solicitud_usuario
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    CONSTRAINT fk_solicitud_servicio
        FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio),
    CONSTRAINT fk_solicitud_estado
        FOREIGN KEY (id_estado) REFERENCES estados(id_estado)
) ENGINE=InnoDB;

-- 5. COTIZACIONES: registro básico de cotizaciones
CREATE TABLE cotizaciones (
    id_cotizacion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha DATE NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_cotizacion_usuario
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
) ENGINE=InnoDB;

-- ================================================================
-- DATOS INICIALES
-- ================================================================

-- Administrador de prueba para demostrar el login conectado a BD.
-- Contraseña original: 123456
-- Se almacena únicamente el hash generado por password_hash().
INSERT INTO usuarios (nombre, usuario, contrasena, rol)
VALUES (
    'Michael Mamani',
    'admin',
    '$2y$12$KZd4mwkF/zFuFcyHZv6dx.E1srJOtOTtMhftSKDW0SEPD4MNW.bem',
    'Administrador'
);

INSERT INTO estados (nombre_estado) VALUES
('Recibido'),
('En diagnóstico'),
('En reparación'),
('Listo'),
('Entregado');

INSERT INTO servicios (nombre, categoria, descripcion, precio_referencial) VALUES
('Limpieza profunda y optimización', 'Mantenimiento', 'Desensamble total, limpieza de polvo y cambio de pasta térmica', 80.00),
('Mantenimiento general', 'Mantenimiento', 'Revisión preventiva física y lógica del equipo', 60.00),
('Reparaciones (Hardware)', 'Hardware', 'Diagnóstico electrónico y sustitución de componentes dañados', 120.00),
('Repotenciación', 'Hardware', 'Instalación de unidades SSD y ampliación de memoria RAM', 70.00),
('Ensamblaje', 'Hardware', 'Armado profesional de equipos a medida y gestión de cables', 150.00),
('Actualizaciones (S.O.)', 'Software', 'Migración segura a versiones recientes de Windows o distribuciones Linux', 60.00),
('Instalaciones (Software)', 'Software', 'Instalación de ofimática, utilitarios y software', 50.00),
('Máquinas Virtuales', 'Software', 'Configuración de entornos virtualizados', 90.00),
('Respaldos (Hogar)', 'Respaldo', 'Copia de seguridad local de archivos y perfiles de usuario', 60.00),
('Backups empresariales', 'Respaldo', 'Implementación de políticas de respaldo en servidores NAS', 250.00),
('Mantenimiento de impresoras', 'Mantenimiento', 'Limpieza de cabezales, rodillos y revisión de inyectores', 70.00),
('Configuración de red local', 'Redes', 'Diseño e implementación de direccionamiento LAN y routers', 150.00),
('Instalación de cámaras de seguridad', 'Seguridad', 'Instalación y configuración de circuitos CCTV o cámaras IP', 120.00),
('Consultoría Tecnológica', 'Consultoría', 'Asesoría especializada para optimización de infraestructura TI', 100.00);
