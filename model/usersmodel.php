<?php 
    class usersmodel extends Model {
        
        public function getUsers(){
            $result = $this->db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }
?>