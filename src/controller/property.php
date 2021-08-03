<?php

namespace App\Controller;

class Property extends \App\Controller\Vista
{
    public function index()
    {
        \VistaApiClient::getAllPropertyFields();

        $responseData['totals'] = $this->getTotals();
        $responseData['properties'] = \VistaApiClient::getAllProperty();

        $responseData['menus'] = $this->getMenuHighlight();

        $this->renderView("property", $responseData);
    }

    private function getMenuHighlight()
    {
        $menu['menu_dashboard'] = '';
		$menu['menu_lessee'] = '';
		$menu['menu_landlord'] = '';
		$menu['menu_property'] = 'class="active"';
		$menu['menu_contract'] = '';

        return $menu;
    }
}