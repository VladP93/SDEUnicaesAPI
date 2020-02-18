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
    sexo CHAR(1) NOT NULL,
    foto VARCHAR(255) NOT NULL
);

CREATE TABLE Usuario(
    dui VARCHAR(9) NOT NULL PRIMARY KEY,
    usuario VARCHAR(10) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    FOREIGN KEY(dui) REFERENCES Persona(dui)
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
    tipocarrera VARCHAR(50) NOT NULL
);

CREATE TABLE Carrera(
    idcarrera INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    carrera VARCHAR(150) NOT NULL,
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
    iddepartamento INT NOT NULL,
    FOREIGN KEY(iddepartamento) REFERENCES Departamento(iddepartamento)
);

CREATE TABLE Ubicacion(
    idubicacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idmunicipio INT NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    FOREIGN KEY(idmunicipio) REFERENCES Municipio(idmunicipio)
);

CREATE TABLE Facultad(
    idfacultad INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    facultad VARCHAR(50) NOT NULL,
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
    activo CHAR(1) NOT NULL,
    FOREIGN KEY(facultad) REFERENCES Facultad(idfacultad)
);

CREATE TABLE AreaLaboral(
    idArea INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    area VARCHAR(50) NOT NULL
);

CREATE TABLE Cargo(
    idcargo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cargo VARCHAR(100) NOT NULL
);

CREATE TABLE Institucion(
    idinstitucion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ubicacion INT NOT NULL,
    telefono VARCHAR(9) NOT NULL,
    FOREIGN KEY(ubicacion) REFERENCES Ubicacion(idubicacion)
);

CREATE TABLE ExperienciaLaboral(
    idexperiencia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    egresado VARCHAR(9) NOT NULL,
    institucion INT NOT NULL,
    cargo INT NOT NULL,
    arealaboral INT NOT NULL,
    fechainicio DATE NOT NULL,
    fechafin DATE NOT NULL,
    FOREIGN KEY(egresado) REFERENCES Egresado(dui),
    FOREIGN KEY(institucion) REFERENCES Institucion(idinstitucion),
    FOREIGN KEY(cargo) REFERENCES Cargo(idcargo)
);

CREATE TABLE DiplomaCertificacion(
    iddiplomadocertificacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    institucion INT NOT NULL,
    arealaboral INT NOT NULL,
    FOREIGN KEY(institucion) REFERENCES Institucion(idinstitucion),
    FOREIGN KEY(arealaboral) REFERENCES AreaLaboral(idArea)
);

CREATE TABLE DiplomaCertificacionEgresado(
    dui VARCHAR(9) NOT NULL,
    diplomacertificacion INT NOT NULL,
    fecha DATE NOT NULL,
    foto VARCHAR(255) NOT NULL,
    FOREIGN KEY(dui) REFERENCES Egresado(dui),
    FOREIGN KEY(diplomacertificacion) REFERENCES DiplomaCertificacion(iddiplomadocertificacion)
);

-- Datos Default

-- Departamentos
INSERT INTO Departamento(departamento) VALUES('Ahuachapán');
INSERT INTO Departamento(departamento) VALUES('Cabañas');
INSERT INTO Departamento(departamento) VALUES('Chalatenango');
INSERT INTO Departamento(departamento) VALUES('Cuscatlán');
INSERT INTO Departamento(departamento) VALUES('La Libertad');
INSERT INTO Departamento(departamento) VALUES('La Paz');
INSERT INTO Departamento(departamento) VALUES('La Unión');
INSERT INTO Departamento(departamento) VALUES('Morazán');
INSERT INTO Departamento(departamento) VALUES('San Miguel');
INSERT INTO Departamento(departamento) VALUES('San Salvador');
INSERT INTO Departamento(departamento) VALUES('San Vicente');
INSERT INTO Departamento(departamento) VALUES('Santa Ana');
INSERT INTO Departamento(departamento) VALUES('Sonsonate');
INSERT INTO Departamento(departamento) VALUES('Usulután');

-- Municipios
-- Ahuachapan
INSERT INTO Municipio(municipio, iddepartamento) values('Ahuachapán',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Apaneca',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Atiquizaya',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Concepción de Ataco',1);
INSERT INTO Municipio(municipio, iddepartamento) values('El Refugio',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Guaymango',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Jujutla',1);
INSERT INTO Municipio(municipio, iddepartamento) values('San Francisco Menéndez',1);
INSERT INTO Municipio(municipio, iddepartamento) values('San Lorenzo',1);
INSERT INTO Municipio(municipio, iddepartamento) values('San Pedro Puxtla',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Tacuba',1);
INSERT INTO Municipio(municipio, iddepartamento) values('Turín',1);

-- Cabañas
INSERT INTO Municipio(municipio, iddepartamento) values('Cinquera',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Dolores',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Guacotecti',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Ilobasco',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Jutiapa',2);
INSERT INTO Municipio(municipio, iddepartamento) values('San Isidro',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Sensuntepeque',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Tejutepeque',2);
INSERT INTO Municipio(municipio, iddepartamento) values('Victoria',2);

-- Chalatenango
INSERT INTO Municipio(municipio, iddepartamento) values('Agua Caliente',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Arcatao',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Azacualpa',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Cancasque',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Chalatenango',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Citalá',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Comalapa',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Concepción de Quetzaltepeque',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Dulce Nombre de María',3);
INSERT INTO Municipio(municipio, iddepartamento) values('El Carrizal',3);
INSERT INTO Municipio(municipio, iddepartamento) values('El Paraíso',3);
INSERT INTO Municipio(municipio, iddepartamento) values('La Laaguna',3);
INSERT INTO Municipio(municipio, iddepartamento) values('La Palma',3);
INSERT INTO Municipio(municipio, iddepartamento) values('La Reina',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Las Flores',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Las Vueltas',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Nombre de Jesús',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Nueva Concepción',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Nueva Trinidad',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Ojos de Agua',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Potonico',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Antonio de la Cruz',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Antonio Los Ranchos',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Fernando',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Francisco Lempa',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Francisco Morazán',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Ignacio',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Isidro Labrador',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Luis Carmen',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Miguel de Mercedes',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Rafael',3);
INSERT INTO Municipio(municipio, iddepartamento) values('San Rita',3);
INSERT INTO Municipio(municipio, iddepartamento) values('Tejutla',3);

-- Cuscatlán
INSERT INTO Municipio(municipio, iddepartamento) values('Candelaria',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Cojutepeque',4);
INSERT INTO Municipio(municipio, iddepartamento) values('El Carmen',4);
INSERT INTO Municipio(municipio, iddepartamento) values('El Rosario',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Monte San Juan',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Oratorio de Concepción',4);
INSERT INTO Municipio(municipio, iddepartamento) values('San Bartolomé Perulapía',4);
INSERT INTO Municipio(municipio, iddepartamento) values('San Cristóbal',4);
INSERT INTO Municipio(municipio, iddepartamento) values('San José Guayabal',4);
INSERT INTO Municipio(municipio, iddepartamento) values('San Pedro Perulapán',4);
INSERT INTO Municipio(municipio, iddepartamento) values('San Rafael Cedros',4);
INSERT INTO Municipio(municipio, iddepartamento) values('San Ramón',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Cruz Analquito',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Cruz Michapa',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Suchitoto',4);
INSERT INTO Municipio(municipio, iddepartamento) values('Tenencingo',4);

--La Libertad
INSERT INTO Municipio(municipio, iddepartamento) values('Antiguo Cuscatlán',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Chiltiupán',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Ciudad Arce',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Colón',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Comasagua',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Huizúcar',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Jayaque',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Jicalpa',5);
INSERT INTO Municipio(municipio, iddepartamento) values('La Libertad',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Nuevo Cuscatlán',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Quetzaltepeque',5);
INSERT INTO Municipio(municipio, iddepartamento) values('San Juan Opico',5);
INSERT INTO Municipio(municipio, iddepartamento) values('San José Villanueva',5);
INSERT INTO Municipio(municipio, iddepartamento) values('San Matías',5);
INSERT INTO Municipio(municipio, iddepartamento) values('San Pablo Tacachico',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Sacacoyo',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Tecla',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Talnique',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Tamanique',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Teotepeque',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Tepecoyo',5);
INSERT INTO Municipio(municipio, iddepartamento) values('Zaragoza',5);

--La Paz
INSERT INTO Municipio(municipio, iddepartamento) values('Cuyultitán',6);
INSERT INTO Municipio(municipio, iddepartamento) values('El Rosario',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Jerusalén',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Mercedes de la Ceiba',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Olocuilta',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Paraíso de Osorio',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Antonio Masahuat',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Emigido',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Francisco Chinameca',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Pedro Masahuat',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Juan Nonualco',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Juan Talpa',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Juan Tepezontes',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Luis La Herradura',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Luis Talpa',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Miguel Tepezontes',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Pedro Nonualco',6);
INSERT INTO Municipio(municipio, iddepartamento) values('San Rafael Obrajuelo',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa María Ostuma',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Santiago Nonualco',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Tapalhuaca',6);
INSERT INTO Municipio(municipio, iddepartamento) values('Zacatecoluca',6);

--La Unión
INSERT INTO Municipio(municipio, iddepartamento) values('Anamorós',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Bolivar',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Concepción de Oriente',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Conchagua',7);
INSERT INTO Municipio(municipio, iddepartamento) values('El Carmen',7);
INSERT INTO Municipio(municipio, iddepartamento) values('El Sauce',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Intipucá',7);
INSERT INTO Municipio(municipio, iddepartamento) values('La Unión',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Lislique',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Meanguera del Golfo',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Nueva Esparta',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Pasaquina',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Polorós',7);
INSERT INTO Municipio(municipio, iddepartamento) values('San Alejo',7);
INSERT INTO Municipio(municipio, iddepartamento) values('San José',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Rosa de Lima',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Yayantique',7);
INSERT INTO Municipio(municipio, iddepartamento) values('Yucuaiquín',7);

-- Morazán
INSERT INTO Municipio(municipio, iddepartamento) values('Arambala',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Cacaopera',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Chilanga',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Corinto',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Delicias de Concepción',8);
INSERT INTO Municipio(municipio, iddepartamento) values('El Divisadero',8);
INSERT INTO Municipio(municipio, iddepartamento) values('El Rosario',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Gualococti',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Guatajiagua',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Joateca',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Jocoaitique',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Jocoro',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Lolotiquillo',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Meanguera',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Osicala',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Perquín',8);
INSERT INTO Municipio(municipio, iddepartamento) values('San Carlos',8);
INSERT INTO Municipio(municipio, iddepartamento) values('San Fernando',8);
INSERT INTO Municipio(municipio, iddepartamento) values('San Francisco Gotera',8);
INSERT INTO Municipio(municipio, iddepartamento) values('San Isidro',8);
INSERT INTO Municipio(municipio, iddepartamento) values('San Simón',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Sensembra',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Sociedad',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Torola',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Yamabai',8);
INSERT INTO Municipio(municipio, iddepartamento) values('Yoloaquín',8);

-- San Miguel
INSERT INTO Municipio(municipio, iddepartamento) values('Carolina',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Chapeltique',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Chinameca',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Chirilagua',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Ciudad Barrios',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Comacarán',9);
INSERT INTO Municipio(municipio, iddepartamento) values('El Tránsito',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Lolotique',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Moncagua',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Nueva Guadalupe',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Nuevo Edén de San Juan',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Quelepa',9);
INSERT INTO Municipio(municipio, iddepartamento) values('San Antonio',9);
INSERT INTO Municipio(municipio, iddepartamento) values('San Gerardo',9);
INSERT INTO Municipio(municipio, iddepartamento) values('San Jorge',9);
INSERT INTO Municipio(municipio, iddepartamento) values('San Luis de la Reina',9);
INSERT INTO Municipio(municipio, iddepartamento) values('San Miguel',9);
INSERT INTO Municipio(municipio, iddepartamento) values('San Rafael Oriente',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Sesori',9);
INSERT INTO Municipio(municipio, iddepartamento) values('Uluazapa',9);

-- San Salvador
INSERT INTO Municipio(municipio, iddepartamento) values('Aguilares',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Apopa',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Ayutuxtepeque',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Cuscatancingo',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Delgado',10);
INSERT INTO Municipio(municipio, iddepartamento) values('El Paisnal',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Guazapa',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Ilopango',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Mejicano',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Nejapa',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Panchimalco',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Rosarios de Mora',10);
INSERT INTO Municipio(municipio, iddepartamento) values('San Marcos',10);
INSERT INTO Municipio(municipio, iddepartamento) values('San Martín',10);
INSERT INTO Municipio(municipio, iddepartamento) values('San Salvador',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Santiago Texacuangos',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Santo Tomás',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Soyapango',10);
INSERT INTO Municipio(municipio, iddepartamento) values('Tonacatepeque',10);

-- San Vicente
INSERT INTO Municipio(municipio, iddepartamento) values('Apastepeque',11);
INSERT INTO Municipio(municipio, iddepartamento) values('Guadalupe',11);
INSERT INTO Municipio(municipio, iddepartamento) values('San Cayetano Istepeque',11);
INSERT INTO Municipio(municipio, iddepartamento) values('San Esteban Catarina',11);
INSERT INTO Municipio(municipio, iddepartamento) values('San Ildefonso',11);
INSERT INTO Municipio(municipio, iddepartamento) values('San Lorenzo',11);
INSERT INTO Municipio(municipio, iddepartamento) values('San Sebastián',11);
INSERT INTO Municipio(municipio, iddepartamento) values('San Vicente',11);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Clara',11);
INSERT INTO Municipio(municipio, iddepartamento) values('Santo Domingo',11);
INSERT INTO Municipio(municipio, iddepartamento) values('Tecoluca',11);
INSERT INTO Municipio(municipio, iddepartamento) values('Tepetitán',11);
INSERT INTO Municipio(municipio, iddepartamento) values('Verapaz',11);

-- Santa Ana
INSERT INTO Municipio(municipio, iddepartamento) values('Candelaria de la Frontera',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Chalchuapa',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Coatepeque',12);
INSERT INTO Municipio(municipio, iddepartamento) values('El Congo',12);
INSERT INTO Municipio(municipio, iddepartamento) values('El Porvenir',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Masahuat',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Metapán',12);
INSERT INTO Municipio(municipio, iddepartamento) values('San Antonio Pajonal',12);
INSERT INTO Municipio(municipio, iddepartamento) values('San Sebastian Salitrillo',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Ana',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Rosa Guachipilín',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Santiago de la Frontera',12);
INSERT INTO Municipio(municipio, iddepartamento) values('Texistepeque',12);

-- Sonsonate
INSERT INTO Municipio(municipio, iddepartamento) values('Acajutla',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Armenia',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Caluco',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Cuisnahuat',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Izalco',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Juayúa',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Nahuizalco',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Nahulingo',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Salcoatitán',13);
INSERT INTO Municipio(municipio, iddepartamento) values('San Antonio del Monte',13);
INSERT INTO Municipio(municipio, iddepartamento) values('San Julián',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Catarina Masahuat',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Isabel Ishuatán',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Santo Domingo de Guzmán',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Sonsonate',13);
INSERT INTO Municipio(municipio, iddepartamento) values('Sonzacate',13);

-- Usulután
INSERT INTO Municipio(municipio, iddepartamento) values('Alegría',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Berlín',14);
INSERT INTO Municipio(municipio, iddepartamento) values('California',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Concepción Batres',14);
INSERT INTO Municipio(municipio, iddepartamento) values('El Triunfo',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Ereguayquin',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Estanzuelas',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Jiquilisco',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Jucuapa',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Jucuarán',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Mercedes Umaña',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Nueva Granada',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Ozatlán',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Puerto El Triunfo',14);
INSERT INTO Municipio(municipio, iddepartamento) values('San Agustín',14);
INSERT INTO Municipio(municipio, iddepartamento) values('San Buenaventura',14);
INSERT INTO Municipio(municipio, iddepartamento) values('San Dionisio',14);
INSERT INTO Municipio(municipio, iddepartamento) values('San Francisco Javier',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa Elena',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Santa María',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Santiago de María',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Tecapán',14);
INSERT INTO Municipio(municipio, iddepartamento) values('Usulután',14);

-- Ubicacion
INSERT INTO Ubicacion(idmunicipio, direccion) VALUES(220, 'By pass Carretera a Metapán y carretera antigua a San Salvador');
INSERT INTO Ubicacion(idmunicipio, direccion) VALUES(16, 'Carretera a Ilobasco, km. 56, Cantón Agua Zarca, Cabañas.');
INSERT INTO Ubicacion(idmunicipio, direccion) VALUES(220, '25 Av. sur entre 9a y 11a calle oriente. Barrio San Rafael');

-- Facultades
INSERT INTO Facultad(facultad,idubicacion) VALUES('Facultad de Ciencias de la Salud',1);
INSERT INTO Facultad(facultad,idubicacion) VALUES('Facultad de Ciencias Empresariales',1);
INSERT INTO Facultad(facultad,idubicacion) VALUES('Facultad de Ciencias y Humanidades',1);
INSERT INTO Facultad(facultad,idubicacion) VALUES('Facultad de Ingeniería y Arquitectura',1);
INSERT INTO Facultad(facultad,idubicacion) VALUES('Maestrías Santa Ana',1);
INSERT INTO Facultad(facultad,idubicacion) VALUES('Facultad Multidisciplinaria de Ilobasco',2);

-- Tipo de carrera
INSERT INTO TipoCarrera(tipocarrera) VALUES('Presencial');
INSERT INTO TipoCarrera(tipocarrera) VALUES('Semi-Presencial');

-- Carreras
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Doctorado en Medicina',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Enfermería',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Técnico en Enfermería',1);

INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Administración de Empresas',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Administración de Empresas (Semipresencial)',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Sistemas Informáticos Administrativos',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Contaduría Pública',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Mercadeo y Negocios Internacionales',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Gestión y Desarrollo Turístico',1);

INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Diseño Gráfico Publicitario',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias Jurídicas',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Periodismo y Comunicación Audiovisual',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias Religiosas',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Idioma Inglés',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Idioma Inglés (Semipresencial)',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semipresencial)',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias de la Educación con Especialidad en Matemática (Semipresencial)',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Licenciatura en Ciencias de la Educación con Especialidad en Dirección y Administración Escolar (Semipresencial)',2);

INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería en Desarrollo de Software',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería en Telecomunicaciones y Redes',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería Civil',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería Industrial',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería en Sistemas Informáticos',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Ingeniería Agronómica',1);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Arquitectura',1);

INSERT INTO Carrera(carrera, tipocarrera) VALUES('Maestría en Asesoría Educativa',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Maestría en Dirección Estratégica de Empresas',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Maestría en Gestión y Desarrollo Turístico',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Maestría en Gerencia y Gestión Ambiental',2);

INSERT INTO Carrera(carrera, tipocarrera) VALUES('Técnico en Lácteos y Cárnicos',2);
INSERT INTO Carrera(carrera, tipocarrera) VALUES('Técnico en Gestión y Desarrollo Turístico',1);

-- Carreras por facultad
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(1,1);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(2,1);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(3,1);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(2,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(3,6);

INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(4,2);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(5,2);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(6,2);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(7,2);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(8,2);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(9,2);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(5,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(8,6);

INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(10,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(11,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(12,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(13,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(14,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(15,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(16,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(17,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(18,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(19,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(20,3);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(14,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(15,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(18,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(19,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(20,6);

INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(21,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(22,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(23,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(24,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(25,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(26,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(27,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(28,4);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(21,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(22,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(26,6);

INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(29,5);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(30,5);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(31,5);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(32,5);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(29,6);

INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(33,6);
INSERT INTO CarreraFacultad(idcarrera, idfacultad) VALUES(34,6);

-- Instituciones
INSERT INTO Institucion(nombre,ubicacion, telefono) VALUES('UNICAES, Santa Ana',1,'2484-0600');
INSERT INTO Institucion(nombre,ubicacion, telefono) VALUES('UNICAES, Ilobasco',2,'2378-1500');
INSERT INTO Institucion(nombre,ubicacion, telefono) VALUES('Fe y Alegría',3, '2447-2380');


-- Areas Laborales
INSERT INTO AreaLaboral(area) VALUES ('Administración de Empresas');
INSERT INTO AreaLaboral(area) VALUES ('Aeronáutica');
INSERT INTO AreaLaboral(area) VALUES ('Agropecuaria');
INSERT INTO AreaLaboral(area) VALUES ('Ambiental Forestal');
INSERT INTO AreaLaboral(area) VALUES ('Arquitectura');
INSERT INTO AreaLaboral(area) VALUES ('Artes Plásticas');
INSERT INTO AreaLaboral(area) VALUES ('Artes Escénicas');
INSERT INTO AreaLaboral(area) VALUES ('Atención al Cliente');
INSERT INTO AreaLaboral(area) VALUES ('Belleza y Estética');
INSERT INTO AreaLaboral(area) VALUES ('Biblioteca y Archivo');
INSERT INTO AreaLaboral(area) VALUES ('Biología');
INSERT INTO AreaLaboral(area) VALUES ('Bioquímica');
INSERT INTO AreaLaboral(area) VALUES ('Call Center');
INSERT INTO AreaLaboral(area) VALUES ('Call Center Soporte Técnico');
INSERT INTO AreaLaboral(area) VALUES ('Call Center Soporte Comercial');
INSERT INTO AreaLaboral(area) VALUES ('Call Center Telecobranzas');
INSERT INTO AreaLaboral(area) VALUES ('Call Center Ventas');
INSERT INTO AreaLaboral(area) VALUES ('Comercio');
INSERT INTO AreaLaboral(area) VALUES ('Comercio Exterior');
INSERT INTO AreaLaboral(area) VALUES ('Compras');
INSERT INTO AreaLaboral(area) VALUES ('Comunicación Audiovisual');
INSERT INTO AreaLaboral(area) VALUES ('Consultoría');
INSERT INTO AreaLaboral(area) VALUES ('Construcción Civil');
INSERT INTO AreaLaboral(area) VALUES ('Contabilidad y Auditoría');
INSERT INTO AreaLaboral(area) VALUES ('Cultura');
INSERT INTO AreaLaboral(area) VALUES ('Deportes');
INSERT INTO AreaLaboral(area) VALUES ('Desarrollo de Software');
INSERT INTO AreaLaboral(area) VALUES ('Diseño de Interiores');
INSERT INTO AreaLaboral(area) VALUES ('Diseño Gráfico');
INSERT INTO AreaLaboral(area) VALUES ('Economía');
INSERT INTO AreaLaboral(area) VALUES ('Educación');
INSERT INTO AreaLaboral(area) VALUES ('Electricidad Automotriz');
INSERT INTO AreaLaboral(area) VALUES ('Electricidad');
INSERT INTO AreaLaboral(area) VALUES ('Electromecánica');
INSERT INTO AreaLaboral(area) VALUES ('Electrónica');
INSERT INTO AreaLaboral(area) VALUES ('Farmacia');
INSERT INTO AreaLaboral(area) VALUES ('Finanzas');
INSERT INTO AreaLaboral(area) VALUES ('Fotografía');
INSERT INTO AreaLaboral(area) VALUES ('Fuerzas Armadas');
INSERT INTO AreaLaboral(area) VALUES ('Gastronomia');
INSERT INTO AreaLaboral(area) VALUES ('Geología');
INSERT INTO AreaLaboral(area) VALUES ('Gerencia de Empresas');
INSERT INTO AreaLaboral(area) VALUES ('Gerencia de Proyectos');
INSERT INTO AreaLaboral(area) VALUES ('Hotelería');
INSERT INTO AreaLaboral(area) VALUES ('Idioma Extranjero');
INSERT INTO AreaLaboral(area) VALUES ('Informática');
INSERT INTO AreaLaboral(area) VALUES ('Ingeniería Civil');
INSERT INTO AreaLaboral(area) VALUES ('Ingeniería Industrial');
INSERT INTO AreaLaboral(area) VALUES ('Jurídica');
INSERT INTO AreaLaboral(area) VALUES ('Literatura');
INSERT INTO AreaLaboral(area) VALUES ('Logística');
INSERT INTO AreaLaboral(area) VALUES ('Marketing');
INSERT INTO AreaLaboral(area) VALUES ('Matemática');
INSERT INTO AreaLaboral(area) VALUES ('Mecánica Automotríz');
INSERT INTO AreaLaboral(area) VALUES ('Mecánica Industrial');
INSERT INTO AreaLaboral(area) VALUES ('Metalúrgica');
INSERT INTO AreaLaboral(area) VALUES ('Meteorología');
INSERT INTO AreaLaboral(area) VALUES ('Microbiología de Alimentos');
INSERT INTO AreaLaboral(area) VALUES ('Música');
INSERT INTO AreaLaboral(area) VALUES ('Navegación Marítima');
INSERT INTO AreaLaboral(area) VALUES ('Nutrición');
INSERT INTO AreaLaboral(area) VALUES ('Oficios Varios');
INSERT INTO AreaLaboral(area) VALUES ('Organización y Planeación');
INSERT INTO AreaLaboral(area) VALUES ('Periodismo');
INSERT INTO AreaLaboral(area) VALUES ('Producción Industrial');
INSERT INTO AreaLaboral(area) VALUES ('Psicología');
INSERT INTO AreaLaboral(area) VALUES ('Publicidad');
INSERT INTO AreaLaboral(area) VALUES ('Química');
INSERT INTO AreaLaboral(area) VALUES ('Recursos Humanos');
INSERT INTO AreaLaboral(area) VALUES ('Relaciones Públicas');
INSERT INTO AreaLaboral(area) VALUES ('Salud');
INSERT INTO AreaLaboral(area) VALUES ('Secretaría');
INSERT INTO AreaLaboral(area) VALUES ('Seguridad');
INSERT INTO AreaLaboral(area) VALUES ('Seguridad Industrial');
INSERT INTO AreaLaboral(area) VALUES ('Servicio Social');
INSERT INTO AreaLaboral(area) VALUES ('Servicios Ministeriales Religiosos');
INSERT INTO AreaLaboral(area) VALUES ('Telecomunicaciones');
INSERT INTO AreaLaboral(area) VALUES ('Textil');
INSERT INTO AreaLaboral(area) VALUES ('Transporte');
INSERT INTO AreaLaboral(area) VALUES ('Turismo');
INSERT INTO AreaLaboral(area) VALUES ('Ventas');
INSERT INTO AreaLaboral(area) VALUES ('Veterinaria');

-- Diplomas / Certificados
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en educación de la primera infancia',1,31);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en prevensión de riesgos laborales',1,74);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en operaciones logísticas',1,51);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en higiene y seguridad ocupacional',1,74);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en educación inclusiva',1,31);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en formación docente',1,31);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Curso de Adobe Indesign',1,29);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Curso de Adobe Illustrator',1,29);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en gestión y mantenimiento de redes (CISCO)',1,77);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Curso básico de primeros auxilios',1,71);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Estación total y uso de colectora externa',1,47);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Ejecutivo de ventas externas (INSAFORP)',1,81);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Ingles para el trabajo (INSAFORP)',1,45);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Diplomado en folklore nacional',1,25);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Taller de dibujo y pintura',1,6);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Taller de guitarra',1,59);
INSERT INTO DiplomaCertificacion(nombre, institucion, arealaboral) VALUES ('Taller de violín',1,59);

INSERT INTO Aptitud(aptitud) VALUES('Responsable');
INSERT INTO Aptitud(aptitud) VALUES('Trabajo en equipo');
INSERT INTO Aptitud(aptitud) VALUES('Amable');
INSERT INTO Aptitud(aptitud) VALUES('Puntual');

INSERT INTO Cargo(cargo) VALUES('CEO');
INSERT INTO Cargo(cargo) VALUES('Coordinador de venta');
INSERT INTO Cargo(cargo) VALUES('Coordinador de bodega');
INSERT INTO Cargo(cargo) VALUES('Coordinador RRHH');
INSERT INTO Cargo(cargo) VALUES('Lider de Ventas');
INSERT INTO Cargo(cargo) VALUES('Transportadores');
INSERT INTO Cargo(cargo) VALUES('Aux de bodega');
INSERT INTO Cargo(cargo) VALUES('Aux de transporte');

INSERT INTO Persona(dui,nit,nombre,apellido,telefono,direccion,correo,fechanacimiento,sexo,foto)
VALUES('0000000-0','0000-000000-000-0','persona de','prueba','0000-0000','direcion de prueba','correo.prueba@catolica.edu.sv',NOW(),'X','url.fotoprueba.jgp');

INSERT INTO Decano(dui,facultad) VALUES('0000000-0',4);

INSERT INTO Usuario(dui,usuario,contrasena) VALUES('0000000-0', 'user', 'pass');

INSERT INTO Egresado(dui,carnet) VALUES('0000000-0','2020-PP-000');
INSERT INTO CarreraEgresado(dui,idcarrera) VALUES('0000000-0',26);
INSERT INTO DiplomaCertificacionEgresado(dui,diplomacertificacion,fecha,foto) VALUES('0000000-0',9,NOW(),'url.fotodiploma.jpg');
INSERT INTO AptitudEgresado(idaptitud,dui) VALUES(1,'0000000-0');
INSERT INTO AptitudEgresado(idaptitud,dui) VALUES(2,'0000000-0');

INSERT INTO ExperienciaLaboral(egresado,institucion,cargo,arealaboral,fechainicio,fechafin)
VALUES('0000000-0',3,4,69,NOW(),NOW());
