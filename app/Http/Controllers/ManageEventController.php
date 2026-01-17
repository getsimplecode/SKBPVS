<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attended;
use Carbon\Carbon;

class ManageEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $events = Event::where('date','>=',$currentDate)->get();
        return view('ManageEvent.index',compact('events'));
    }

    public function history()
    {
        $events = Event::withCount(['attended as kabataan_attended_count' => function ($query) {
            $query->whereDate('date', '<', now());
        }])
        ->get();

        return view('ManageEvent.historyevents',compact('events'));
    }


    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'title' => 'required|string|max:250',
                'date' => 'required|date',
                'time' => 'required',
                'location' => 'required|string|max:250',
                'incharge' => 'required|string|max:250'
            ]);
    
            Event::create($data);
            return redirect()->route('managevent.index')->with('success','Successfully Added Event.');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }


    public function destroy(Event $id)
    {
        $id->delete();
        return redirect()->route('managevent.index')->with('success','Successfully remove event');
    }

}
