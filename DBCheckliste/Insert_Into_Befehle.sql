INSERT INTO Lehrer (Vorname,Nachname,Kuerzel,Passwort,Admin)
VALUES ('Martin','Mog','MOG','$2y$10$ltwpcrCQjZE837Rr80jaI.eAt6mY6oQZTtOCMp9bg/VFqzMhunB4K','0'),
		('Sexy','Administrator','ADM','$2y$10$sJ0a5hwNnwfHGHEI.AyBzOghZtp46oJz43MjPvStais7Ahr5asgoW','1');
--Mog123
-- 12345
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
