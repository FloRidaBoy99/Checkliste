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
Passwort VARCHAR(255),
Admin bool DEFAULT 0,
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
Abgehakt Bool DEFAULT 0,
Schueler INT,
Checkliste INT,
PRIMARY KEY(ChecklisteneintragID)
)ENGINE=InnoDB;

ALTER TABLE Schueler ADD FOREIGN KEY (Klasse) REFERENCES Klasse(KlasseID) ON DELETE CASCADE;

ALTER TABLE Klasse ADD FOREIGN KEY (istKlassenlehrer) REFERENCES Lehrer(LehrerID) ON DELETE CASCADE;

ALTER TABLE Klasse ADD FOREIGN KEY (istKlassensprecher) REFERENCES Schueler(SchuelerID) ON DELETE CASCADE;

ALTER TABLE Checkliste ADD FOREIGN KEY (Lehrer) REFERENCES Lehrer(LehrerID) ON DELETE CASCADE;

ALTER TABLE Checkliste ADD FOREIGN KEY (Klasse) REFERENCES Klasse(KlasseID) ON DELETE CASCADE;

ALTER TABLE Checklisteneintrag ADD FOREIGN KEY (Schueler) REFERENCES Schueler(SchuelerID) ON DELETE CASCADE;

ALTER TABLE Checklisteneintrag ADD FOREIGN KEY (Checkliste) REFERENCES Checkliste(ChecklisteID) ON DELETE CASCADE;

INSERT INTO Lehrer (Vorname,Nachname,Kuerzel,Passwort,Admin)
VALUES ('Martin','Mog','MOG','$2y$10$ltwpcrCQjZE837Rr80jaI.eAt6mY6oQZTtOCMp9bg/VFqzMhunB4K','0'),
		('Sexy','Administrator','ADM','$2y$10$sJ0a5hwNnwfHGHEI.AyBzOghZtp46oJz43MjPvStais7Ahr5asgoW','1');
-- Passwort Mog: Mog123
-- Passwort ADM: 12345
INSERT INTO Klasse (Bezeichnung, istklassenlehrer)
VALUES 	('AIF11','1'),
('AIF21','1'),
('AIF31','1');

INSERT INTO Schueler (Vorname, Nachname,Geburtsdatum,Klasse)
VALUES ('Florian','Kree','1998-01-01','3'),
		('Lukas','Küster','1998-02-02','3'),
		('Alexander','Stein','1998-01-03','3');

INSERT INTO Checkliste (Titel,Erstelldatum,Deadline,Lehrer,Klasse)
VALUES	('Anwesenheit','2018-01-08','2018-01-12','1','3'),
		('Hausaufgaben','2018-01-15','2018-01-19','1','3'),
		('DB Projekt Abgabe','2018-01-22','2018-01-26','1','3');

INSERT INTO Checklisteneintrag (Abgehakt,Schueler,Checkliste)
VALUES	('0','1','1'),
		('1','2','1'),
		('0','3','1'),
		('1','1','2'),
		('0','2','2'),
		('1','3','2'),
		('0','1','3'),
		('1','2','3'),
		('0','3','3');
