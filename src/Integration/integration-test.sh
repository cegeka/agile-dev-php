mysql -u root -proot -e "CREATE DATABASE IF NOT EXISTS phpunit DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;"
mysql -u root -proot -e "DROP TABLE phpunit.product";
mysql -u root -proot -e "CREATE TABLE phpunit.product (id INT NOT NULL AUTO_INCREMENT,name VARCHAR(120) NULL,price FLOAT NULL,PRIMARY KEY (id)) ENGINE = InnoDB;";
mysql -u root -proot -e "INSERT INTO phpunit.product (name, price) VALUES ('Fixture', 12.35)";

phpunit -c phpunit.xml