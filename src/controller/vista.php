<?php

namespace App\Controller;

abstract class Vista
{
    protected function renderView($view, $data) 
    {
        global $responseData;

        $responseData = $data;

        extract($responseData);

        require BASE_DIR . "public/header.php";
        require BASE_DIR . "public/{$view}.php";
        require BASE_DIR . "public/footer.php";
    }

    protected function getTotals()
    {
        $dashboardDao = new \App\Dao\Dashboard();

        return $dashboardDao->getTotals();
    }
}