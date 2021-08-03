<?php

namespace App\Dao;

class Landlord extends \App\Dao\Vista implements \App\Dao\Database
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
        $rows = $this->db->table("landlord")->get();

        return $this->db->getCount() ? $rows : [];
    }

    public function set(\App\Model\User $landlord)
    {
        $this->db->insert('landlord',
        [
            'name'           => $landlord->name,
            'email'	         => $landlord->email,
            'telephone'      => $landlord->telephone,
            'day_to_receive' => $landlord->dayToReceive
        ]);
    }
}