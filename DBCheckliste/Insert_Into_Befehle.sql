INSERT INTO Lehrer (Vorname,Nachname,Kuerzel,Passwort,Admin)
VALUES ('Martin','Mog','MOG','Mog123','0'),
		('Christoph','Töller','TOEL','Töller123','0'),
		('Joachim','Spitz','SPIT','Spitz123','0'),
		('Sexy','Administrator','ADM','12345','1');

INSERT INTO Klasse (Bezeichnung, istklassenlehrer)
VALUES 	('AIF11','1'),
('AIF21','2'),
('AIF31','3');

INSERT INTO Schueler (Vorname, Nachname,Geburtsdatum,Klasse)
VALUES ('Florian','Kree','1998-01-01','3'),
		('Lukas','Küster','1998-02-02','3'),
		('Alexander','Stein','1998-01-03','3');

INSERT INTO Checkliste (Titel,Erstelldatum,Deadline,Lehrer,Klasse)
VALUES	('Anwesenheit','2018-01-08','2018-01-12','3','3'),
		('Anwesenheit','2018-01-15','2018-01-19','3','3'),
		('Anwesenheit','2018-01-22','2018-01-26','3','3');

INSERT INTO Checklisteneintrag (Abgehakt,Schueler,Checkliste)
VALUES	('1','3','1'),
		('0','3','2'),
		('0','3','3');
