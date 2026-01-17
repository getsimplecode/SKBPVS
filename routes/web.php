<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabataanInformationController;
use App\Http\Controllers\ManageEventController;
use App\Http\Controllers\ManageqrcodeController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/main', function () {
    $user = auth()->user();
    return view('Layouts.mainlayout',compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::controller(KabataanInformationController::class)->group(function(){
    Route::name('kabataaninformation.')->group(function(){
        Route::get('/kabataaninformation','index')->name('index');
        Route::post('/kabataaninformation/store','store')->name('store');
        Route::put('/kabataaninformation/update/{id}','update')->name('update');
        Route::delete('/kabataaninformation/destroy/{id}')->name('destroy');
        
        Route::get('/kabataanlist','gotokabataanlist')->name('list');
        Route::get('/kabataanstatistics','statistics')->name('statistics');
    });
});

Route::controller(ManageEventController::class)->group(function(){
    Route::name('manageevent.')->group(function(){
        Route::get('/ManageEvent','index')->name('index');
        Route::post('/ManageEvent/store','store')->name('store');
        Route::delete('/ManageEvent/destroy/{id}','destroy')->name('destroy');
        Route::get('/HistoryEvents','history')->name('history');
    });
});

Route::controller(ManageqrcodeController::class)->group(function(){
    Route::name('manageqrcode.')->group(function(){
        Route::get('/Manageqrcode','index')->name('index');
        Route::post('/qrcode/store','store')->name('store');
        Route::delete('Manageqrcode/{id}','destroy')->name('destroy');
    });
});

Route::controller(AttendanceController::class)->group(function(){
    Route::name('attendance.')->group(function(){
        Route::get('/TrackAttendance','index')->name('index');
        Route::post('/TrackAttendance/store','store')->name('store');
        Route::post('/TrackAttendance/clear','clear')->name('clear');
        Route::post('/TrackAttendance/storeattended', 'storeattended')->name('storeattended');
        Route::get('/Attendancerecords','gotoattended')->name('attendedrecords');
        Route::get('/Attendedrecords/destroy/{id}','destroyattended')->name('destroyattended');
    });
});

Route::get('/Reportsrecords',[ReportController::class, 'index'])->middleware('auth')->name('report.index');
Route::get('/PrintReport',[ReportController::class, 'gotoprint'])->middleware('auth')->name('report.print');

//REPORT ROUTES END

//PROFILE ROUTES STARTS
Route::get('/MyProfile',[ProfileController::class, 'gotoprofile'])->middleware('auth')->name('gotoprofile.index');

//PROFILE ROUTE ENDS

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
