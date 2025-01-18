<?php

namespace App\Controller;

use App\Controller\Controller;

class WelcomeController implements Controller
{
    public function __construct($repository = null) {}
    public function index()
    {
        require_once __DIR__ . '/../../views/pages/index.php';
    }
}
