
CREATE DATABASE PrGimnasia
USE PrGimnasia

CREATE TABLE Nivel(
Clv_Nivel INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Nivel VARCHAR(20),
Descripcion VARCHAR(20))

CREATE TABLE Pais(
Id_Pais  VARCHAR(3) PRIMARY KEY NOT NULL ,
Pais VARCHAR(15))

CREATE TABLE Cuidad(
Id_Cuidad VARCHAR(3) PRIMARY KEY NOT NULL,
Cuidad VARCHAR(20),
Id_Pais VARCHAR(3) FOREIGN KEY REFERENCES  Pais(Id_Pais))

CREATE TABLE Asociacion(
Id_Asociacion INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Asociacion VARCHAR(20),
Tipo VARCHAR(15))


CREATE TABLE  USUARIO(
ID_Usuario INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Clave VARCHAR(8),
Nombre VARCHAR(20),
ApellidoP VARCHAR(20),
ApellidoM VARCHAR(20),
FechaNacimiento DATE,
Peso DECIMAL(3,2),
Estatura DECIMAL(2,2),
Estatus bit,
Clv_Nivel INT FOREIGN KEY REFERENCES  Nivel(Clv_Nivel),
Id_Cuidad VARCHAR(3) FOREIGN KEY REFERENCES  Cuidad(Id_Cuidad),
Id_Asociacion  INT FOREIGN KEY REFERENCES  Asociacion(Id_Asociacion))

CREATE TABLE  TUTOR(
ID_Tutor INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Clave VARCHAR(8) NOT NULL,
Nombre VARCHAR(40) NOT NULL,
ApellidoP VARCHAR(20) NOT NULL,
ApellidoM VARCHAR(20) NOT NULL,
Estatus BIT,
FechaNacimiento DATE NOT NULL,
Parentesco VARCHAR(20) NOT NULL,
Telefono  VARCHAR(15) NOT NULL,
Correo  VARCHAR(40) NOT NULL,
Direccion VARCHAR(50) NOT NULL)

CREATE TABLE TUTOR_USUARIO(
ID_Usuario  INT NOT NULL,
ID_Tutor INT NOT NULL,
PRIMARY KEY (ID_Usuario,ID_Tutor),
FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario),
FOREIGN KEY (ID_Tutor) REFERENCES Tutor(ID_Tutor))

CREATE TABLE Curso(
Clv_Curso INT NOT NULL PRIMARY KEY  IDENTITY (1,1),
Curso VARCHAR(40))

CREATE TABLE Tutor_Curso(
Clv_Curso INT NOT NULL,
ID_Tutor INT NOT NULL,
Estatus bit,
PRIMARY KEY (Clv_Curso,ID_Tutor),
FOREIGN KEY (Clv_Curso) REFERENCES Curso(Clv_Curso),
FOREIGN KEY (ID_Tutor) REFERENCES Tutor(ID_Tutor))


CREATE TABLE Fractura(
Id_Fractura INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Fractura VARCHAR(30),
Tipo VARCHAR(30))


CREATE TABLE Usuario_Fractura(
Id_Fractura INT NOT NULL,
ID_Usuario INT NOT NULL,
PRIMARY KEY (Id_Fractura,ID_Usuario),
FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario),
FOREIGN KEY (Id_Fractura) REFERENCES Fractura(Id_Fractura))

CREATE TABLE Modulo(
Id_Modulo INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Modulo VARCHAR(30))



CREATE TABLE Evaluacion(
Id_Evaluacion INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Evaluacion VARCHAR (30),
Ejercicio Varchar(30),
Id_Modulo INT FOREIGN KEY REFERENCES Modulo(Id_Modulo))

CREATE TABLE  Entrenador(
Id_Entrenador INT NOT NULL PRIMARY KEY IDENTITY(1,1),
Clave VARCHAR(8),
Nombre VARCHAR(40) ,
ApellidoP VARCHAR(20) ,
ApellidoM VARCHAR(20) ,
FechaNacimiento DATE,
Id_Cuidad VARCHAR(3) FOREIGN KEY REFERENCES  Cuidad(Id_Cuidad),
Id_Asociacion  INT FOREIGN KEY REFERENCES  Asociacion(Id_Asociacion),
Telefono  VARCHAR(15) ,
Correo  VARCHAR(40) ,
Direccion VARCHAR(50))

CREATE TABLE Evaluacion_Usuario(
Id_Evaluacion INT NOT NULL,
ID_Usuario INT NOT NULL,
Id_Entrenador  INT NOT NULL,
Puntuacion INT,
comentario  VARCHAR(100),
Estatus BIT,
PRIMARY KEY (Id_Evaluacion,ID_Usuario,Id_Entrenador),
FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario),
FOREIGN KEY (Id_Evaluacion) REFERENCES Evaluacion(Id_Evaluacion),
FOREIGN KEY (Id_Entrenador) REFERENCES Entrenador(Id_Entrenador))


