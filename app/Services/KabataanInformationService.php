<?php

namespace App\Services;

use App\Models\Kabataan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KabataanInformationService
{

    public function search($data = null)
    {
        $query = Kabataan::query();
        $query->whereBetween(
            DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'),
            [15, 30]
        );
        if ($data) {
            $query->where(function ($q) use ($data) {
                $q->where('firstname', 'like', "%$data%")
                    ->orWhere('middlename', 'like', "%$data%")
                    ->orWhere('lastname', 'like', "%$data%");
            });
        }

        return $query->paginate(10);
    }

    public function addAge()
    {
        $today = Carbon::today();

        $kabataan = DB::table('kabataans')
            ->whereMonth('birthdate', $today->month)
            ->whereDay('birthdate', $today->day)
            ->get();

        foreach ($kabataan as $k) {
            DB::table('kabataans')
                ->where('id', $k->id)
                ->update([
                    'age' => $k->age + 1
                ]);
        }
    }

    public function turnToAdult(){

    }

    public function store($request)
    {
        $data = $request->validated();
        $data['age'] = Carbon::parse($data['birthdate'])->age;
        Kabataan::create($data);
        return back()->with('success','Successfully added new kabataan!');
    }

    public function update($request,$kabataan){
        $data = $request->validated();
        $data['age'] = Carbon::parse($data['birthdate'])->age;
        $kabataan->update($data);
        return back()->with('success', 'Successfully updated kabataan!');
    }
    

}
