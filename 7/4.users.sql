CREATE TABLE users (
    id      INT PRIMARY KEY AUTO_INCREMENT,
    name    CHAR(255),
    phone   CHAR(255),
    dish_id INT
);

INSERT INTO users (name, phone, dish_id) VALUES('Вася', '+79081111111', 6);
INSERT INTO users (name, phone, dish_id) VALUES('Поля', '+79082222222', 5);
INSERT INTO users (name, phone, dish_id) VALUES('Коля', '+79083333333', 4);
INSERT INTO users (name, phone, dish_id) VALUES('Толя', '+79084444444', 3);
INSERT INTO users (name, phone, dish_id) VALUES('Петя', '+79085555555', 2);
INSERT INTO users (name, phone, dish_id) VALUES('Витя', '+79086666666', 1);