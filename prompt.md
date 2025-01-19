- I'm launching xampp so in the url localhost would mean C:\\xampp\htdocs.
- This project will be a PHP FLIGHT MVC project located at C:\\xampp\htdocs\ETU003286\20250112
and inside 20250112 there are app, public and such things.
- The current folder I am in right now is already 20250112
- The project is about a house renting
- 
I want routes.php to look a like this:

```php 
<?php
// Should be lowercase to make the code work on ALL OS (same with filename) 
use app\controllers\AuthController;
use app\controllers\MainController;
use app\controllers\AdminController;
use app\controllers\MoveController;


use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */


$router->get('/', function (){
    Flight::render('landing/index');
});

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
```

- What are the steps I should follow.