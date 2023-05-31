-- Supprime la base de données si elle existe déjà
DROP DATABASE IF EXISTS `520_fc`;

-- Crée la base de données
CREATE DATABASE IF NOT EXISTS `520_fc`;

-- Crée l'utilisateur applicatif 'admin',
-- et lui donne tous les droits sur la base de données '520_fc'
-- DROP USER IF EXISTS admin_520;
-- CREATE USER 'admin_520'@'localhost' IDENTIFIED BY 'password';
-- GRANT ALL ON 520_fc.* TO 'admin_520'@'localhost';

-- Crée l'utilisateur applicatif 'user'
-- DROP USER IF EXISTS user_520;
-- CREATE USER 'user_520'@'localhost' IDENTIFIED BY 'password';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON 520_fc.* TO 'user_520'@'localhost';

USE `520_fc`;

CREATE TABLE article (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,titre  varchar(50) NOT NULL
  ,description varchar(80) NOT NULL
  ,texte varchar(50) NOT NULL
  ,illustration varbinary(500)
  ,idUtilisateur bigint(20) NOT NULL
)
;

CREATE TABLE utilisateur (
   id bigint (20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,nom varchar(50) NOT NULL
  ,prenom varchar(50) NOT NULL
  ,email varchar (50) NOT NULL
  ,motDePasse varchar (50) NOT NULL
  ,idRole bigint (20)
)
;

CREATE TABLE commentaire (
   id bigint(20)NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,texte varchar (50) NOT NULL
  ,date DATE NOT NULL
  ,heure time NOT NULL
  ,idUtilisateur bigint (20) NOT NULL
  ,idArticle bigint(20) NOT NULL
)
;

CREATE TABLE role (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,nom varchar(50) NOT NULL
)
;

ALTER TABLE article
 ADD CONSTRAINT `u_article_titre` UNIQUE(titre)
,ADD CONSTRAINT `fk_article_utilisateur` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id)
;

ALTER TABLE utilisateur
 ADD CONSTRAINT `u_nom_utilisateur` UNIQUE (nom)
,ADD CONSTRAINT `fk_utilisateur_role` FOREIGN KEY (idRole) REFERENCES role(id)
;

ALTER TABLE commentaire
ADD CONSTRAINT `fk_commentaire_utilisateur` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id)
,ADD CONSTRAINT `fk_commentaire_article` FOREIGN KEY (idArticle) REFERENCES article(id)
;