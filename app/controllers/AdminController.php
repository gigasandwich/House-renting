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


    public function renderHouses() {
        $houses = $this->houseModel->getHouses();
        $data = [
            'title' => 'House Management',
            'page' => 'crud_houses',
            'username' => $this->user['username'],
            'houses' => $houses
        ];
        Flight::render('admin/template', $data);
    }

    // ----------------------------------------------------
    // CRUD Methods
    // ----------------------------------------------------


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
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            Flight::render('error', ['message' => "AdminController->createHouse(): " . $message]);
            exit;
        }
        Flight::redirect('/admin/houses');
    }

    function uploadFile($file)
    {
        $ds = DIRECTORY_SEPARATOR;
        $uploadsDir = dirname(__DIR__, 2) . $ds . 'public' . $ds . 'assets' . $ds . 'img' . $ds . 'houses' . $ds;

        // Avoid overwriting and duplocation (io ilay notenenin'i ramose t@ S2)
        $uploadedFileName = time() . '_' . basename($file['name']);

        // Check if the directory exists and is writable (for Linux)
        if (!is_dir($uploadsDir) || !is_writable($uploadsDir)) {
            $message = "Uploads directory does not exist or is not writable: $uploadsDir";
            Flight::render('error', ['message' => "AdminController->uploadFile(): " . $message]);
            exit;
        }

        // Move the uploaded file to the directory
        if (!move_uploaded_file($file['tmp_name'], $uploadsDir . $uploadedFileName)) {
            $message = "Error uploading file.";
            Flight::render('error', ['message' => "AdminController->uploadFile(): " . $message]);
            exit;
        }

        return $uploadedFileName; // We return it to use it later
    }


    public function updateHouse()
    {
        $id = $_POST['habitation_id'];
        error_log("updateHouse called with id: " . $id);

        $data = [
            'type_id' => $_POST['type_id'],
            'chambres' => $_POST['chambres'],
            'loyer_par_jour' => $_POST['loyer_par_jour'],
            'quartier' => $_POST['quartier'],
            'description' => $_POST['description']
        ];

        error_log("Data to update: " . json_encode($data));

        try {
            $this->crudModel->update('habitation', $data, $id);
        } catch (\PDOException $e) {
            error_log("AdminController->updateHouse(): " . $e->getMessage());
            Flight::render('error', ['message' => "AdminController->updateHouse(): " . $e->getMessage()]);
            exit;
        }

        Flight::redirect('/admin/houses');
    }


    public function deleteHouse()
    {
        $id = $_GET['habitation_id'];
        $this->crudModel->delete('habitation', $id);
        Flight::redirect('/admin/houses');
    }

}