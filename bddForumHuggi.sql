

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de données : `forum_Huggi`

-- --------------------------------------------------------

CREATE DATABASE forumhuggi;

CREATE TABLE messages (

id_message INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_util INT(11) NULL,
id_sujet INT(11) NOT NULL,
dateMessage DATE NOT NULL,
heureMessage TIME(5) NOT NULL,
message_contenu VARCHAR(500) NOT NULL,

FOREIGN KEY (id_sujet) REFERENCES sujet (id_sujet) ON DELETE RESTRICT ON UPDATE CASCADE,

FOREIGN KEY (id_util) REFERENCES utilisateurs (id_util) ON DELETE RESTRICT ON UPDATE CASCADE,

);

CREATE TABLE sujet (

id_sujet INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_util INT(11) NULL,
titre_sujet VARCHAR(50) NOT NULL,
sujet_conteunu VARCHAR(500) NOT NULL,
date_sujet DATE NOT NULL,
heure_sujet TIME(6) NOT NULL,

FOREIGN KEY (id_util) REFERENCES utilisateurs (id_util) ON DELETE RESTRICT ON UPDATE CASCADE,

);
CREATE TABLE utilisateurs (

id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY ,

nom VARCHAR(10) NOT NULL,
prenom VARCHAR(10) NOT NULL,
login_util VARCHAR(25) NOT NULL,
mdp VARCHAR(25) NOT NULL,


);