<?php

namespace App\Dao;

class Dashboard extends \App\Dao\Vista
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTotals()
    {
        $sql = "SELECT  (
            SELECT COUNT(*)
            FROM   landlord
            ) AS total_landlord,
            (
            SELECT COUNT(*)
            FROM   lessee
            ) AS total_lessee,
            (
            SELECT COUNT(*)
            FROM   contract
            ) AS total_contract,
            (
            SELECT COUNT(*)
            FROM   property
            ) AS total_property";

        $rows = $this->db->query($sql)[0];

        return $rows;
    }
}