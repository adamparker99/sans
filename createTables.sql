CREATE TABLE movies (
   id int NOT NULL auto_increment,
   title char(50) NOT NULL,
   format text,
   length int DEFAULT '0',
   releaseYear int DEFAULT '0',
   rating int DEFAULT null,
   PRIMARY KEY (id)
);
INSERT INTO movies (title, format, length, releaseYear, 
  rating) 
VALUES ('Signs', 'DVD', 128, 2004, 
  3);
