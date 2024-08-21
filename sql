CREATE DATABASE user_auth;
USE user_auth;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    id_number INT NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- creating the signup feature

CREATE DATABASE tailoring_business;
USE tailoring_business;

-- Create the database
CREATE DATABASE tailoring_business;

-- Use the newly created database
USE tailoring_business;

-- Create the customers table

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    order_date DATE NOT NULL,
    description TEXT NOT NULL,
    payment VARCHAR(100) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    waist_trauser VARCHAR(50),
    thigh VARCHAR(50),
    hips_trauser VARCHAR(50),
    knees VARCHAR(50),
    bottom VARCHAR(50),
    full_length_trauser VARCHAR(50),
    waist_skirt VARCHAR(50),
    hips_skirt VARCHAR(50),
    full_length_skirt VARCHAR(50),
    shoulder VARCHAR(50),
    chest VARCHAR(50),
    waist_line VARCHAR(50),
    full_length_shirt VARCHAR(50),
    sleeve VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

