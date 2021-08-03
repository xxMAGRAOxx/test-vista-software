<?php

namespace App\Controller;

class Lessee extends \App\Controller\Vista
{
    public function index()
    {
        $lesseeDao = new \App\Dao\Lessee();

        $responseData['totals'] = $this->getTotals();
        $responseData['lessees'] = $lesseeDao->getAll();

        $responseData['menus'] = $this->getMenuHighlight();

        $this->renderView("lessee", $responseData);
    }

    public function create()
    {
        $formData = filter_input_array(INPUT_POST);

        $lessee = new \App\Model\Lessee();

        $lessee->name = $formData["name"];
        $lessee->telephone = $formData["telephone"];
        $lessee->email = $formData["email"];

        $lesseeDao = new \App\Dao\Lessee();

        $lesseeDao->set($lessee);

        $responseData['menus'] = $this->getMenuHighlight();

        header("Location: index");
    }

    private function getMenuHighlight()
    {
        $menu['menu_dashboard'] = '';
		$menu['menu_lessee'] = 'class="active"';
		$menu['menu_landlord'] = '';
		$menu['menu_property'] = '';
		$menu['menu_contract'] = '';

        return $menu;
    }
}