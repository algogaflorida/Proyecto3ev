CREATE DATABASE IF NOT EXISTS serie;
USE serie;

CREATE TABLE IF NOT EXISTS series (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    estreno INT DEFAULT NULL,
    genero VARCHAR(100) DEFAULT NULL,
    tipo_clase VARCHAR(100) NOT NULL,
    nota INT DEFAULT NULL,
    calificacion_edad VARCHAR(255) DEFAULT NULL,
    narrador VARCHAR(255) DEFAULT NULL,
    estilo_animacion VARCHAR(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL
);

INSERT INTO usuario (email, pwd) VALUES ('vicentcooked@florida.com', '1234');

INSERT INTO series (titulo, estreno, genero, tipo_clase, nota, calificacion_edad) 
VALUES ('Drama de Prueba', 2024, 'Acción', 'Drama', 9, '16+');