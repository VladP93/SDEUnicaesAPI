-- Script Seguimiento de egresados --

CREATE DATABASE sdeunicaes;
USE sdeunicaes;

CREATE TABLE Persona(
    dui VARCHAR(9) NOT NULL PRIMARY KEY,
    nit VARCHAR(17) NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(9) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    correo VARCHAR(30) NOT NULL,
    fechanacimiento DATE NOT NULL,
    sexo CHAR(1) NOT NULL
);

CREATE TABLE Emisor(
    dui VARCHAR(9) NOT NULL PRIMARY KEY,
    FOREIGN KEY(dui) REFERENCES Persona(dui)    
);

CREATE TABLE Receptor(
    dui VARCHAR(9) NOT NULL PRIMARY KEY,
    FOREIGN KEY(dui) REFERENCES Persona(dui)
);

CREATE TABLE Egresado(
    dui VARCHAR(9) NOT NULL PRIMARY KEY,
    carnet VARCHAR(11) NOT NULL UNIQUE,
    FOREIGN KEY(dui) REFERENCES Persona(dui)
);

CREATE TABLE Aptitud(
    idaptitud INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    aptitud VARCHAR(20)
);

CREATE TABLE AptitudEgresado(
    idaptitud INT NOT NULL AUTO_INCREMENT,
    dui VARCHAR(9) NOT NULL,
    PRIMARY KEY(idaptitud, dui),
    FOREIGN KEY(idaptitud) REFERENCES Aptitud(idaptitud),
    FOREIGN KEY(dui) REFERENCES Egresado(dui)
);

CREATE TABLE Mensaje(
    idmensaje INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    emisor VARCHAR(9) NOT NULL,
    receptor VARCHAR(9) NOT NULL,
    asunto VARCHAR(30) NOT NULL,
    mensaje VARCHAR(255) NOT NULL,
    FOREIGN KEY(emisor) REFERENCES Emisor(dui),
    FOREIGN KEY(receptor) REFERENCES Receptor(dui)
);

CREATE TABLE Adjunto(
    idadjunto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    urlarchivo VARCHAR(255) NOT NULL
);

CREATE TABLE AdjuntoMensaje(
    idmensaje INT NOT NULL,
    idadjunto INT NOT NULL,
    PRIMARY KEY(idmensaje, idadjunto),
    FOREIGN KEY(idmensaje) REFERENCES Mensaje(idmensaje),
    FOREIGN KEY(idadjunto) REFERENCES Adjunto(idadjunto)
);

CREATE TABLE TipoCarrera(
    idtipocarrera INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipocarrera VARCHAR(20) NOT NULL
);

CREATE TABLE Carrera(
    idcarrera INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    carrera VARCHAR(50) NOT NULL,
    tipocarrera INT NOT NULL,
    FOREIGN KEY(tipocarrera) REFERENCES TipoCarrera(idtipocarrera)
);

CREATE TABLE CarreraEgresado(
    dui VARCHAR(9) NOT NULL,
    idcarrera INT NOT NULL,
    PRIMARY KEY(dui, idcarrera),
    FOREIGN KEY(dui) REFERENCES Egresado(dui),
    FOREIGN KEY(idcarrera) REFERENCES Carrera(idcarrera)
);

CREATE TABLE Departamento(
    iddepartamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    departamento VARCHAR(30) NOT NULL
);

CREATE TABLE Municipio(
    idmunicipio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    municipio VARCHAR(30) NOT NULL,
    departamento INT NOT NULL,
    FOREIGN KEY(departamento) REFERENCES Departamento(iddepartamento)
);

CREATE TABLE Ubicacion(
    idubicacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idmunicipio INT NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    FOREIGN KEY(idmunicipio) REFERENCES Municipio(idmunicipio)
);

CREATE TABLE Facultad(
    idfacultad INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    facultad VARCHAR(20) NOT NULL,
    idubicacion INT NOT NULL,
    FOREIGN KEY(idubicacion) REFERENCES Ubicacion(idubicacion)
);

CREATE TABLE CarreraFacultad(
    idcarrera INT NOT NULL,
    idfacultad INT NOT NULL,
    PRIMARY KEY(idcarrera, idfacultad),
    FOREIGN KEY(idcarrera) REFERENCES Carrera(idcarrera),
    FOREIGN KEY(idfacultad) REFERENCES Facultad(idfacultad)
);

CREATE TABLE Decano(
    dui VARCHAR(9) NOT NULL PRIMARY KEY,
    facultad INT NOT NULL,
    FOREIGN KEY(facultad) REFERENCES Facultad(idfacultad)
);

CREATE TABLE Empresa(
    idempresa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    empresa VARCHAR(50) NOT NULL,
    telefono VARCHAR(9) NOT NULL,
    ubicacion INT NOT NULL,
    FOREIGN KEY(ubicacion) REFERENCES Ubicacion(idubicacion) 
);

CREATE TABLE AreaLaboral(
    idArea INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    area VARCHAR(50) NOT NULL
);

CREATE TABLE Cargo(
    idcargo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cargo VARCHAR(100) NOT NULL
);

CREATE TABLE ExperienciaLaboral(
    idexperiencia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    egresado VARCHAR(9) NOT NULL,
    empresa INT NOT NULL,
    cargo INT NOT NULL,
    arealaboral INT NOT NULL,
    fechainicio DATE NOT NULL,
    fechafin DATE NOT NULL,
    FOREIGN KEY(egresado) REFERENCES Egresado(dui),
    FOREIGN KEY(empresa) REFERENCES Empresa(idempresa),
    FOREIGN KEY(cargo) REFERENCES Cargo(idcargo)
);

CREATE TABLE Institucion(
    idinstitucion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ubicacion INT NOT NULL,
    FOREIGN KEY(ubicacion) REFERENCES Ubicacion(idubicacion)
);

CREATE TABLE DiplomaCertificacion(
    iddiplomadocertificacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    institucion INT NOT NULL,
    arealaboral INT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY(institucion) REFERENCES Institucion(idinstitucion),
    FOREIGN KEY(arealaboral) REFERENCES AreaLaboral(idArea)
);

CREATE TABLE DiplomaCertificacionEgresado(
    dui VARCHAR(9) NOT NULL,
    diplomacertificacion INT NOT NULL,
    foto VARCHAR(255) NOT NULL,
    FOREIGN KEY(dui) REFERENCES Egresado(dui),
    FOREIGN KEY(diplomacertificacion) REFERENCES DiplomaCertificacion(iddiplomadocertificacion)
);

-- Datos Default