<?php

namespace App\Http\Controllers;

use App\Models\Kabataan;
use App\Models\Event;
use App\Models\Attended;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();

        if($request->showdata === "earlypregnancy"){
            $kabataan = Kabataan::where('earlypregnancy',1)->get();
        }
        else if($request->showdata === "earlypregnancy"){
            $kabataan = Kabataan::where('isvoters',1)->get();
        }
        else if($request->showdata === "ismalnourished"){
            $kabataan = Kabataan::where('ismalnourished',1)->get();
        }
        else{
            $kabataan = Kabataan::all();
        }

        return view('Reports.index',compact('kabataan'));

    }

    public function gotoprint(Request $request)
    {
        if($request->showdata === "earlypregnancy"){
            $kabataan = Kabataan::where('earlypregnancy',1)->get();
        }
        else if($request->showdata === "earlypregnancy"){
            $kabataan = Kabataan::where('isvoters',1)->get();
        }
        else if($request->showdata === "ismalnourished"){
            $kabataan = Kabataan::where('ismalnourished',1)->get();
        }
        else{
            $kabataan = Kabataan::all();
        }
        return view('Reports.printformat',compact('kabataan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
