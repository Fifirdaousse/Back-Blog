USE `520_fc`;

INSERT INTO role (id, nom) VALUES
     (10, 'Gestionnaire')
    ,(20, 'Membre')
;

INSERT INTO utilisateur (id, nom, prenom, email, motDePasse, idRole) VALUES
     (1, 'Lee', 'Logan', 'logan.lee@gmail.com', 'seol-a', 10 )
    ,(2, 'Cha', 'Seo-Jin', 'chaseojin@outlook.com', 'cheong-a', 20)
    ,(3, 'Shim', 'Soo-ryeon', 'seol-a@icloud.com', 'herapalace', 10)
;

INSERT INTO article (id, titre, description, texte, illustration, idUtilisateur) VALUES
     (1, 'Landscape', 'HI', 'Lorem dolors the penthouse', NULL, 1)
    ,(2, 'Crime', 'hello', 'Lorem dolors the penthouse', NULL, 3)
;

INSERT INTO commentaire (id, texte, date, heure, idUtilisateur, idArticle) VALUES
     (1, 'Best article', '2023-05-15', '14:00', 2, 1)
    ,(2, 'So awesome', '2023-05-10', '10:00', 1, 1)
;

