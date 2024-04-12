<?php

namespace App\Core\Base;

use App\Core\Database\Database;

class Controller
{
    private string $AppDir;
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->AppDir = dirname(__DIR__, 2);
    }

    /**
     * @param $name
     * @param $data
     * @return void
     */
    protected function view($name, $data = []): void
    {
        extract($data);

        $getViewPath = str_replace("App\Controllers\\", "", $this->ruleViewNaming($this->getClassName($this)));
        $getViewPath = str_replace("Controller", "", $getViewPath);
        $path = $this->AppDir . '/Views/'. $getViewPath .'/'. $this->ruleViewNaming(strtolower($name)) . '.php';

        require $path;
    }

    /**
     * @param $obj
     * @return string
     */
    private function getClassName($obj){
        return get_class($obj);
    }

    /**
     * @param $name
     * @return string
     */
    private function ruleViewNaming($name){
        return ucfirst($name);
    }

}