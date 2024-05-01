<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BundleController extends Controller
{
    public function index(Request $request): View
    {
        $bundles = Bundle::when($request->input('name'), function ($query, $name) {
            $query->where("name", "like", "%" . $name . "%");
        })->paginate(10);

        return view('pages.bundles.index', compact('bundles'));
    }

    public function create(): View
    {
        return view('pages.bundles.form');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                "description" => 'required',
                "discount_percent" => 'required|numeric|max:100',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $bundle = new Bundle();
            $bundle->fill($request->only([
                'name',
                "description",
                "discount_percent"
            ]));

            $bundle->save();

            return redirect()->route('bundles.index')->with('success', 'Bundle created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $id): View
    {
        $bundle = Bundle::findOrFail($id);
        return view('pages.bundles.form', compact('bundle'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                "description" => 'required',
                "discount_percent" => 'required|numeric|max:100',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $bundle = Bundle::findOrFail($id);
            $bundle->fill($request->only([
                'name',
                "description",
                "discount_percent"
            ]));

            $bundle->save();

            return redirect()->route('bundles.index')->with('success', 'Bundle created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $bundle = Bundle::findOrFail($id);
            $bundle->delete();

            return redirect()->route('bundles.index')->with('success', 'Bundle deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
