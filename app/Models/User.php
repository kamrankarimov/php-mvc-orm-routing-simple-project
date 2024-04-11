<?php
namespace App\Models;

use App\Core\Base\Model;

class User extends Model
{

    public function getAllUser()
    {
        return $this
            ->From("users")
            ->Columns("fullname")
            ->Where("id = 1")
            ->getAll();
    }

}
