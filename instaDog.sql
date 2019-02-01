CREATE DATABASE InstaDog;

CREATE USER 'adminInstaDog'@'localhost' IDENTIFIED BY 'digital2018';

GRANT ALL PRIVILEGES ON InstaDog.* TO 'adminInstaDog'@'localhost';

FLUSH PRIVILEGES;


CREATE TABLE Utilisateur (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    utilisateur VARCHAR(100),
    motDePasse VARCHAR(255),
    dateDernierConnexion DATE
);


CREATE TABLE Chien (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    nomElevage VARCHAR(100),
    surNom VARCHAR(100),
    dateNaissance DATE,
    sexe VARCHAR(100),
    race VARCHAR(100),
    user_id INT(100),
    photo VARCHAR(100)
    FOREIGN KEY (user_id) REFERENCES Utilisateur(id)
);


CREATE TABLE Article (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    photo VARCHAR(200),
    texte VARCHAR(250),
    dateDePublication DATE,
    id_chien INT(100),
    FOREIGN KEY (id_Chien) REFERENCES Chien(id)
);


CREATE TABLE Commentaires(
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    TexteDuCommentaire VARCHAR(1000),
    dateCommentaire DATE,
    user_id INT (100),
    id_Article INT (100),
    FOREIGN KEY (user_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);