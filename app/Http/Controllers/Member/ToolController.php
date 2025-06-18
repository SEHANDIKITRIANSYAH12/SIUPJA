<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();
        return view('backend.member.tools.index', compact('tools'));
    }
}
