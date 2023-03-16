<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.buku.index', [
            "bukus" => Buku::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.buku.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'status' => 'required'
        ]);

        Buku::create($validatedData);

        return redirect('/dashboard/buku')->with('success', 'New Book has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        Buku::destroy($buku->id);

        return redirect('/dashboard/buku')->with('sucess','Book has been deleted');
    }
}
