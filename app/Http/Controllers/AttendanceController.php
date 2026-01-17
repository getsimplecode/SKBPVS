<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Attended;
use App\Models\Kabataan;

class AttendanceController extends Controller
{

    public function index()
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
    
        // Find event where date exactly matches (ignores time)
        $events = Event::whereDate('date',$currentDate)->first();

        $attendances = Attendance::with('kabataan')
        ->where('status', 'Active')
        ->orderBy('id','desc')
        ->get();

    
        return view('Attendace.index', compact('events','attendances'));
    }

    public function gotoattended(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $totalkabataan = Kabataan::count();

        $events = Event::where('date','<',$currentDate)->get();

        if($request->filled('filter') && $request->filter !== 'all'){
            $attended = Attended::with(['event','kabataan'])
            ->whereHas('event', function($query) use ($request){
                $query->where('title',$request->input('filter'));
                
            })
            ->get();
            $totalkabataan_perevent = Attended::with(['event','kabataan'])
            ->whereHas('event', function($query) use ($request){
                $query->where('title',$request->input('filter'));
                
            })
            ->count();
        }

        else{
            $attended = Attended::with(['event', 'kabataan'])->get();
            $totalkabataan_perevent = 0;
        }

        $title = $request->input('filter');

        $puroksdata = $this->showpiechartdata($title);
        return view('Attendace.attendedrecords',compact('attended','events','puroksdata','title','totalkabataan','totalkabataan_perevent'));
    }

        public function showpiechartdata($title)
        {
            $percentages = [];
        
            for ($i = 1; $i <= 7; $i++) {

                $total = Kabataan::where('purok', $i)->count();
        
                $attended = Attended::whereHas('event', function ($query) use ($title) {
                        $query->where('title', $title);
                    })
                    ->whereHas('kabataan', function ($query) use ($i) {
                        $query->where('purok', $i);
                    })
                    ->count();

                $percentages[] = $total > 0 ? round(($attended / $total) * 100, 2) : 0;
            }
        
            return $percentages;
        }


    public function storeattended(Request $request){

        $attendeds = Attendance::all();

        foreach($attendeds as $attend){
            Attended::create([
                'event_id' => $attend->event_id,
                'kabataan_id' => $attend->kabataan_id,
                'status' => 'attended'
            ]);
        }

        Attendance::truncate();

        return redirect()->route('attendance.index')->with('success','Attendance Successfully Save!');
    }


    public function store(Request $request)
    {
        // 1. Validate input normally
        $request->validate([
            'kabataan_id' => 'required|exists:kabataans,id',
            'event_id' => 'required|exists:events,id',
        ]);
    
        // 2. Check if this kabataan already has attendance for this event
        $existing = Attendance::where('kabataan_id', $request->kabataan_id)
                              ->where('event_id', $request->event_id)
                              ->first();
    
        if ($existing) {
            // Already recorded
            return redirect()->back()->with('error', 'This kabataan is already marked present for this event.');
        }
    
        // 3. Store attendance if not duplicated
        Attendance::create([
            'kabataan_id' => $request->kabataan_id,
            'event_id' => $request->event_id,
            'status' => 'Active'
        ]);
    
        return redirect()->route('attendance.index')->with('success', 'Successfully added to attendance.');
    }

    public function destroyattended(Attended $id){
        $id->delete();
        return redirect()->back()->with('success','Successfully remove data.');
    }
    

    public function clear()
    {
        Attendance::truncate();
        return redirect()->route('attendance.index')->with('success','Clear all attendance data');
    }

   


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
