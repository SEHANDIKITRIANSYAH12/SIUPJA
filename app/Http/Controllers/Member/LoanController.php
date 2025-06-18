<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanController extends Controller
{
    public function create()
    {
        $tools = Tool::where('status', 'tersedia')->where('quantity', '>', 0)->get();
        return view('backend.member.loans.create', compact('tools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);
        Loan::create([
            'user_id' => Auth::id(),
            'tool_id' => $request->tool_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'menunggu',
        ]);
        return redirect()->route('member.loans.index')->with('success', 'Pengajuan peminjaman berhasil dikirim.');
    }

    public function index()
    {
        $loans = Loan::where('user_id', Auth::id())->with('tool')->latest()->get();
        return view('backend.member.loans.index', compact('loans'));
    }

    public function downloadPdf(Loan $loan)
    {
        if ($loan->user_id !== Auth::id() || !in_array($loan->status, ['disetujui', 'dipinjam'])) {
            abort(403);
        }
        $loan->load('tool');
        $pdf = Pdf::loadView('backend.member.loans.pdf', compact('loan'));
        return $pdf->download('bukti_sewa_'.$loan->id.'.pdf');
    }
}
