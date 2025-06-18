<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Tool;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['tool', 'user'])->orderByDesc('created_at')->get();
        return view('backend.admin.loans.index', compact('loans'));
    }

    public function show(Loan $loan)
    {
        $loan->load(['tool', 'user']);
        return view('backend.admin.loans.show', compact('loan'));
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'alasan' => 'nullable|string',
        ]);

        $loan->status = $request->status;
        $loan->save();

        // Jika disetujui, kurangi quantity alat
        if ($request->status == 'disetujui') {
            $tool = $loan->tool;
            $tool->quantity -= 1;
            if ($tool->quantity == 0) {
                $tool->status = 'rusak';
            }
            $tool->save();

            // Update status peminjaman menjadi dipinjam
            $loan->status = 'dipinjam';
            $loan->save();
        }

        return redirect()->route('admin.loans.index')->with('success', 'Peminjaman berhasil diverifikasi.');
    }
}
