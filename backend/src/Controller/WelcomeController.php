<?php

namespace App\Controller;

use App\Controller\Controller;

class WelcomeController implements Controller
{
    public function __construct($repository = null) {}
    public function index()
    {
        return '<h1>Welcome page</h1>';
    }
}
