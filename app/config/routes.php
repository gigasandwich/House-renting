<?php
// Should be lowercase to make the code work on ALL OS (same with filename) 
use app\controllers\AuthController;
use app\controllers\MainController;
use app\controllers\AdminController;
use app\controllers\MoveController;
use app\controllers\LandingController;
use app\models\HouseModel;

use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */


 $router->get('/', [LandingController::class, 'renderIndex']);


// ----------------------------------------------------
// Auth
// ----------------------------------------------------
$router->group('/auth', function () use ($router) {
    $router->get('/', [AuthController::class, 'renderUserLogin']); 

    $router->get('/user', [AuthController::class,'renderUserLogin']); // Just entering the page
    $router->post('/check-user', [AuthController::class, 'userLogin']); // Read login authentication method

    $router->get('/admin', [AuthController::class, 'renderAdminLogin']);
    $router->post('/check-admin', [AuthController::class, 'adminLogin']);


    $router->get('/register', [AuthController::class, 'renderRegistration']);
    $router->post('/create-user', [AuthController::class, 'register']);    

    $router->get('/logout', [AuthController::class,'logout']);
});

// ----------------------------------------------------
// Admin: Anything about what the user does
// ----------------------------------------------------
$router->group('/admin', function () use ($router) {
    $router->get('/', [AdminController::class,'renderHouses']);
    $router->get('/houses', [AdminController::class, 'renderHouses']);
});
    
// ----------------------------------------------------
// Ajax calls
// ----------------------------------------------------
$router->group('/api', function () use ($router) {
    $router->get('/photos/@id', [AdminController::class, 'getPhotos']);
});


// ----------------------------------------------------
// CRUD
// ----------------------------------------------------
// CREATE
$router->group('/create', function () use ($router) {
    $router->post("/house", [AdminController::class, 'createHouse']);
});

// UPDATE
$router->group('/update', function () use ($router) {
    $router->post("/house", [AdminController::class, 'updateHouse']);
});

// DELETE
$router->group('/delete', function () use ($router) {
    $router->get("/house", [AdminController::class, 'deleteHouse']);
});
