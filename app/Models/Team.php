<?php

namespace App\Models;

use App\Core\Base\Model;

class Team extends Model
{
    public function getPositionById($id){
        return $this
            ->Columns("position")
            ->Where($id)
            ->getById();
    }
}