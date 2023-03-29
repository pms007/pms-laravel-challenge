<?php

namespace App\Services\InternetServiceProvider;
use App\Services\InternetServiceProvider\InternetServiceProviderService;
class Mpt extends InternetServiceProviderService
{
    protected $operator;
    
    protected $month;
    
    protected $monthlyFees;

    public function __construct()
    {
        $this->operator = 'mpt';
        $this->month = 0;
        $this->monthlyFees = 200;
    }
}