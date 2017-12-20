ALTER TABLE Schueler
ADD FOREIGN KEY (Klasse) REFERENCES Klasse(KlasseID);

ALTER TABLE Klasse 
ADD FOREIGN KEY (istKlassenlehrer) REFERENCES Lehrer(LehrerID);

ALTER TABLE Klasse 
ADD FOREIGN KEY (istKlassensprecher) REFERENCES Schueler(SchuelerID);

ALTER TABLE Checkliste 
ADD FOREIGN KEY (Lehrer) REFERENCES Lehrer(LehrerID);

ALTER TABLE Checkliste 
ADD FOREIGN KEY (Klasse) REFERENCES Klasse(KlasseID);

ALTER TABLE Checklisteneintrag
ADD FOREIGN KEY (Schueler) REFERENCES Schueler(SchuelerID);

ALTER TABLE Checklisteneintrag
ADD FOREIGN KEY (Checkliste) REFERENCES Checkliste(ChecklisteID);