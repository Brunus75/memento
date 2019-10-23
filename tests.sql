--You need to find out the 5 bestselling books at your store. 
--Use a select statement to list names, authors, and number of copies sold 
--of the 5 books which were sold most.
--postgreSQL 9.6
SELECT name, author, copies_sold from books ORDER BY copies_sold DESC LIMIT 5;

--You need to get a list of names and ages of users from the users table, 
--who are 18 years old or older.
SELECT * from users WHERE age >= 18;

--Select names, and countries of origin of all the travelers,
--excluding anyone from Canada, Mexico, or The US.
SELECT *
from travelers
WHERE NOT country ='USA' AND NOT country='Canada' AND NOT country='Mexico';
--autre réponse :
SELECT name, country FROM travelers WHERE country NOT IN ('Canada', 'Mexico', 'USA');