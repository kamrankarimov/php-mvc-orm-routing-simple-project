<?php

use App\Core\Base\Controller;
class UserController extends Controller
{

    public function index()
    {
        $userModel = $this->model('User');
        $usersData = $userModel->getUsers();

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