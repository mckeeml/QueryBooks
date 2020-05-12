USE mckeeml; /*tester is the name of the database*/

DROP TABLE IF EXISTS books;
CREATE TABLE books
(
   ID  varchar(5) NOT NULL PRIMARY KEY,
   Title varchar(60),
   Category varchar(32),
   ISBN varchar(20),
   Price decimal(5,2)
);
INSERT INTO books (ID, Title,Category,ISBN, Price) VALUES ('B1111','PHP with MySQL Programming','Programming','0132575677', 198.89);
INSERT INTO books (ID, Title,Category,ISBN, Price) VALUES ('B2222','Visual Basic 2015 How to Program','Programming','0132152134', 124);
INSERT INTO books (ID, Title,Category,ISBN, Price) VALUES ('B3333','Visual C# 2015','Programming','0132151421', 107.80);
INSERT INTO books (ID, Title,Category,ISBN, Price) VALUES ('B4444','Java Programming','Programming','0132575663', 123);
INSERT INTO books (ID, Title,Category,ISBN) VALUES ('B5555','C++ How to Program','Programming','0132662361');
INSERT INTO books (ID, Title,Category,ISBN) VALUES ('B6666','C How to Program','Programming','0136123562');
INSERT INTO books (ID, Title,Category,ISBN) VALUES ('B7777','Internet & World Wide Web How to Program','Programming','0132151006');
INSERT INTO books (ID, Title,Category,ISBN, Price) VALUES ('B8888','Operating Systems','Operating Systems','0131828274', 80.50);

DROP TABLE IF EXISTS authors;
CREATE TABLE authors
(
   ID  varchar(5) NOT NULL PRIMARY KEY,
   Name varchar(50)
);
INSERT INTO authors (ID, Name) VALUES ('A1111', 'Paul Deitel');
INSERT INTO authors VALUES ('A2222', 'John Ulman');
INSERT INTO authors VALUES ('A3333','Johny Scott');
INSERT INTO authors VALUES ('A4444','Scott Davis');
INSERT INTO authors VALUES ('A5555','Norman Finkelstein');
INSERT INTO authors VALUES ('A6666','Tom Davis');

DROP TABLE IF EXISTS books_authors;
CREATE TABLE books_authors
(
   BID varchar(5) NOT NULL,
   AID varchar(5) NOT NULL,
   PRIMARY KEY(BID, AID),
   FOREIGN KEY (BID) REFERENCES books(ID),
   FOREIGN KEY (AID) REFERENCES authors(ID)
);

INSERT INTO books_authors VALUES ('B1111', 'A6666');
INSERT INTO books_authors VALUES ('B1111', 'A1111');
INSERT INTO books_authors VALUES ('B2222', 'A1111');
INSERT INTO books_authors VALUES ('B3333', 'A3333');
INSERT INTO books_authors VALUES ('B4444', 'A6666');
INSERT INTO books_authors VALUES ('B5555', 'A2222');
INSERT INTO books_authors VALUES ('B6666', 'A3333');
INSERT INTO books_authors VALUES ('B7777', 'A4444');
INSERT INTO books_authors VALUES ('B7777', 'A1111');
INSERT INTO books_authors VALUES ('B8888', 'A5555');







