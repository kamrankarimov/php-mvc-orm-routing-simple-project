<?php

namespace App\Controllers;

use App\Core\Base\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    public function indexAction (){

        $teamModel = new Team();
        $teamData  = $teamModel
            ->Columns("*")
            ->getAll();

        $this->view('index', [
            "data" => $teamData
        ]);
    }

    public function getPositionAction($id){

        $teamModel = new Team();
        $positionData  = $teamModel->getPositionById($id);

        $this->view('position', [
            "data" => $positionData
        ]);
    }

}