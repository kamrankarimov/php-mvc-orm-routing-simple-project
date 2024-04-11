<?php

namespace App\Core\Base;

class Controller
{
    private string $AppDir;

    public function __construct()
    {
        $this->AppDir = dirname(__DIR__, 2);
    }

    public function view($name, $data = [])
    {
        extract($data);
        require $this->AppDir . '/views/' . strtolower($name) . '.php';
    }

    public function model($name)
    {
        require  $this->AppDir . strtolower($name) . '.php';
        return new $name();
    }

}