<?php

namespace App\Dao;

interface Database
{

    public function get($id);
    public function getAll();
    public function set(\App\Model\User $user);
}