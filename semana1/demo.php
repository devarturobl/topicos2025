CREATE DATABASE escuela;

USE escuela;

CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    grado VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

