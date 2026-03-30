<?php

namespace App\Http\Controllers;

use App\Services\DashboardServices;
use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $service;

    public function __construct(DashboardServices $service)
    {
        $this->service = $service;
    }

    public function index(){
        return view('Dashboard.index', $this->service->getStats());
    }

}
