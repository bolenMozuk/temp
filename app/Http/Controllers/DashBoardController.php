<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleService;

class DashBoardController extends Controller
{
    protected GoogleService $service;

    public function __construct(GoogleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('dashboard');
    }

    public function dashboard()
    {
        $prices = $this->service->getStockPrices();
        return response($prices);
    }
}
