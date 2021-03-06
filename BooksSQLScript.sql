USE BooksDB; /*BooksDB is the name of the database*/

DROP TABLE IF EXISTS books;

CREATE TABLE books
(
   BID char(10),
   Title varchar(60),
   Category varchar(32),
   ISBN varchar(20),
   Price decimal(5,2) 
);
INSERT INTO books (BID, Title,Category,ISBN, Price) VALUES ('B1111','PHP with MySQL Programming','Programming','0132575677', 198.89);
INSERT INTO books (BID, Title,Category,ISBN, Price) VALUES ('B2222', 'Database Design','Database','0132152134', 124);
INSERT INTO books (BID, Title,Category,ISBN, Price) VALUES ('B3333', 'Visual C#','Programming','0132151421', 107.80);
INSERT INTO books (BID, Title,Category,ISBN, Price) VALUES ('B4444', 'Java Programming','Programming','0132575663', 123);
INSERT INTO books (BID, Title,Category,ISBN) VALUES ('B5555', 'C++ How to Program','Programming','0132662361');
INSERT INTO books (BID, Title,Category,ISBN) VALUES ('B6666', 'C How to Program','Programming','0136123562');
INSERT INTO books (BID, Title,Category,ISBN) VALUES ('B7777', 'Internet & World Wide Web How to Program','Programming','0132151006');
INSERT INTO books (BID, Title,Category,ISBN, Price) VALUES ('B8888', 'Operating Systems','Operating Systems','0131828274', 80.50);

