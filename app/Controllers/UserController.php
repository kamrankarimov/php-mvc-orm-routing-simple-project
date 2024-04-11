<?php

use App\Core\Base\Controller;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $usersData = $this->db->getAll("users");

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