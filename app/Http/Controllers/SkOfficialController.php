<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkofficialRequest;
use App\Models\Kabataan;
use App\Models\SkOfficial;
use App\Services\SkOfficialService;

class SkOfficialController extends Controller
{
    protected $service;

    public function __construct(SkOfficialService $service)
    {
        $this->service = $service;
    }
    public function index(){

        $kabataans = Kabataan::get();
        $officials = SkOfficial::where('status','active')->get();
        return view('SkOfficials.index',compact('kabataans','officials'));
    }
    public function store(SkofficialRequest $request){
        return $this->service->store($request);
    }
    public function update(SkOfficial $id,SkofficialRequest $request){
        return $this->service->update($id,$request);
    }

}
