<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();
        return view('backend.admin.tools.index', compact('tools'));
    }

    public function create()
    {
        return view('backend.admin.tools.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:tersedia,dipinjam,rusak',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('alat', 'public');
        }
        Tool::create($data);
        return redirect()->route('admin.tools.index')->with('success', 'Alat berhasil ditambahkan.');
    }

    public function edit(Tool $tool)
    {
        return view('backend.admin.tools.edit', compact('tool'));
    }

    public function update(Request $request, Tool $tool)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:tersedia,dipinjam,rusak',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('alat', 'public');
        }
        $tool->update($data);
        return redirect()->route('admin.tools.index')->with('success', 'Alat berhasil diupdate.');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('admin.tools.index')->with('success', 'Alat berhasil dihapus.');
    }
}
