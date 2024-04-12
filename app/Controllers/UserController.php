<?php

namespace App\Controllers;

use App\Core\Base\Controller;

class UserController extends Controller
{
    public function registerAction(){
        $this->view('register');
    }
}