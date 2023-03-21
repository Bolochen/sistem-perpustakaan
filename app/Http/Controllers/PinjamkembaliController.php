<?php

namespace App\Http\Controllers;

use App\Models\Pinjamkembali;
use App\Models\Mahasiswa;
use App\Models\Buku;
use App\Http\Requests\StorePinjamkembaliRequest;
use App\Http\Requests\UpdatePinjamkembaliRequest;

class PinjamkembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pinjam.index',[
            'pinjamkembalis' => Pinjamkembali::with(['mahasiswa', 'buku'])->orderBy('tgl_kembali', 'ASC')->orderBy('tgl_tempo', 'ASC')->paginate('20')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pinjam.create',[
            'mahasiswas' => Mahasiswa::orderBy('nim', 'ASC')->get(),
            'bukus' => Buku::where('status', 'Tersedia')->orderBy('title', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePinjamkembaliRequest $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'buku_id' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_tempo' => 'required|date'
        ]);

        // $validatedData['tgl_pinjam'] = now();
        // $validatedData['tgl_tempo'] = strtotime("+1 week");

        Pinjamkembali::create($validatedData);

        Buku::where('id', $request->buku_id)->update(['status' => 'Dipinjam']);

        return redirect('/dashboard/pinjamkembali')->with('success', 'Berhasil disimpan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjamkembali $pinjamkembali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjamkembali $pinjamkembali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePinjamkembaliRequest $request, Pinjamkembali $pinjamkembali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjamkembali $pinjamkembali)
    {
        Pinjamkembali::destroy($pinjamkembali->id);

        return redirect('/dashboard/pinjamkembali')->with('success', 'Pinjam kembali has been deleted');
    }
}
