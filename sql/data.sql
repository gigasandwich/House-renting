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
(5, 2, 120.00, 'Bord de mer', 'Bungalow charmant avec vue sur la plage'),
(1, 4, 150.00, 'Quartier calme', 'Grande maison avec garage'),
(2, 3, 90.00, 'Centre-ville', 'Appartement spacieux avec terrasse'),
(3, 1, 60.00, 'Quartier étudiant', 'Studio moderne et lumineux'),

(4, 5, 250.00, 'Quartier résidentiel', 'Villa avec grand jardin'),
(5, 3, 130.00, 'Bord de mer', 'Bungalow avec accès direct à la plage'),
(1, 3, 110.00, 'Quartier historique', 'Maison ancienne rénovée'),
(2, 2, 80.00, 'Banlieue', 'Appartement avec vue sur le parc'),
(3, 1, 55.00, 'Centre-ville', 'Studio cosy et fonctionnel'),
(4, 4, 220.00, 'Quartier résidentiel', 'Villa avec piscine et sauna'),
(5, 2, 125.00, 'Bord de mer', 'Bungalow avec terrasse privée');

INSERT INTO house_photo_habitation (habitation_id, photo_url) VALUES
(1, 'maison1_1.jpg'),
(1, 'maison1_2.jpg'),
(1, 'maison1_3.jpg'),
(1, 'maison1_4.jpg'),
(2, 'appartement1_1.jpg'),
(2, 'appartement1_2.jpg'),
(2, 'appartement1_3.jpg'),
(2, 'appartement1_4.jpg'),
(3, 'studio1.jpg'),
(3, 'studio2.jpg'),
(3, 'studio3.jpg'),
(4, 'villa1_1.jpg'),
(4, 'villa1_2.jpg'),
(4, 'villa1_3.jpg'),
(4, 'villa1_4.jpg'),
(4, 'villa1_5.jpg'),
(5, 'bungalow1.jpg'),
(5, 'bungalow2.jpg'),
(5, 'bungalow3.jpg'),
(6, 'maison2_1.jpg'),
(6, 'maison2_2.jpg'),
(6, 'maison2_3.jpg'),
(7, 'appartement2_1.jpg'),
(7, 'appartement2_2.jpg'),
(7, 'appartement2_3.jpg'),
(8, 'studio2_1.jpg'),
(8, 'studio2_2.jpg'),
(8, 'studio2_3.jpg'),
(9, 'villa2_1.jpg'),
(9, 'villa2_2.jpg'),
(9, 'villa2_3.jpg'),
(9, 'villa2_4.jpg'),
(10, 'bungalow2_1.jpg'),
(10, 'bungalow2_2.jpg'),
(10, 'bungalow2_3.jpg'),
(11, 'maison3_1.jpg'),
(11, 'maison3_2.jpg'),
(11, 'maison3_3.jpg'),
(12, 'appartement3_1.jpg'),
(12, 'appartement3_2.jpg'),
(12, 'appartement3_3.jpg'),
(13, 'studio3_1.jpg'),
(13, 'studio3_2.jpg'),
(13, 'studio3_3.jpg'),
(14, 'villa3_1.jpg'),
(14, 'villa3_2.jpg'),
(14, 'villa3_3.jpg'),
(14, 'villa3_4.jpg'),
(15, 'bungalow3_1.jpg'),
(15, 'bungalow3_2.jpg'),
(15, 'bungalow3_3.jpg');

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
(3, 2, '2025-04-10', '2025-04-15', 1), -- Confirmée
(2, 6, '2025-05-01', '2025-05-05', 1), -- Confirmée
(3, 7, '2025-06-01', '2025-06-05', 3), -- En attente
(2, 8, '2025-07-01', '2025-07-05', 2), -- Annulée
(3, 9, '2025-08-01', '2025-08-07', 1), -- Confirmée
(2, 10, '2025-09-01', '2025-09-05', 4), -- Payée
(3, 11, '2025-10-01', '2025-10-05', 5), -- Refusée
(2, 12, '2025-11-01', '2025-11-05', 3), -- En attente
(3, 13, '2025-12-01', '2025-12-05', 1); -- Confirmée
