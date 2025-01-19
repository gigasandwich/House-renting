# Steps to Set Up PHP Flight MVC Project with Composer on XAMPP

# Steps to Set Up PHP Flight MVC Project with Composer on XAMPP

## Step 1: Update `composer.json`
Inside `composer.json`:
```json
{
    "name": "gigasandwich/houserenting",
    "description": "A PHP Flight MVC project for house renting.",
    "type": "project",
    "require": {
        "php": "^7.4 || ^8.0",
        "ext-json": "*",
        "flightphp/core": "^3.0",
        "flightphp/runway": "^0.2 || ^1.1",
        "tracy/tracy": "^2.9"
    },
    "autoload": {
        "psr-4": {
            "app\\": "app/"
        }
    },
    "config": {
        "vendor-dir": "vendor",
        "process-timeout": 0,
        "sort-packages": true
    },
    "scripts": {
        "post-create-project-cmd": [ 
            "@php -r \"symlink('vendor/bin/runway', 'runway');\"",
            "@php -r \"copy('app/config/config_sample.php', 'app/config/config.php');\"",
            "@php -r \"mkdir('app/middlewares/');\"",
            "@php -r \"mkdir('app/cache/');\"",
            "@php -r \"mkdir('app/log/');\""
        ]
    },
    "require-dev": {
        "phpunit/phpunit": "^9.5",
        "flightphp/tracy-extensions": "^0.1 || ^0.2"
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
```

## Step 2: Install Dependencies
Run the following command in your terminal from the 20250120 directory:
```bash
composer install
```

# Step 3: Create Directory Structure
Ensure your project directory structure matches the following:
```
20250120
├── app
│   ├── controllers
│   │   ├── AuthController.php
│   │   ├── MainController.php
│   │   ├── AdminController.php
│   ├── models
│   └── views
│       └── landing
│           └── index.php
├── public
│   └── index.php
├── routes
│   └── routes.php
├── vendor
├── composer.json
└── README.md
```

# Step 4: Create routes.php
Inside routes, create routes.php:
```php
<?php
use app\controllers\AuthController;
use app\controllers\MainController;
use app\controllers\AdminController;
use app\controllers\MoveController;

use flight\Engine;
use flight\net\Router;

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

# Step 5: Create index.php
Inside public, create index.php:
```php
<?php
require '../vendor/autoload.php';
require '../routes/routes.php';

Flight::start();
```