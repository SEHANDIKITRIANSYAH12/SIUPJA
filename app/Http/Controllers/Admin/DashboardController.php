<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Loan;
use App\Models\ReturnModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik alat
        $jumlahTersedia = Tool::where('status', 'tersedia')->count();
        $jumlahDipinjam = Tool::where('status', 'dipinjam')->count();
        $jumlahRusak = Tool::where('status', 'rusak')->count();

        // Statistik peminjaman
        $pengajuanMenunggu = Loan::where('status', 'menunggu')->count();
        $pengembalianMenunggu = ReturnModel::where('status', 'menunggu')->count();

        // Grafik peminjaman per bulan (12 bulan terakhir)
        $loansPerMonth = DB::table('loans')
            ->selectRaw('DATE_FORMAT(start_date, "%Y-%m") as bulan, COUNT(*) as total')
            ->whereYear('start_date', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');
        $labels = collect(range(1,12))->map(function($m) {
            return date('M', mktime(0,0,0,$m,1));
        });
        $data = collect(range(1,12))->map(function($m) use ($loansPerMonth) {
            $key = now()->format('Y').'-'.str_pad($m,2,'0',STR_PAD_LEFT);
            return $loansPerMonth[$key] ?? 0;
        });

        // Grafik status pengembalian
        $returnStatus = DB::table('returns')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // Riwayat peminjaman terbaru (5 terakhir)
        $riwayatTerbaru = Loan::with('tool','user')->latest()->limit(5)->get();

        return view('backend.admin.dashboard', compact(
            'jumlahTersedia',
            'jumlahDipinjam',
            'jumlahRusak',
            'pengajuanMenunggu',
            'pengembalianMenunggu',
            'labels', 'data', 'returnStatus', 'riwayatTerbaru'
        ));
    }
}
