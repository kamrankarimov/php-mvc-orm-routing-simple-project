<?php

namespace App\Controllers;

use App\Core\Base\Controller;

class HomeController extends Controller
{
    public function indexAction(){
       $this->view('index');
    }
}