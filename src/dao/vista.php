<?php

namespace App\Dao;

abstract class Vista
{
    protected $db;

    protected function __construct()
    {
        $this->db = \DB::getInstance();
    }
}