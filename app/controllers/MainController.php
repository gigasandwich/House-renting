<?php
namespace app\Controllers;

use Flight;

class MainController
{
    protected $houseModel;

    public function __construct()
    {
        $this->houseModel = Flight::houseModel();
    }

    // Render the main page with all houses
    public function renderHouses() {
        $houses = $this->houseModel->getHousesWithPhotos();
        $data = [
            'title' => 'House Listings',
            'page' => 'list',
            'houses' => $houses,
            'username' => $_SESSION['user']['username']
        ];
        Flight::render('main/template', $data);
    }

    // Handle search functionality
    public function searchHouses() {
        $query = $_GET['query'] ?? '';
        $houses = $this->houseModel->searchHouses($query);
        $data = [
            'title' => 'Search Results',
            'page' => 'list',
            'houses' => $houses,
            'username' => $_SESSION['user']['username']
        ];
        Flight::render('main/template', $data);
    }

    // Render the detailed page of a house
    public function renderHouseDetail($id) {
        $house = $this->houseModel->getHouseById($id);
        $photos = $this->houseModel->getPhotosByHouseId($id);
        $data = [
            'title' => 'House Detail',
            'page' => 'house_detail',
            'house' => $house,
            'photos' => $photos,
            'username' => $_SESSION['user']['username']
        ];
        Flight::render('main/template', $data);
    }
}
