<?php

namespace App\Services;

use App\Models\Kabataan;
use Carbon\Carbon;
class KabataanInformationService
{

    public function search(string $data = null)
    {
        $query = Kabataan::query();

        if($data){
            $query->where('firstname','like',"%$data%")
            ->orWhere('middlename','like',"%$data%")
            ->orWhere('lastname','like',"%$data%");
        }

        return $query->paginate(10);
    }

    public function store(array $data)
    {
        try{

            $data['age'] = Carbon::parse($data['birthdate'])->age;
            Kabataan::create($data);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong');

        }
    }

}
