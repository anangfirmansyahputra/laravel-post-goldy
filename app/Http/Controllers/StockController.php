<?php

namespace App\Http\Controllers;

use App\Models\Fragrance;
use App\Models\Product;
use App\Models\Stock;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function index(string $id): View
    {
        // $stocks = Stock::all();
        $products = Product::where("branch_id", $id)->get();
        $productStocks = [];

        foreach ($products as $product) {
            $stocks = Stock::where("product_id", $product->id)->get();

            $totalStock = 0;

            foreach ($stocks as $stock) {
                if ($stock->type === "IN") {
                    $totalStock += $stock->stock;
                } else {
                    $totalStock -= $stock->stock;
                }
            }

            $productStocks[] = [
                "product" => $product,
                "totalStock" => $totalStock,
            ];
        }


        return view('pages.stocks.index', compact('productStocks'));
    }

    public function create(string $id): View
    {
        $products = Product::where("branch_id", $id)->get();
        $fragrances = Fragrance::all();

        return view('pages.stocks.form', compact('products', 'fragrances'));
    }

    public function store(Request $request, string $branchId): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validate = Validator::make($request->all(), [
                "product_id" => "required",
                "type" => "required",
                "stock" => "required",
            ]);

            if ($validate->fails()) {
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }

            $stock = Stock::create([
                "branch_id" => $branchId,
                "product_id" => $request->product_id,
                "type" => $request->type,
                "stock" => $request->stock,
            ]);
            $stock->save();

            DB::commit();
            return redirect()->route("stocks.index", $branchId)->with("success", "Create stock success");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
