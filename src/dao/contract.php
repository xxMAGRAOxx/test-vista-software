<?php

namespace App\Dao;

class Contract extends \App\Dao\Vista implements \App\Dao\Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        
    }

    public function getAll()
    {
        $rows = $this->db->table("contract")->get();

        return $this->db->getCount() ? $rows : [];
    }

    public function set(\App\Model\User $contract)
    {
        return $this->db->insert('contract',
        [
            'landlord_id'        => $contract->landlord->id,
            'lessee_id'          => $contract->lessee->id,
            'property_id'	     => $contract->property->id,
            'date_begin'         => $contract->dateBegin,
            'date_end'           => $contract->dateEnd,
            'administration_fee' => $contract->administrationFee,
            'rent_amount'        => $contract->rentAmount,
            'condominium_amount' => $contract->condominiumAmount,
            'iptu_amount'        => $contract->iptuAmount
        ]);
    }

    public function setMonthlyPaments($monthlyPaments)
    {
        foreach($monthlyPaments["repasse"] as $repasse)
        {
            $this->db->insert('monthly_payments',
            [
                'contract_id'        => $repasse["contract_id"],
                'payment_type_id'    => $repasse["payment_type_id"],
                'date'	             => $repasse["date"],
                'amount'             => $repasse["amount"]
            ]);
        }

        foreach($monthlyPaments["aluguel"] as $alugel)
        {
            $this->db->insert('monthly_payments',
            [
                'contract_id'        => $alugel["contract_id"],
                'payment_type_id'    => $alugel["payment_type_id"],
                'date'	             => $alugel["date"],
                'amount'             => $alugel["amount"]
            ]);
        }

        foreach($monthlyPaments["taxa_administrativa"] as $taxa_administrativa)
        {
            $this->db->insert('monthly_payments',
            [
                'contract_id'        => $taxa_administrativa["contract_id"],
                'payment_type_id'    => $taxa_administrativa["payment_type_id"],
                'date'	             => $taxa_administrativa["date"],
                'amount'             => $taxa_administrativa["amount"]
            ]);
        }
    }

    public function getMonthlyPaments($contractId)
    {
        $rows = $this->db->table("monthly_payments")->where('payment_type_id','3')->where('contract_id', $contractId)->get();

        $monthlyPaments["aluguel"] = $this->db->getCount() ? $rows : [];

        $rows = $this->db->table("monthly_payments")->where('payment_type_id','2')->where('contract_id', $contractId)->get();

        $monthlyPaments["repasse"] = $this->db->getCount() ? $rows : [];

        $rows = $this->db->table("monthly_payments")->where('payment_type_id','1')->where('contract_id', $contractId)->get();

        $monthlyPaments["taxa_administrativa"] = $this->db->getCount() ? $rows : [];

        return $monthlyPaments;
    }

    public function pay($monthlyPamentId)
    {
        $this->db->update('monthly_payments',
        [
            'is_payed' => 1
        ])->where('id', $monthlyPamentId)->exec();
    }
}