<?php

namespace App\Http\Controllers;

use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    protected $mptService;
    protected $ooredooService;

    public function __construct(Mpt $mpt,Ooredoo $ooredoo)
    {
        $this->mptService = $mpt;
        $this->ooredooService = $ooredoo;
    }
    public function getMptInvoiceAmount(Request $request)
    {
        $this->mptService->setMonth($request->get('month') ?: 1);
        $amount = $this->mptService->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount,
            'status' => 200,
            'message'=> 'Success'
        ]);
    }
    
    public function getOoredooInvoiceAmount(Request $request)
    {
        $this->ooredooService->setMonth($request->get('month') ?: 1);
        $amount = $this->ooredooService->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount,
            'status' => 200,
            'message'=> 'Success'
        ]);
    }
}
