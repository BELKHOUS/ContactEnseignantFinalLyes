
DROP TABLE IF EXISTS DispNouioua;
DROP TABLE IF EXISTS DispEstellon;
DROP TABLE IF EXISTS DispDinaz;
DROP TABLE IF EXISTS DispCreignou;



/*Creation des Table*/

CREATE TABLE DispNouioua (
Heure varchar(10) NOT NULL,
jour varchar(10),
Etat varchar(10) NOT NULL,

 PRIMARY KEY(Heure,jour,Etat)
);

CREATE TABLE DispEstellon (
Heure varchar(10) NOT NULL,
jour varchar(10),
Etat varchar(10) NOT NULL,

 PRIMARY KEY(Heure,jour,Etat)
);
CREATE TABLE DispDinaz (
Heure varchar(10) NOT NULL,
jour varchar(10),
Etat varchar(10) NOT NULL,

 PRIMARY KEY(Heure,jour,Etat)
);

CREATE TABLE DispCreignou (
Heure varchar(10) NOT NULL,
jour varchar(10),
Etat varchar(10) NOT NULL,

 PRIMARY KEY(Heure,jour,Etat)
);
