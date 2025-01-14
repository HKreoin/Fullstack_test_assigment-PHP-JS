<?php

namespace App\Controller;

use App\Repository\Repository;

interface Controller
{
    public function __construct(Repository $repository);
    public function index();
}
