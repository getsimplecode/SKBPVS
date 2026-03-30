<?php
namespace App\Services;

use App\Models\SkOfficial;

class SkOfficialService{

    public function store($request){

        $data = $request->validated();
        if($data['position'] === "chairman" && $data['selection_type'] === "appointed"){
            return back()->with('error', 'Chairperson cannot be appointed.');
        }
        if($data['position'] === "chairman"){
            $exist = SkOfficial::where('status','active')->where('position','chairman')->exists();
            if($exist){
                return back()->with('error','There is still an elected official!');
            }
        }
        SkOfficial::create($data);
        return back()->with('success','Successfully added official!');
    }

    public function update($id,$request){
        $data = $request->validated();
        $id->update($data);
        return back()->with('success','Successfully change details!');
    }

}