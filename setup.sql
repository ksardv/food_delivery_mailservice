-- create the databases
CREATE DATABASE IF NOT EXISTS mailservice;

-- create the users for each database
CREATE USER 'root'@'%' IDENTIFIED BY 'root';
GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `mailservice`.* TO 'root'@'%';

FLUSH PRIVILEGES;
