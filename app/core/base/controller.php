<?php

namespace App\Core\Base;

use App\Core\Database\DatabaseORM;

class Controller
{
    private string $AppDir;
    protected $db;

    public function __construct()
    {
        $this->db = new DatabaseORM();
        $this->AppDir = dirname(__DIR__, 2);
    }

    protected function view($name, $data = [])
    {
        extract($data);
        $getViewPath = str_replace("Controller", "", $this->ruleViewNaming($this->getClassName($this)));
        $path = $this->AppDir . '/Views/'. $getViewPath .'/'. $this->ruleViewNaming(strtolower($name)) . '.php';
        require $path;
    }

    protected function model($name)
    {
        require $this->AppDir .'/Models/'. $this->ruleModelNaming(strtolower($name)) . '.php';
        return new $name();
    }

    private function getClassName($obj){
        return get_class($obj);
    }

    private function ruleViewNaming($name){
        return ucfirst($name);
    }

    private function ruleModelNaming($name){
        return ucfirst($name);
    }

}