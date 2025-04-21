CREATE DATABASE consultoria_db;
USE consultoria_db;

-- Tabla de servicios
CREATE TABLE servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    valor_clp DECIMAL(10, 2) NOT NULL,
    valor_usd DECIMAL(10, 2) NOT NULL
);

-- Los servicios de la empresa
INSERT INTO servicios (nombre, descripcion, valor_clp, valor_usd) VALUES
('Consultoría Digital', 'Asesoría especializada en transformación digital y estrategias tecnológicas.', 250000, 265),
('Soluciones Multiexperiencia', 'Desarrollo de aplicaciones que ofrecen experiencias consistentes en múltiples dispositivos.', 800000, 850),
('Evolución de Ecosistemas', 'Optimización y escalabilidad de sistemas y plataformas tecnológicas.', 1200000, 1275),
('Soluciones Low-Code', 'Implementación de flujos de trabajo automatizados con herramientas como Make, Zapier, PowerApps.', 480000, 510);
