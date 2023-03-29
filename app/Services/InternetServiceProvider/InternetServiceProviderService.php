<?php

namespace App\Services\InternetServiceProvider;

class InternetServiceProviderService
{
    protected $operator;
    
    protected $month;
    
    protected $monthlyFees;
    
    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}