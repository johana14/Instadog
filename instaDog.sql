CREATE DATABASE InstaDog;

CREATE USER 'adminInstaDog'@'localhost' IDENTIFIED BY 'Inst@D0g';

GRANT ALL PRIVILEGES ON InstaDog.* TO 'adminInstaDog'@'localhost';

FLUSH PRIVILEGES;


CREATE TABLE Utilisateur (
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    utilisateur VARCHAR(100),
    motDePasse VARCHAR(255),
    dateDernierConnexion DATE,

);


CREATE TABLE Chien (
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomElevage VARCHAR(100),
    nom VARCHAR(100),
    dateNaissance DATE,
    sexe VARCHAR(100),
    race VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES Utilisateur(id)
);


CREATE TABLE Article (
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img VARCHAR(200),
    texte VARCHAR(250),
    dateDePublication DATE,
    FOREIGN KEY (id_Chien) REFERENCES Chien(id)
);


CREATE TABLE Commentaires(
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    TexteDuCommentaire VARCHAR(1000),
    dateCommentaire DATE,
    FOREIGN KEY (user_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (id_Article) REFERENCES Article(id)
    );