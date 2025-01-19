<?php
$baseUrl = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Framework css -->
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/framework/fontawesome-free-6.7.2-web/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/home.css">
</head>

<body>
    <!-- Navbar -->
    <header class="shadow fixed-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
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
                        <li class="nav-item me-3">
                            <?php include 'layouts/btn-theme.php'; ?>
                        </li>
                        <li class="nav-item mb-2 mb-sm-0">
                            <a class="btn btn-outline-success w-100 me-3" href="auth/user">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success w-100" href="auth/register">Register</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>

    <main class="py-5">
        <section class="hero container">
            <div class="row justify-content-center align-items-center gap-5">
                <!-- Text Section -->
                <div class="col-md-5 text-center">
                    <h1 class="display-4 fw-bold">Welcome to HomeHub!</h1>
                    <p class="lead">Discover the best home improvement ideas and tips. Register now and start your journey to a better home!</p>
                    <a href="auth/register" class="btn btn-primary btn-lg mt-3">Get Started</a>
                </div>

                <!-- Carousel Section -->
                <div class="col-md-6 text-bg-primary rounded p-2" id="landingCarousel">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Slide 1: User Registration -->
                            <div class="carousel-item active">
                                <img src="<?= $baseUrl; ?>/assets/img/illustrations/house/apartment-rent.svg"
                                    class="d-block w-100 img-fluid" alt="User Registration">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                    <h5 class="text-white">Easy Registration</h5>
                                    <p class="text-light">Create an account to start your journey and unlock exciting home improvement tips.</p>
                                </div>
                            </div>

                            <!-- Slide 2: Home Ideas -->
                            <div class="carousel-item">
                                <img src="<?= $baseUrl; ?>/assets/img/illustrations/house/at-home.svg" class="d-block w-100 img-fluid"
                                    alt="Home Ideas">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                    <h5 class="text-white">Creative Home Ideas</h5>
                                    <p class="text-light">Get personalized home improvement ideas to make your house a better place.</p>
                                </div>
                            </div>

                            <!-- Slide 3: Budget Management -->
                            <div class="carousel-item">
                                <img src="<?= $baseUrl; ?>/assets/img/illustrations/house/back-home.svg"
                                    class="d-block w-100 img-fluid" alt="Budget Management">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                    <h5 class="text-white">Smart Budget Control</h5>
                                    <p class="text-light">Manage your budget wisely and ensure your home improvement projects stay within budget.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        <footer>
            <h3>ETU003247 - ETU003286</h3>
        </footer>

    </main>

    <!-- Framework Scripts -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <script src="<?= $baseUrl; ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl; ?>/assets/js/main.js"></script>
</body>

</html>