<?php

namespace App\Models;

use App\Core\Base\Model;

class Community extends Model
{
    public function getAllCommunity(){
        return $this->Where()->getAll();
    }
}