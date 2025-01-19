<?php

namespace app\controllers;

use Flight;

class LandingController {
    public function renderIndex() {
        $data = [
            'title' => 'Landing Page'
        ];
        Flight::render('landing/index', $data);
    }
}
