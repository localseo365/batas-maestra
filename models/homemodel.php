<?php
class HomeModel extends Model
{
    public function __construct(){
        parent::__construct();
    }
    function getUsers()
    {
        $users = $this->db->connect()->prepare("SELECT * FROM productos");
        $users->execute();
        $users_ = $users->rowCount();
        return $users_;
    }
}