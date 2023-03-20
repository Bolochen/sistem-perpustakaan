<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mahasiswa.index',[
            'mahasiswas' => Mahasiswa::orderBy('nim', 'ASC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('foto-mahasiswa');
        }

        Mahasiswa::create($validatedData);

        return redirect('/dashboard/mahasiswa')->with('success', 'Mahasiswa has been inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.edit',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('foto-mahasiswa');
        }

        Mahasiswa::where('id', $mahasiswa->id)->update($validatedData);

        return redirect('/dashboard/mahasiswa')->with('success', 'Mahasiswa has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if($mahasiswa->image) {
            Storage::delete($mahasiswa->image);
        }
        
        Mahasiswa::destroy($mahasiswa->id);

        return redirect('/dashboard/mahasiswa')->with('success', 'Mahasiswa has been deleted');
    }
}
