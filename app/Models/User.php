<?php

use App\Core\Base\Model;

class User extends Model
{

    public function getUsers()
    {
        $result = $this->db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>