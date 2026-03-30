<?php

namespace App\Http\Controllers;

use App\Http\Requests\KabataanRequest;
use App\Models\Kabataan;
use App\Services\KabataanInformationService;
use Illuminate\Http\Request;

class KabataanInformationController extends Controller
{

    protected $service;

    public function __construct(KabataanInformationService $service){

        $this->service = $service;
        
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $kabataans = $this->service->search($search);

        return view('KabataanInformation.index',compact('kabataans'));
    }

    public function gotokabataanlist(Request $request)
    {
        
        $search = $request->input('search');
    
        $kabataans = $this->service->search($search);
    
        return view('KabataanInformation.kabataanlist', compact('kabataans'));
    }
    

    public function statistics(){

        return view('KabataanInformation.kabataanstatistics');
    }


    public function store(KabataanRequest $request)
    {
        return $this->service->store($request);
    }


    public function update(KabataanRequest $request,Kabataan $kabataan)
    {
        return $this->service->update($request,$kabataan);
    }


    public function destroy(Kabataan $id)
    {
        $id->delete();
        return redirect()->route('kabataaninformation.index')->with('success','Successfully deleted kabataan!');
    }
}
