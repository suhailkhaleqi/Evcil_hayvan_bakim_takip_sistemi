CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    pet_name VARCHAR(50) NOT NULL,
    pet_type VARCHAR(50),
    birth_date DATE,
    vaccine_date DATE,
    notes TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);