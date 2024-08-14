CREATE DATABASE FUT;

USE FUT;

-- Table Club
CREATE TABLE Club (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(45) NOT NULL
);

-- Table Players
CREATE TABLE Players (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(50) NOT NULL,
    Poste VARCHAR(50),
    Nation VARCHAR(50),
    Note INT,
    Price VARCHAR(50),
    Club_ID INT,
    FOREIGN KEY (Club_ID) REFERENCES Club(ID)
);

-- Table Transfert
CREATE TABLE Transfert (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Players_ID INT,
    New_Club_ID INT,
    FOREIGN KEY (Players_ID) REFERENCES Players(ID),
    FOREIGN KEY (New_Club_ID) REFERENCES Club(ID)
); 

INSERT INTO Club (Nom)
VALUES
('Paris Saint-Germain'),
('FC Barcelona'),
('Al-Nassr FC'),
('Manchester City'),
('Atlético Madrid'),
('Liverpool FC'),
('Bayern Munich'),
('Real Madrid');


INSERT INTO Players (Name, Poste, Nation, Note, Price, Club_ID)
VALUES
('Lionel Messi', 'RW', 'Argentine', 93, '120000', 1),
('Robert Lewandowski', 'ST', 'Pologne', 92, '100000', 2),
('Cristiano Ronaldo', 'ST', 'Portugal', 91, '130000', 3),
('Kylian Mbappé', 'ST', 'France', 91, '160000', 1),
('Kevin De Bruyne', 'CM', 'Belgique', 91, '110000', 4),
('Neymar Jr', 'LW', 'Brésil', 91, '140000', 1),
('Jan Oblak', 'GK', 'Slovénie', 91, '80000', 5),
('Mohamed Salah', 'RW', 'Égypte', 90, '95000', 6),
('Virgil van Dijk', 'CB', 'Pays-Bas', 90, '100000', 6),
('Sadio Mané', 'LW', 'Sénégal', 89, '90000', 7),
('Jude Bellimgham', 'MC', 'Angleterre', 91, '150000',8),
('Lamine Yamal', 'AD', 'Espagne', 97, '200000',2);

ALTER TABLE Players ADD COLUMN Image_URL VARCHAR(255);

UPDATE Players SET Image_URL = 'https://library.sportingnews.com/2021-11/lionel-messi-fut-base-93_1o3m39jkuh20j1itc0w2pe9x0d.png' WHERE Name = 'Lionel Messi';
UPDATE Players SET Image_URL = 'https://media.contentapi.ea.com/content/dam/ea/fifa/fifa-22/news/common/ratings-reveal/bundesliga/robert-lewandowski.png.adapt.crop16x9.652w.png' WHERE Name = 'Robert Lewandowski';
UPDATE Players SET Image_URL = '
https://game-assets.fut.gg/2023/cards/futgg-cards/117461313.webp?quality=80&width=200
' WHERE Name = 'Cristiano Ronaldo'; 
UPDATE Players SET Image_URL = 'https://image.jeuxvideo.com/medias-sm/163162/1631618091-773-artwork.png' WHERE Name = 'Kylian Mbappé';
UPDATE Players SET Image_URL = 'https://media.contentapi.ea.com/content/dam/ea/fifa/fifa-22/news/common/ratings-reveal/best-passers/kevin-de-bruyne.png.adapt.crop16x9.652w.png' WHERE Name = 'Kevin De Bruyne';
UPDATE Players SET Image_URL = 'https://image.jeuxvideo.com/medias-sm/163162/1631618091-6987-artwork.png' WHERE Name = 'Neymar Jr';
UPDATE Players SET Image_URL = 'https://media.contentapi.ea.com/content/dam/ea/fifa/fifa-22/news/common/ratings-reveal/ratings-reveal-laliga-santander/jan-oblak.png.adapt.crop16x9.652w.png' WHERE Name = 'Jan Oblak';
UPDATE Players SET Image_URL = 'https://www.inydy.com/wp-content/uploads/2021/05/SALAH_LIVERPOOL.png' WHERE Name = 'Mohamed Salah';
UPDATE Players SET Image_URL = 'https://www.inydy.com/wp-content/uploads/2021/05/VAN-DIJK_LIVERPOOL.png' WHERE Name = 'Virgil van Dijk';
UPDATE Players SET Image_URL = 'https://media.contentapi.ea.com/content/dam/ea/fifa/fifa-22/news/common/ratings-reveal/best-dribblers/sadio-mane.png.adapt.crop16x9.652w.png' WHERE Name = 'Sadio Mané';

UPDATE Players SET Image_URL = 'https://www.futoir.fr/wp-content/uploads/2023/01/Bellingham.png' WHERE Name = 'Jude Bellimgham';
UPDATE Players SET Image_URL = 'https://pbs.twimg.com/media/GSehyo_XYAACeXw.png' WHERE Name = 'Lamine Yamal';
