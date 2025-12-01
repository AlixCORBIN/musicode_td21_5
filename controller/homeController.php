<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once 'core/View.php';

class HomeController extends Controller {
    public function index() {

        $data = [
            'title' => 'home',
        ];

        $this->loadView('home', $data);
    }
}
