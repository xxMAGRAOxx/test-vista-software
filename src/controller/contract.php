<?php

namespace App\Controller;

class Contract extends \App\Controller\Vista
{
    public function index()
    {
        $lesseeDao = new \App\Dao\Lessee();
        $landlordDao = new \App\Dao\Landlord();
        $contractDao = new \App\Dao\Contract();

        $responseData['totals'] = $this->getTotals();
        
        \VistaApiClient::getAllPropertyFields();

        $responseData['properties'] = \VistaApiClient::getAllProperty();
        $responseData['lessees'] = $lesseeDao->getAll();
        $responseData['landlords'] = $landlordDao->getAll();
        $responseData['contracts'] = $contractDao->getAll();

        $responseData['menus'] = $this->getMenuHighlight();

        $this->renderView("contract", $responseData);
    }

    public function create()
    {
        $formData = filter_input_array(INPUT_POST);

        $lessee = new \App\Model\Lessee();
        $lessee->id = (int) $formData["lessee-id"];

        $landlord = new \App\Model\Landlord();
        $landlord->id = (int) $formData["landlord-id"];

        $property = new \App\Model\Property();
        $property->id = (int) $formData["property-id"];

        $contract = new \App\Model\Contract($lessee, $landlord, $property);
        $contract->dateBegin = date('Y-m-d', strtotime(str_replace(['/',' '],['-', ''], $formData["date-begin"])));
        $contract->dateEnd = date('Y-m-d', strtotime(str_replace(['/',' '],['-', ''], $formData["date-end"])));
        $contract->administrationFee = (int) $formData["adminstration-fee"];
        $contract->rentAmount = (int) $formData["rent-amount"];
        $contract->condominiumAmount = (int) $formData["condominium-amount"];
        $contract->iptuAmount = (int) $formData["iptu-amount"];

        $contractDao = new \App\Dao\Contract();

        $contractId = $contractDao->set($contract);

        $monthlyPaments = $contract->generateMonthlyPayments($contractId);

        $contractDao->setMonthlyPaments($monthlyPaments);

        header("Location: index");
    }

    public function view($contractId)
    {
        $contractDao = new \App\Dao\Contract();
        
        global $responseData;

        $responseData['monthlyPaments'] = $contractDao->getMonthlyPaments($contractId);

        extract($responseData);

        require BASE_DIR . "public/contract-detail.php";
    }

    public function pay($monthlyPamentId)
    {
        $contractDao = new \App\Dao\Contract();

        $contractDao->pay($monthlyPamentId);

        header('Content-Type: application/json');

        echo json_encode([]);
    }

    private function getMenuHighlight()
    {
        $menu['menu_dashboard'] = '';
		$menu['menu_lessee'] = '';
		$menu['menu_landlord'] = '';
		$menu['menu_property'] = '';
		$menu['menu_contract'] = 'class="active"';

        return $menu;
    }
}