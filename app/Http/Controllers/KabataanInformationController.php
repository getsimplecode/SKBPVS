<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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


    public function store(Request $request)
    {

        $data = $request->validate([
        'firstname' => 'required|string|max:250',
        'middlename' => 'required|string|max:250',
        'lastname' => 'required|string|max:250',
        'suffix' => 'nullable|string|max:250',
        'gender' => 'required|in:Male,Female',
        'motherfullname' => 'required|string|max:250',
        'fatherfullname' => 'required|string|max:250',
        'purok' => 'required|string|max:50',
        'religion' => 'required|string|max:250',
        'earlypregnancy' => 'required|boolean',
        'mstatus' => 'required|string|max:250',
        'ismalnourished' => 'required|boolean',
        'isvoters' => 'required|boolean',
        'birthdate' => 'required|date'
        ]);

        $kabataan = $this->service->store($data);

        if ($kabataan) {
            return redirect()->route('kabataaninformation.index')
                             ->with('success', 'Data Successfully Added to Kabataan!');
        } else {
            return back()->with('error', 'Something went wrong');
        }


    }


    public function update(Request $request,Kabataan $id)
    {
        try{
            $data = $request->validate([
                'firstname' => 'required|string|max:250',
                'middlename' => 'required|string|max:250',
                'lastname' => 'required|string|max:250',
                'suffix' => 'nullable|string|max:250',
                'gender' => 'required|in:Male,Female',
                'motherfullname' => 'required|string|max:250',
                'fatherfullname' => 'required|string|max:250',
                'purok' => 'required|string|max:50',
                'religion' => 'required|string|max:250',
                'earlypregnancy' => 'required|boolean',
                'mstatus' => 'required|string|max:250',
                'ismalnourished' => 'required|boolean',
                'isvoters' => 'required|boolean',
                'birthdate' => 'required|date'
            ]);

            $data['age'] = Carbon::parse($data['birthdate'])->age;

            $id->update($data);
            return redirect()->back()->with('success','Data Successfully Updated!');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }


    public function destroy(Kabataan $id)
    {
        $id->delete();
        return redirect()->route('kabataaninformation.index')->with('success','Data is deleted');
    }
}
