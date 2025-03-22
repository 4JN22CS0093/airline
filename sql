-- Create a database for the system
CREATE DATABASE airline_reservation;

-- Use the database
USE airline_reservation;

-- Create a table for users (passengers)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- Create a table for flights
CREATE TABLE flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flight_name VARCHAR(100),
    origin VARCHAR(50),
    destination VARCHAR(50),
    departure_time DATETIME,
    seats_available INT
);

-- Create a table for reservations
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    flight_id INT,
    reservation_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (flight_id) REFERENCES flights(id)
);
