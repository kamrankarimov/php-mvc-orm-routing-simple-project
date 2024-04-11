<?php

namespace App\Controllers;

use App\Core\Base\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $userModel = new User();

        $usersData = $userModel
            ->From("users")
            ->Columns("fullname")
            ->Where("id = 1")
            ->getAll();

        $this->view('user', [
            'users' => $usersData
        ]);
    }

    public function welcome()
    {
        $this->view('welcome', [
            'text' => 'Welcome to my codes!'
        ]);
    }

}

?>