<?php
namespace App\Models;

use App\Core\Base\Model;

class User extends Model
{
    public function getAllUser()
    {
        return parent::getAll("users");
    }

}
