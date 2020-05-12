USE BooksDB; /*BooksDB is the name of the database*/
/* constraint references */

DROP TABLE IF EXISTS booksauthors;

CREATE TABLE booksauthors
(
   BID varchar(60),
   AID varchar(60)
);