<?php

namespace App\Controller;

class Landlord extends \App\Controller\Vista
{
    public function index()
    {
        $landlordDao = new \App\Dao\Landlord();

        $responseData['totals'] = $this->getTotals();
        $responseData['landlords'] = $landlordDao->getAll();

        $responseData['menus'] = $this->getMenuHighlight();

        $this->renderView("landlord", $responseData);
    }

    public function create()
    {
        $formData = filter_input_array(INPUT_POST);

        $landlord = new \App\Model\Landlord();
        
        $landlord->name = $formData["name"];
        $landlord->email = $formData["email"];
        $landlord->telephone = $formData["telephone"];
        $landlord->dayToReceive = (int) $formData["day-to-receive"];

        $landlordDao = new \App\Dao\Landlord();

        $landlordDao->set($landlord);

        $responseData['menus'] = $this->getMenuHighlight();

        header("Location: index");
    }

    private function getMenuHighlight()
    {
        $menu['menu_dashboard'] = '';
		$menu['menu_lessee'] = '';
		$menu['menu_landlord'] = 'class="active"';
		$menu['menu_property'] = '';
		$menu['menu_contract'] = '';

        return $menu;
    }
}