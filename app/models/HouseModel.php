<?php

namespace app\Models;

use PDO;

class HouseModel
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getHouses()
    {
        $query = "
            SELECT h.habitation_id, h.type_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
        ";
        $STH = $this->db->prepare($query);
        $STH->execute();
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHouseById($id)
    {
        $query = "
            SELECT h.habitation_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            WHERE h.habitation_id = ?
        ";
        $STH = $this->db->prepare($query);
        $STH->execute([$id]);
        return $STH->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getPhotosByHouseId($houseId)
    {
        $query = "SELECT photo_url FROM house_photo_habitation WHERE habitation_id = ?";
        $STH = $this->db->prepare($query);
        $STH->execute([$houseId]);
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all houses with their main photo
    public function getHousesWithPhotos()
    {
        $query = "
            SELECT h.habitation_id, h.type_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description, MIN(p.photo_url) AS photo_url
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            LEFT JOIN house_photo_habitation p ON h.habitation_id = p.habitation_id
            GROUP BY h.habitation_id
        ";
        $STH = $this->db->prepare($query);
        $STH->execute();
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search houses by query
    public function searchHouses($query)
    {
        $query = "%$query%";
        $sql = "
            SELECT h.habitation_id, h.type_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description, MIN(p.photo_url) AS photo_url
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            LEFT JOIN house_photo_habitation p ON h.habitation_id = p.habitation_id
            WHERE h.description LIKE ? OR h.quartier LIKE ? OR t.nom_type LIKE ?
            GROUP BY h.habitation_id
        ";
        $STH = $this->db->prepare($sql);
        $STH->execute([$query, $query, $query]);
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }
}
