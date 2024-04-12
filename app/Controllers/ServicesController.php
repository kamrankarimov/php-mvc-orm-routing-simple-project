<?php

namespace App\Controllers;

use App\Core\Base\Controller;
use App\Models\Services;

class ServicesController extends Controller
{
    public function indexAction(){
        $servicesModel = new Services();
        $servicesData  = $servicesModel->getAll();

        $this->view('index', [
            "services" => $servicesData
        ]);
    }

    public function getServiceAction($slug){
        $servicesModel = new Services();

        $servicesData  = $servicesModel
            ->From("services")
            ->Columns("id,title,slug")
            ->Where("slug = ".$slug)
            ->Find();

        $this->view('getservice', [
            "services" => $servicesData
        ]);
    }
}