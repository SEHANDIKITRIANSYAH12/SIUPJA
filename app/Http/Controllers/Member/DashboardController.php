<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $alatTersedia = Tool::where('status', 'tersedia')->count();
        $jumlahDipinjam = Loan::where('user_id', $userId)->where('status', 'dipinjam')->count();
        $pengajuanTerakhir = Loan::where('user_id', $userId)->latest()->first();

        // Data grafik peminjaman per bulan (12 bulan terakhir)
        $loansPerMonth = DB::table('loans')
            ->selectRaw('DATE_FORMAT(start_date, "%Y-%m") as bulan, COUNT(*) as total')
            ->where('user_id', $userId)
            ->whereYear('start_date', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Siapkan label bulan (Jan, Feb, dst)
        $labels = collect(range(1,12))->map(function($m) {
            return date('M', mktime(0,0,0,$m,1));
        });
        $data = collect(range(1,12))->map(function($m) use ($loansPerMonth) {
            $key = now()->format('Y').'-'.str_pad($m,2,'0',STR_PAD_LEFT);
            return $loansPerMonth[$key] ?? 0;
        });

        // Pie Chart: status peminjaman
        $statusCounts = DB::table('loans')
            ->select('status', DB::raw('count(*) as total'))
            ->where('user_id', $userId)
            ->groupBy('status')
            ->pluck('total', 'status');

        // Bar Chart: alat paling sering dipinjam
        $topTools = DB::table('loans')
            ->join('tools', 'loans.tool_id', '=', 'tools.id')
            ->select('tools.name', DB::raw('count(*) as total'))
            ->where('loans.user_id', $userId)
            ->groupBy('tools.name')
            ->orderByDesc('total')
            ->limit(5)
            ->pluck('total', 'tools.name');

        // Riwayat peminjaman terbaru (5 terakhir)
        $riwayatTerbaru = \App\Models\Loan::where('user_id', $userId)->with('tool')->latest()->limit(5)->get();

        return view('backend.member.dashboard', compact(
            'alatTersedia', 'jumlahDipinjam', 'pengajuanTerakhir', 'labels', 'data',
            'statusCounts', 'topTools', 'riwayatTerbaru'
        ));
    }
}
