<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\Storage;
use App\Models\Kabataan;
use App\Models\Qrcodes;

class ManageqrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $kabataans = Kabataan::whereNotIn('id', function ($query) {
        $query->select('kabataan_id')->from('qr_codes');
        })->get();


        $search = $request->input('search');
        
        $qrcodes = Qrcodes::with('kabataan')
        ->when($search, function($query,$search){
            $query->whereHas('kabataan', function($q) use ($search){
                $q->where(DB::raw("CONCAT(firstname,' ',lastname)"),'like',"%{$search}%")
                  ->orWhere(DB::raw("CONCAT(firstname,' ',middlename)"), 'like',"%{$search}%")
                  ->orWhere(DB::raw("CONCAT(firstname,' ',middlename,' ',lastname)"), 'like',"%{$search}%")
                  ->orWhere('firstname','like',"%{$search}%")
                  ->orWhere('middlename','like',"%{$search}%")
                  ->orWhere('lastname','like',"%{$search}%");
            });
        })
        ->orderBy('id','DESC')
        ->paginate(6);
        return view('ManageQrcode.index',compact('kabataans','qrcodes'));
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'kabataan_id' => 'required|exists:kabataans,id',
        ]);
    
        $existingkabataan = Qrcodes::where('kabataan_id', $request->kabataan_id)
            ->where('status', '!=', 'LOST')
            ->first();
    
        if ($existingkabataan) {
            return back()->with('error', 'Already has QR Code');
        }
    
        // ✅ Fetch kabataan details first
        $kabataan = Kabataan::findOrFail($request->kabataan_id);
    
        // ✅ Create QR content string
        $qrContent = "ID: {$kabataan->id}\n" .
                     "Name: {$kabataan->firstname} {$kabataan->middlename} {$kabataan->lastname}\n";
    
        // ✅ Generate QR code with full info
        $base64Image = base64_encode(
            QrCode::format('png')->size(300)->generate($qrContent)
        );
    
        // ✅ Save to DB
        Qrcodes::create([
            'kabataan_id' => $request->kabataan_id,
            'image' => $base64Image,
            'status' => 'NEW'
        ]);
    
        return back()->with('success', 'QR Code generated and saved!');
    }
    


    public function SetStatus(Request $request,Qrcodes $id)
    {
        $request->validate([
            'kabataan_id' => 'required|exists:kabataans,id',
            'status' => 'required'
        ]);

        $id->update([
            'kabataan_id' => $request->kabataan_id,
            'image' => $request->image,
            'status' => $request->status,
        ]);

        return redirect()->route('manageqrcode.index')->with('success','Successfully set status');

    }

    public function downloadqr($id)
    {
        $qr = Qrcodes::findOrFail($id);
    
        $imageData = base64_decode($qr->image);
        $filename = 'qr_code_' . $id . '.png';
    
        return response($imageData)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
    

    public function destroy(Qrcodes $id)
    {
        $id->delete();
        return redirect()->route('manageqrcode.index')->with('success','Successfully QR Code deleted.');
    }
}
