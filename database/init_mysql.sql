DROP TABLE IF EXISTS car_repairs;
DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS car_brands;

CREATE TABLE car_brands (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  name varchar(50)
);

INSERT INTO car_brands (name) VALUES ('Toyota');
INSERT INTO car_brands (name) VALUES ('Ford');
INSERT INTO car_brands (name) VALUES ('Volkswagen');

CREATE TABLE cars (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  brand_id int,
  model varchar(50),
  start_date date,
  end_date date,
  body_type varchar(50),
  image varchar(100),
  FOREIGN KEY (brand_id) REFERENCES car_brands(id)
);

INSERT INTO cars (brand_id, model, start_date, end_date, body_type, image) VALUES
(1, 'Camry', '2014-01-01', '2016-12-31', 'Sedan', 'camry.jpg'),
(1, 'RAV4', '2018-01-01', NULL, 'SUV', 'rav4.jpg'),
(3, 'Tiguan', '2012-01-01', '2017-05-10', 'SUV', 'tiguan.jpg'),
(2, 'Fusion', '2017-01-01', NULL, 'Sedan', 'fusion.jpg'),
(3, 'Jetta', '2016-01-01', '2019-12-31', 'Sedan', 'jetta.jpg'),
(2, 'Escape', '2014-01-01', '2018-09-10', 'SUV', 'escape.jpg');


CREATE TABLE car_repairs (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  car_id int,
  repair_type varchar(50),
  cost decimal(10, 2),
  FOREIGN KEY (car_id) REFERENCES cars(id)
);

INSERT INTO car_repairs (car_id, repair_type, cost) VALUES
(1, 'AC repair', 200.00),
(1, 'Fuel System Cleaning', 1500.00),
(1, 'Timing Belt Replacement', 400.00),
(2, 'AC repair', 2100.00),
(2, 'Fuel System Cleaning', 1450.00),
(2, 'Timing Belt Replacement', 300.00),
(3, 'AC repair', 220.00),
(3, 'Fuel System Cleaning', 1550.00),
(3, 'Timing Belt Replacement', 420.00),
(4, 'AC repair', 2000.00),
(4, 'Fuel System Cleaning', 140.00),
(4, 'Timing Belt Replacement', 3800.00),
(5, 'AC repair', 2150.00),
(5, 'Fuel System Cleaning', 1480.00),
(5, 'Timing Belt Replacement', 3950.00),
(6, 'AC repair', 250.00),
(6, 'Fuel System Cleaning', 1520.00),
(6, 'Timing Belt Replacement', 4100.00);
