<?php

namespace App\Services\InternetServiceProvider;
use App\Services\InternetServiceProvider\InternetServiceProviderService;

class Ooredoo extends InternetServiceProviderService
{
    protected $operator;
    
    protected $month;
    
    protected $monthlyFees;
    
    public function __construct()
    {
        $this->operator = 'ooredoo';
        $this->month = 0;
        $this->monthlyFees = 150;
    }
}