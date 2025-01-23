<?php
$baseUrl = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Authentication" ?></title>
    <!-- Framework css -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/framework/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/auth.css">
</head>

<body>
<header class="shadow fixed-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="<?= $baseUrl ?>">
                    <?php include 'layouts/logo.php'; ?>
                </a>
                <!-- Toggle Button for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto d-flex gap-2 align-items-center">
                        <!-- Theme Switch Button -->
                        <li class="nav-item me-3">
                            <?php include 'layouts/btn-theme.php'; ?>
                        </li>
                        <!-- Language Switcher -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link d-flex align-items-center" href="#">
                                <img id="currentLanguageFlag" src="<?= $baseUrl ?>/assets/img/flags/en.jpg"
                                    alt="Language Flag" style="width: 20px; height: 20px; margin-right: 5px;">
                                <select id="languageSelect" class="form-select form-select-sm"
                                    style="width: auto; display: inline-block;">
                                    <option value="en" data-translate="english_btn">English</option>
                                    <option value="fr" data-translate="french_btn">Français</option>
                                </select>
                            </a>
                        </li>
                        <!-- Login Button -->
                        <li class="nav-item mb-2 mb-sm-0">
                            <a class="btn btn-outline-success w-100 me-3" href="admin" data-translate="admin_login">Admin Login</a>
                        </li>
                        <li class="nav-item mb-2 mb-sm-0">
                            <a class="btn btn-outline-success w-100 me-3" href="user" data-translate="login">Login</a>
                        </li>
                        <!-- Register Button -->
                        <li class="nav-item">
                            <a class="btn btn-success w-100" href="register" data-translate="register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- + margin via theme.js  -->
    <main class=""> 
        <?php include $page . '.php' ?>
    </main>

    <footer></footer>

    <!-- Framework Scripts -->
    <script src="<?= $baseUrl ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl ?>/assets/js/main.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/language.js"></script>
</body>

</html>