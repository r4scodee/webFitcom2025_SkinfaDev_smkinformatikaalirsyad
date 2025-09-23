<?php

require_once __DIR__ . '/../libs/Controller.php';

class SensorsController extends Controller {
    public function index() {
        $this->view('sensors/index', [
            'title' => 'Sensors Monitoring - Skinfa Bertani',
            'active' => 'Sensors'
        ]);
    }
}