CREATE DATABASE Playlist;
use Playlist;

CREATE TABLE Musicas(
    MusicaID int not null AUTO_INCREMENT,
    Musica varchar(100) NOT NULL,
    Artista varchar(100)  NOT NULL,
    PRIMARY KEY (MusicaID)
);

INSERT INTO Musicas(Musica, Artista)
VALUES  ("No Way","David Gilmour"), ("RCM","Larry Carlton"), ("Bold as Love","Jimmi Hendrix"), ("Tempest Pulse","Greg Howe"), ("Nanook Rubs It","Frank Zappa"), ("Deep Blue Sea", "John Mayall"),("Breakdown", "Tom Petty"),("A Quitter Never Wins", "John Mayall"),("Good Vibrations","Ten Years After"),("Sledgehammer","Martin Miller");