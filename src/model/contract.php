<?php

namespace App\Model;

use \App\Model\Landlord;
use \App\Model\Lessee;
use \App\Model\Property;

class Contract extends \App\Model\User
{
    public $landlord;
    public $lessee;
    public $property;

    public $dateBegin;
    public $dateEnd;
    public $administrationFee;
    public $rentAmount;
    public $condominiumAmount;
    public $iptuAmount;

    public function __construct(Lessee $lessee, Landlord $landlord, Property $property)
    {
        $this->lessee = $lessee;
        $this->landlord = $landlord;
        $this->property = $property;
    }

    public function generateMonthlyPayments($contractId)
    {
        $monthlyPaments = 
        [
            "repasse"               => [],
            "aluguel"               => [],
            "taxa_administrativa"   => []
        ];

        $aluguel = $this->rentAmount + $this->iptuAmount + $this->condominiumAmount;
        $aux = ($this->administrationFee / 100) * ($this->rentAmount + $this->iptuAmount);
        $repasse = ($this->rentAmount + $this->iptuAmount) - $aux;
        
        $begin = new \DateTime($this->dateBegin);
        $end = new \DateTime($this->dateEnd);
        $end = $end->modify('first day of next month');
        $interval = \DateInterval::createFromDateString('first day of next month');

        $period = new \DatePeriod($begin, $interval, $end);

        $index = 0;

        foreach($period as $dt) 
        {
            $monthlyPaments["repasse"][$index]["contract_id"] = $contractId;
            $monthlyPaments["repasse"][$index]["payment_type_id"] = 2;
            $monthlyPaments["repasse"][$index]["date"] = $dt->format("Y-m-d");
            $monthlyPaments["repasse"][$index]["amount"] = (int) $repasse;


            $monthlyPaments["aluguel"][$index]["contract_id"] = $contractId;
            $monthlyPaments["aluguel"][$index]["payment_type_id"] = 3;
            $monthlyPaments["aluguel"][$index]["date"] = $dt->format("Y-m-d");
            $monthlyPaments["aluguel"][$index]["amount"] = (int) $aluguel;

            $monthlyPaments["taxa_administrativa"][$index]["contract_id"] = $contractId;
            $monthlyPaments["taxa_administrativa"][$index]["payment_type_id"] = 1;
            $monthlyPaments["taxa_administrativa"][$index]["date"] = $dt->format("Y-m-d");
            $monthlyPaments["taxa_administrativa"][$index]["amount"] = (int) $aux;

            $index++;
        }
        
        return $monthlyPaments;
    }
}