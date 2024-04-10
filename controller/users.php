<?php 
    class Users extends Controller {
        
        public function index(){
            $usersModel = $this->model('usersmodel');
            $usersData  = $usersModel->getUsers();

            $this->view('users', [
                'users' => $usersData
            ]);
        }

        public function welcome(){
            $this->view('welcome', [
                'text' => 'Welcome to my codes!'
            ]);
        }

    }
?>