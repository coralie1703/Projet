<!-- CREATION TABLE -->
<!-- Création de la table statut retour-->
CREATE TABLE Statut_Retour(
   Id_Etat_Retour INT,
   Libelle_Etat VARCHAR(20) NOT NULL,
   PRIMARY KEY(Id_Etat_Retour)
);

<!-- Création de la table SAV-->
CREATE TABLE SAV(
   Id_Technicien INT,
   Nom_Technicien VARCHAR(20) NOT NULL,
   Prenom_Technicien VARCHAR(20) NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Technicien),
   FOREIGN KEY(Id_User) REFERENCES t_d_user(Id_User)
);

<!-- Création de la table ticket retour-->
CREATE TABLE Ticket_Retour(
   Id_Ticket INT,
   Type_Retour VARCHAR(20) NOT NULL,
   Date_Retour DATE NOT NULL,
   Id_Etat_Retour INT NOT NULL,
   Id_Technicien INT NOT NULL,
   Id_Commande INT NOT NULL,
   PRIMARY KEY(Id_Ticket),
   FOREIGN KEY(Id_Etat_Retour) REFERENCES Statut_Retour(Id_Etat_Retour),
   FOREIGN KEY(Id_Technicien) REFERENCES SAV(Id_Technicien),
   FOREIGN KEY(Id_Commande) REFERENCES t_d_commande(Id_Commande)
);

<!-- Insérer dans la table SAV les infos technicien -->
INSERT INTO sav (Id_Technicien, Nom_Technicien, Prenom_Technicien, Id_User) VALUES (1, 'Durand', 'Pierre', 13), (2, 'Dupond', 'Jacque', 14);

<!-- Insérer dans la table statut retour les infos de retour -->
INSERT INTO statut_retour (Id_Etat_Retour, Libelle_Etat) VALUES (1, 'En traitement'), (2, 'Traité'), (3, 'Remboursement');

