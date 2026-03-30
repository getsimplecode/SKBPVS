<?php

namespace App\Services;

use App\Models\Attended;
use App\Models\Event;
use App\Models\Kabataan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardServices
{
    public function getStats(): array
    {
        return Cache::remember('dashboard.stats', now()->addMinutes(30), function () {
            $currentYear = Carbon::now('Asia/Manila')->year;

            $stats = Kabataan::whereBetween(
                DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'),
                [15, 30]
            )
                ->selectRaw("
                    COUNT(*)                                  AS totalkabataan,
                    SUM(isvoters = 1)                         AS registerVoter,
                    SUM(earlypregnancy = 1)                   AS earlypregnancy,
                    SUM(ispwd = 1)                            AS pwdkabataan,
                    SUM(work_status = 'Unemployed')  AS unemployed,
                    SUM(work_status = 'Employed')    AS employed
                ")
                ->first();

            $upcomingevent = Event::where('date', '>', now('Asia/Manila')->toDateString())->count();

            $monthlyAttendance = Attended::selectRaw("
                    MONTHNAME(created_at) AS month_name,
                    COUNT(*)              AS total
                ")
                ->whereYear('created_at', $currentYear)
                ->groupByRaw('MONTH(created_at), MONTHNAME(created_at)')
                ->orderByRaw('MONTH(created_at)')
                ->pluck('total', 'month_name');

            $kabataanPerPurok = [];

            // Loop through each Purok
            for ($i = 1; $i <= 7; $i++) {
                $label = "Purok " . $i;
                $count = Kabataan::whereBetween(
                    DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'),
                    [15, 30]
                )->where('purok', $i)->count();

                $kabataanPerPurok[$label] = $count;
            }

            $years = [];
            for($i = 2023; $i <= $currentYear; $i++ ){
                $years[] = $i;
            }
            $unemployedData = [];
            $employedData   = [];
            foreach ($years as $year) {
                $yearStats = Kabataan::whereBetween(
                    DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'),
                    [15, 30]
                )
                    ->whereYear('created_at', $year)
                    ->selectRaw("
                        SUM(work_status = 'Unemployed') AS unemployed,
                        SUM(work_status = 'Employed')   AS employed,
                        SUM(earlypregnancy = 1 )        AS ep,
                        SUM(ispwd =1 )                  AS pwd
                    ")
                    ->first();

                $unemployedData[] = (int) ($yearStats->unemployed ?? 0);
                $employedData[]   = (int) ($yearStats->employed ?? 0);
                $epData[]   = (int) ($yearStats->ep ?? 0);
                $pwdData[]   = (int) ($yearStats->pwd ?? 0);
            }
            return compact('years','stats', 'upcomingevent', 'currentYear', 'monthlyAttendance', 'kabataanPerPurok','employedData','unemployedData','epData','pwdData');
        });
    }
}
