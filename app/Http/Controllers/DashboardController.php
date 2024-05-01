<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $customers = Customer::all()->count();
        $products = Product::where("branch_id", $id)->count();
        $transactionsTotal = Transaction::where("branch_id", $id)->count();

        $totalPerMonth = Transaction::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->where("branch_id", $id)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $transactions = [];
        for ($i = 1; $i <= 12; $i++) {
            $transactions[] = 0;
            if (isset($totalPerMonth[$i])) {
                $transactions[$i] = $totalPerMonth[$i];
            }
        }

        return view('pages.dashboard.index', compact('branchs', 'branch', 'customers', 'transactionsTotal', 'products', 'transactions'));
    }
}
