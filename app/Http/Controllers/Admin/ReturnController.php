<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnModel;
use App\Models\Tool;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = ReturnModel::with(['loan.tool', 'loan.user'])->where('status', 'menunggu')->get();
        return view('backend.admin.returns.index', compact('returns'));
    }

    public function show(ReturnModel $return)
    {
        $return->load(['loan.tool', 'loan.user']);
        return view('backend.admin.returns.show', compact('return'));
    }

    public function update(Request $request, ReturnModel $return)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'alasan' => 'nullable|string',
        ]);
        $return->status = $request->status;
        $return->save();
        // Jika disetujui, ubah status alat
        if ($request->status == 'disetujui') {
            $tool = $return->loan->tool;
            $tool->quantity += 1;
            $tool->status = 'tersedia';
            $tool->save();
        }
        return redirect()->route('admin.returns.index')->with('success', 'Pengembalian berhasil diverifikasi.');
    }
}
