CREATE DATABASE Playlist;
use Playlist;

CREATE TABLE Musicos(
    MusicosID int not null AUTO_INCREMENT,
    Nome varchar(100) NOT NULL,
    Sobrenome varchar(100)  NOT NULL,
    PRIMARY KEY (MusicosID)
);

INSERT INTO Musicos(Nome, Sobrenome)
VALUES  ("David", "Gilmour"), ("Larry", "Carlton"), ("Jimmi", "Hendrix"), ("Greg", "Howe"), ("Frank","Zappa");