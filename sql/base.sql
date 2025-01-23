DROP TABLE IF EXISTS house_reservation;
DROP TABLE IF EXISTS house_reservation_status;
DROP TABLE IF EXISTS house_photo_habitation;
DROP TABLE IF EXISTS house_habitation;
DROP TABLE IF EXISTS house_type_habitation;
DROP TABLE IF EXISTS house_user;

CREATE TABLE house_user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    tel INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') NOT NULL DEFAULT 'client'
);

CREATE TABLE house_type_habitation (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    nom_type VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE house_habitation (
    habitation_id INT AUTO_INCREMENT PRIMARY KEY,
    type_id INT NOT NULL,
    chambres INT NOT NULL,
    loyer_par_jour DECIMAL(10, 2) NOT NULL,
    quartier VARCHAR(100) NOT NULL,
    description TEXT,
    FOREIGN KEY (type_id) REFERENCES house_type_habitation(type_id) ON DELETE CASCADE
);

CREATE TABLE house_photo_habitation (
    photo_id INT AUTO_INCREMENT PRIMARY KEY,
    habitation_id INT NOT NULL,
    photo_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (habitation_id) REFERENCES house_habitation(habitation_id) ON DELETE CASCADE
);

CREATE TABLE house_reservation_status (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE house_reservation (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    habitation_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    status_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES house_user(user_id) ON DELETE CASCADE,
    FOREIGN KEY (habitation_id) REFERENCES house_habitation(habitation_id) ON DELETE CASCADE,
    FOREIGN KEY (status_id) REFERENCES house_reservation_status(status_id) ON DELETE RESTRICT
);
