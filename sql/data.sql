INSERT INTO house_user (username, password, role) VALUES
('poyz', '123', 'admin'),
('giga', '123', 'client'),
('bryan', '123', 'client');

INSERT INTO house_type_habitation (nom_type) VALUES
('Maison'),
('Appartement'),
('Studio'),
('Villa'),
('Bungalow');

INSERT INTO house_habitation (type_id, chambres, loyer_par_jour, quartier, description) VALUES
(1, 3, 100.00, 'Centre-ville', 'Maison spacieuse avec jardin'),
(2, 2, 75.00, 'Banlieue', 'Appartement moderne avec balcon'),
(3, 1, 50.00, 'Centre-ville', 'Studio cosy proche des commerces'),
(4, 4, 200.00, 'Quartier résidentiel', 'Villa luxueuse avec piscine'),
(5, 2, 120.00, 'Bord de mer', 'Bungalow charmant avec vue sur la plage');

INSERT INTO house_photo_habitation (habitation_id, photo_url) VALUES
(1, 'photos/maison1_1.jpg'),
(1, 'photos/maison1_2.jpg'),
(2, 'photos/appartement1_1.jpg'),
(2, 'photos/appartement1_2.jpg'),
(3, 'photos/studio1.jpg'),
(4, 'photos/villa1_1.jpg'),
(4, 'photos/villa1_2.jpg'),
(4, 'photos/villa1_3.jpg'),
(5, 'photos/bungalow1.jpg');

INSERT INTO house_reservation_status (status_name) VALUES
('Confirmée'),
('Annulée'),
('En attente'),
('Payée'),
('Refusée');

INSERT INTO house_reservation (user_id, habitation_id, date_debut, date_fin, status_id) VALUES
(2, 1, '2025-01-20', '2025-01-25', 1), -- Confirmée
(3, 2, '2025-02-01', '2025-02-05', 3), -- En attente
(2, 3, '2025-02-10', '2025-02-15', 2), -- Annulée
(3, 4, '2025-03-01', '2025-03-07', 1), -- Confirmée
(2, 5, '2025-03-15', '2025-03-20', 4), -- Payée
(3, 4, '2025-03-25', '2025-03-30', 5), -- Refusée
(2, 1, '2025-04-01', '2025-04-05', 3), -- En attente
(3, 2, '2025-04-10', '2025-04-15', 1); -- Confirmée
