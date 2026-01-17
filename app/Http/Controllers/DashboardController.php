<?php

namespace App\Http\Controllers;

use App\Models\Kabataan;
use App\Models\Event;
use App\Models\Attended;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $currentYear = Carbon::now('Asia/Manila')->year;


        $totalkabataan = Kabataan::count();
        $registervoters = Kabataan::where('isvoters',1)->count();
        $earlypregnancy = Kabataan::where('earlypregnancy',1)->count();
        $upcomingevent = Event::where('date','>',$currentDate)->count();

        $monthlyAttendance = [];

        for ($month = 1; $month <= 12; $month++) {
            $start = Carbon::createFromDate($currentYear, $month, 1)->startOfMonth();
            $end = Carbon::createFromDate($currentYear, $month, 1)->endOfMonth();

            $count = Attended::whereBetween('created_at', [$start, $end])->count();

            // Optional: Get month name like 'January'
            $monthName = $start->format('F');

            $monthlyAttendance[$monthName] = $count;
        }

        return view('Dashboard.index',compact('totalkabataan','registervoters','earlypregnancy','upcomingevent','currentYear','monthlyAttendance'));
    }

    public function barchart(){

    }

}
