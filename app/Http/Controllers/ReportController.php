<?php

namespace App\Http\Controllers;

use App\Models\Kabataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    private function baseQuery()
    {
        return Kabataan::whereBetween(
            DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'),
            [15, 30]
        );
    }

    public function index(Request $request)
    {
        $filters = $request->only(['gender', 'purok', 'age_from', 'age_to', 'isvoters', 'ispwd', 'education_background', 'earlypregnancy']);

        $query = $this->applyFilters($this->baseQuery(), $filters);

        // Summary based on current filters
        $summary = (clone $query)->selectRaw("
            COUNT(*)                                 AS total,
            SUM(gender = 'Male')                     AS male,
            SUM(gender = 'Female')                   AS female,
            SUM(isvoters = 1)                        AS voters,
            SUM(ispwd = 1)                           AS pwd,
            SUM(earlypregnancy = 1)                  AS earlypregnancy,
            SUM(education_background = 'Employed')   AS employed,
            SUM(education_background = 'Unemployed') AS unemployed
        ")->first();

        $puroks = Kabataan::distinct()->orderBy('purok')->pluck('purok');

        $kabataan = $query->orderBy('lastname')->paginate(15)->withQueryString();

        return view('Reports.index', compact('kabataan', 'summary', 'puroks', 'filters'));
    }

    public function exportPdf(Request $request)
    {
        $filters = $request->only(['gender', 'purok', 'age_from', 'age_to', 'isvoters', 'ispwd', 'education_background', 'earlypregnancy']);
        $kabataan = $this->applyFilters($this->baseQuery(), $filters)->orderBy('lastname')->get();

        $pdf = Pdf::loadView('Reports.pdf', compact('kabataan', 'filters'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('kabataan-report-' . now()->format('Y-m-d') . '.pdf');
    }

    public function exportCsv(Request $request)
    {
        $filters = $request->only(['gender', 'purok', 'age_from', 'age_to', 'isvoters', 'ispwd', 'education_background', 'earlypregnancy']);
        $kabataan = $this->applyFilters($this->baseQuery(), $filters)->orderBy('lastname')->get();

        $filename = 'kabataan-report-' . now()->format('Y-m-d') . '.csv';
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => "attachment; filename=\"$filename\""];

        $callback = function () use ($kabataan) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Full Name', 'Age', 'Gender', 'Purok', 'Voter', 'PWD', 'Employment', 'Early Pregnancy']);

            foreach ($kabataan as $row) {
                fputcsv($file, [
                    "{$row->firstname} {$row->middlename} {$row->lastname}",
                    $row->age,
                    $row->gender,
                    $row->purok,
                    $row->isvoters ? 'Yes' : 'No',
                    $row->ispwd ? 'Yes' : 'No',
                    $row->education_background,
                    $row->earlypregnancy ? 'Yes' : 'No',
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function applyFilters($query, array $filters)
    {
        if (!empty($filters['gender']))
            $query->where('gender', $filters['gender']);

        if (!empty($filters['purok']))
            $query->where('purok', $filters['purok']);

        if (!empty($filters['age_from']))
            $query->whereRaw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) >= ?', [$filters['age_from']]);

        if (!empty($filters['age_to']))
            $query->whereRaw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) <= ?', [$filters['age_to']]);

        if (isset($filters['isvoters']) && $filters['isvoters'] !== '')
            $query->where('isvoters', $filters['isvoters']);

        if (isset($filters['ispwd']) && $filters['ispwd'] !== '')
            $query->where('ispwd', $filters['ispwd']);

        if (!empty($filters['education_background']))
            $query->where('education_background', $filters['education_background']);

        if (isset($filters['earlypregnancy']) && $filters['earlypregnancy'] !== '')
            $query->where('earlypregnancy', $filters['earlypregnancy']);

        return $query;
    }
}
