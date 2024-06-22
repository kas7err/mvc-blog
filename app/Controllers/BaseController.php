<?php

namespace App\Controllers;

use Core\View;

class BaseController
{
    public $view;
    public function __construct()
    {
        $this->view = new View();
    }
}
