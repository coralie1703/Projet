use greengarden;
DROP TABLE IF EXISTS t_d_user;


CREATE TABLE IF NOT EXISTS t_d_user (Id_User int(11) NOT NULL AUTO_INCREMENT,
 Id_UserType int(11) NOT NULL,
Login varchar(255) NOT NULL,
Password varchar(255) NOT NULL,
PRIMARY KEY (Id_User), KEY t_d_user_ibfk_1 (Id_UserType)) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT
CHARSET=utf8mb4;

--
-- Structure de la table t_d_usertype
--

DROP TABLE IF EXISTS t_d_usertype;


CREATE TABLE IF NOT EXISTS t_d_usertype (Id_UserType int(11) NOT NULL AUTO_INCREMENT,
Libelle varchar(50) NOT NULL,
PRIMARY KEY (Id_UserType)) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT
CHARSET=utf8mb4;

--
-- Déchargement des données de la table t_d_usertype
--

INSERT INTO t_d_usertype (Id_UserType, Libelle)
VALUES (1,
        'Client'), (2,
                    'Admin'), (3,
                               'Commercial');


INSERT INTO t_d_usertype (Id_UserType, Libelle) VALUES (4, 'TechnicienSAV');