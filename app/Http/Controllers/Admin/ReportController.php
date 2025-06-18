<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        // Data peminjam bulan ini
        $currentMonth = now()->format('Y-m');
        $loansThisMonth = Loan::whereRaw('DATE_FORMAT(start_date, "%Y-%m") = ?', [$currentMonth])
            ->with('tool', 'user')
            ->orderBy('start_date', 'desc')
            ->get();
        return view('backend.admin.reports.index', compact('loansThisMonth'));
    }

    public function exportPdf()
    {
        $currentMonth = now()->format('Y-m');
        $loansThisMonth = Loan::whereRaw('DATE_FORMAT(start_date, "%Y-%m") = ?', [$currentMonth])
            ->with('tool', 'user')
            ->orderBy('start_date', 'desc')
            ->get();
        $pdf = Pdf::loadView('backend.admin.reports.pdf', compact('loansThisMonth'));
        return $pdf->download('laporan_peminjaman_bulan_ini.pdf');
    }
}
