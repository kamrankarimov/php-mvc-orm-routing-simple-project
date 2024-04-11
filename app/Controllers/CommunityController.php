<?php

namespace App\Controllers;

use App\Core\Base\Controller;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        $communityModel = new Community();
        $communityData  = $communityModel
            ->Where("id = 6")
            ->getAll();

        $this->view('community', [
            'datas' => $communityData
        ]);
    }
}