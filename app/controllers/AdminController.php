<?php
namespace app\Controllers;

use Flight;

class AdminController
{
    protected $crudModel;
    protected $houseModel;
    protected $user;

    public function __construct()
    {
        $this->crudModel = Flight::crudModel();
        $this->houseModel = Flight::houseModel();
        $this->user = $_SESSION['user'];
    }

    // Render the houses management page
    public function renderHouses()
    {
        $houses = $this->houseModel->getHouses();
        $data = [
            'title' => 'House Management',
            'page' => 'crud-houses',
            'username' => $this->user['username'],
            'houses' => $houses
        ];
        Flight::render('admin/template', $data);
    }

    // ----------------------------------------------------
    // CRUD Methods
    // ----------------------------------------------------

    // Create a new house
    public function createHouse()
    {
        $data = [
            'type_id' => $_POST['type_id'],
            'chambres' => $_POST['chambres'],
            'loyer_par_jour' => $_POST['loyer_par_jour'],
            'quartier' => $_POST['quartier'],
            'description' => $_POST['description']
        ];

        try {
            $this->crudModel->insert('habitation', $data);
            $houseId = $this->crudModel->getLastInsertId();

            // Handle file uploads
            if (!empty($_FILES['photos']['name'][0])) {
                $this->uploadFiles($houseId, $_FILES['photos']);
            }
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            Flight::render('error', ['message' => "AdminController->createHouse(): " . $message]);
            exit;
        }
        Flight::redirect('/admin/houses');
    }

    // Update an existing house
    public function updateHouse()
    {
        $id = $_POST['habitation_id'];

        $data = [
            'type_id' => $_POST['type_id'],
            'chambres' => $_POST['chambres'],
            'loyer_par_jour' => $_POST['loyer_par_jour'],
            'quartier' => $_POST['quartier'],
            'description' => $_POST['description']
        ];

        try {
            $this->crudModel->update('habitation', $data, $id);

            // Handle file uploads
            if (!empty($_FILES['photos']['name'][0])) {
                $this->uploadFiles($id, $_FILES['photos']);
            }
        } catch (\PDOException $e) {
            error_log("AdminController->updateHouse(): " . $e->getMessage());
            Flight::render('error', ['message' => "AdminController->updateHouse(): " . $e->getMessage()]);
            exit;
        }

        Flight::redirect('/admin/houses');
    }

    // Delete a house
    public function deleteHouse()
    {
        $id = $_GET['habitation_id'];
        $this->crudModel->delete('habitation', $id);
        Flight::redirect('/admin/houses');
    }

    // Get photos for a specific house
    public function getPhotos()
    {
        $id = $_GET['habitation_id'];
        $photos = $this->houseModel->getPhotosByHouseId($id);
        Flight::json($photos);
    }

    // ----------------------------------------------------
    // Helper Methods
    // ----------------------------------------------------

    // Upload multiple files for a house
    private function uploadFiles($houseId, $files)
    {
        $uploadDir = dirname(__DIR__, 2) . '/public/assets/img/houses/';
        foreach ($files['name'] as $key => $name) {
            if ($files['error'][$key] === UPLOAD_ERR_OK) {
                $tmpName = $files['tmp_name'][$key];
                $fileName = time() . '_' . basename($name);
                $filePath = $uploadDir . $fileName;
                if (move_uploaded_file($tmpName, $filePath)) {
                    $this->crudModel->insert('photo_habitation', [
                        'habitation_id' => $houseId,
                        'photo_url' => $fileName
                    ]);
                }
            }
        }
    }

    // Delete a photo
    public function deleteHousePic()
    {
        $id = $_POST['photo_id'];

        try {
            $this->crudModel->delete('photo_habitation', $id); 

            Flight::redirect('admin/houses');
        } catch (\Exception $e) {
            error_log("AdminController->deleteHouse(): " . $e->getMessage());
            Flight::render('error', ['message' => "Error deleting house: " . $e->getMessage()]);
            exit;
        }
    }

}