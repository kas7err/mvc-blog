<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ErrorController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->view::render('errors.404');
    }
}
