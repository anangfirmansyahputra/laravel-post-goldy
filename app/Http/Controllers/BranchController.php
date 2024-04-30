<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::paginate(10);
        return view('pages.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.branches.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        try {
            //validate the request...
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            //store the request...
            $category = new Branch();
            $category->name = $request->name;
            $category->address = $request->address;

            $category->save();

            return redirect()->route('branches.index', $id)->with('success', 'Branch created successfully');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $productId)
    {
        $branches = Branch::find($productId);

        return view("pages.branches.form", compact('branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $branchId)
    {
        try {
            //validate the request...
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            //store the request...

            $category = Branch::find($branchId);
            $category->name = $request->name;
            $category->address = $request->address;

            $category->save();

            return redirect()->route('branches.index', $id)->with('success', 'Branch updated successfully');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $branchId)
    {
        $branch = Branch::find($branchId);
        $branch->delete();

        return redirect()->route('branches.index', $id)->with('success', 'Branch deleted successfully');

    }
}
