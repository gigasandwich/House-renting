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
}
