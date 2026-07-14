CREATE DATABASE IF NOT EXISTS attendance_system;

USE attendance_system;

CREATE TABLE faculties (
    faculty_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    faculty_id INT NOT NULL,
    FOREIGN KEY (faculty_id) REFERENCES faculties (faculty_id) ON DELETE CASCADE ON UPDATE CASCADE
);

SET FOREIGN_KEY_CHECKS = 0;

-- Step 2: Empty the table
TRUNCATE TABLE faculties;

-- Step 3: Turn checks back on immediately
SET FOREIGN_KEY_CHECKS = 1;

TRUNCATE TABLE departments;

CREATE TABLE Students (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50) NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    faculty_id INT NOT NULL,
    FOREIGN KEY (faculty_id) REFERENCES faculties (faculty_id) ON DELETE CASCADE ON UPDATE CASCADE
);