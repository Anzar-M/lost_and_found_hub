CREATE DATABASE IF NOT EXISTS lost_and_found_hub;

USE lost_and_found_hub;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    description TEXT,
    location_lost VARCHAR(255),
    date_lost DATE,
    contact_info VARCHAR(255),
    image_path VARCHAR(255),
    found TINYINT(1) DEFAULT 0
);
-- FIXME: hash and store the adming password in db instead of plain file
-- CREATE TABLE IF NOT EXISTS admins (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) NOT NULL UNIQUE,
--     password_hash VARCHAR(255) NOT NULL
-- );
