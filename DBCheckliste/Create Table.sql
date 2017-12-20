CREATE DATABASE DBCheckliste;
USE DBCheckliste;

CREATE TABLE Schueler
(
SchuelerID INT NOT NULL AUTO_INCREMENT,
Vorname VARCHAR(30),
Nachname VARCHAR(30),
Geburtsdatum DATE,
Klasse INT,
PRIMARY KEY(SchuelerID)
)ENGINE=InnoDB;

CREATE TABLE Klasse
(
KlasseID INT NOT NULL AUTO_INCREMENT,
Bezeichnung VARCHAR(5),
istKlassensprecher INT,
istKlassenlehrer INT,
PRIMARY KEY(KlasseID)
)ENGINE=InnoDB;

CREATE TABLE Lehrer
(
LehrerID INT NOT NULL AUTO_INCREMENT,
Vorname VARCHAR(30),
Nachname VARCHAR(30),
Kuerzel VARCHAR(4),
Passwort VARCHAR(40),
PRIMARY KEY(LehrerID)
)ENGINE=InnoDB;

CREATE TABLE Checkliste
(
ChecklisteID INT NOT NULL AUTO_INCREMENT,
Titel VARCHAR(20),
Erstelldatum DATE,
Deadline DATE,
Status Bool DEFAULT 0,
Lehrer INT,
Klasse INT,
PRIMARY KEY(ChecklisteID)
)ENGINE=InnoDB;

CREATE TABLE Checklisteneintrag
(
ChecklisteneintragID INT NOT NULL AUTO_INCREMENT,
Abgeharkt Bool DEFAULT 0,
Schueler INT,
Checkliste INT,
PRIMARY KEY(ChecklisteneintragID)
)ENGINE=InnoDB;