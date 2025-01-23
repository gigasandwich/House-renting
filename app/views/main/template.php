<?php
$baseUrl = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "House Listings" ?></title>
    <!-- Framework css -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/framework/fontawesome-free-6.7.2-web/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/detail.css">
</head>

<body>
    <header class="fixed-top shadow">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="<?= $baseUrl ?>/main">
                    <?php include 'layouts/logo.php'; ?>
                </a>
                <!-- Toggle Button for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Start -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>/main" data-translate="home">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="<?= $baseUrl ?>/main/houses" data-translate="houses">Houses</a>
                        </li>
                    </ul>

                    <!-- Search Form -->
                    <form class="d-flex" role="search" method="GET" action="<?= $baseUrl ?>/main/search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="query" data-translate="search_placeholder">
                        <button class="btn btn-outline-success" type="submit" data-translate="search">Search</button>
                    </form>

                    <!-- End -->
                    <ul class="navbar-nav ms-auto d-flex gap-2 align-items-center">
                        <li class="nav-item d-flex align-items-center me-3">
                            <i class="fas fa-user text-primary me-2"></i>
                            <span class="fw-bold text-primary"> <?= $username ?></span>
                        </li>

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
                        <!-- Offcanvas Button (Always Visible) -->
                        <li class="nav-item me-3">
                            <button class="btn btn-success" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" data-translate="settings_button">
                                <i class="fas fa-cog"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel" data-translate="user_settings">User  Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseUrl ?>/auth/user" data-translate="login_user_account">Login in a user account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseUrl ?>/auth/admin" data-translate="login_admin">Login as another admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseUrl ?>/auth/logout" data-translate="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="overflow-auto container" style="max-height: 80vh;">
        <?php include $page . '.php' ?>
    </main>

    <!-- Framework Scripts -->
    <script src="<?= $baseUrl ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl ?>/assets/js/main.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/language.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/detail.js"></script>
</body>

</html> 