<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\ReturnModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    public function create()
    {
        $loans = Loan::where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->doesntHave('return')
            ->with('tool')
            ->get();
        return view('backend.member.returns.create', compact('loans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'condition_note' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = [
            'loan_id' => $request->loan_id,
            'condition_note' => $request->condition_note,
            'status' => 'menunggu',
        ];
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('returns', 'public');
        }
        ReturnModel::create($data);
        return redirect()->route('member.loans.index')->with('success', 'Pengajuan pengembalian berhasil dikirim.');
    }
}
