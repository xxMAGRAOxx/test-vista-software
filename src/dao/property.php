<?php

namespace App\Dao;

class Property extends \App\Dao\Vista implements \App\Dao\Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        
    }

    public function getAll()
    {
        $rows = $this->db->table("property")->get();

        return $this->db->getCount() ? $rows : [];
    }

    public function set(\App\Model\User $property)
    {
        
    }
}