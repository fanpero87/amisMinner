CREATE DATABASE IF NOT EXISTS 'laravel_minner';
CREATE USER 'laravel'@'db' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON *.* TO 'laravel'@'%';
