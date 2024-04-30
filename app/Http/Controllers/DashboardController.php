<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $branchs = Branch::all();

        return view('pages.dashboard', compact('branchs'));
    }

    public function dashboard(string $id)
    {

        $branch = Branch::find($id);
        $branchs = Branch::all();

        if (!$branch) {
            return redirect()->route('home');
        }

        return view('pages.dashboard.index', compact('branchs', 'branch'));
    }
}
