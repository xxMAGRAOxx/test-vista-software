<?php

namespace App\Controller;

class Dashboard extends \App\Controller\Vista
{
    public function index()
    {
        $landlordDao = new \App\Dao\Landlord();
        $lesseeDao = new \App\Dao\Lessee();
        $contractDao = new \App\Dao\Contract();
        $propertyDao = new \App\Dao\Property();

        $responseData['totals'] = $this->getTotals();
        $responseData['lessees'] = $lesseeDao->getAll();
        $responseData['landlords'] = $landlordDao->getAll();
        $responseData['properties'] = $propertyDao->getAll();
        $responseData['contracts'] = $contractDao->getAll();

        $responseData['menus'] = $this->getMenuHighlight();

        $this->renderView("index", $responseData);
    }

    private function getMenuHighlight()
    {
        $menu['menu_dashboard'] = 'class="active"';
		$menu['menu_lessee'] = '';
		$menu['menu_landlord'] = '';
		$menu['menu_property'] = '';
		$menu['menu_contract'] = '';

        return $menu;
    }
}