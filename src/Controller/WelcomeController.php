<?php

namespace App\Controller;

use App\Controller\Controller;

class WelcomeController implements Controller
{
    public function __construct($repository = null)
    {
    }
    public function index(string $id = null): void
    {
        require_once __DIR__ . '/../../views/pages/index.php';
    }
}
