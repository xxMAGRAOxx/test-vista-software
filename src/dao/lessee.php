<?php

namespace App\Dao;

class Lessee extends \App\Dao\Vista implements \App\Dao\Database
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
        $rows = $this->db->table("lessee")->get();

        return $this->db->getCount() ? $rows : [];
    }

    public function set(\App\Model\User $lessee)
    {
        $this->db->insert('lessee',
        [
            'name'      => $lessee->name,
            'email'	    => $lessee->email,
            'telephone' => $lessee->telephone
        ]);
    }
}