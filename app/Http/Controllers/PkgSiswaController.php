<?php

namespace App\Http\Controllers;

use App\Models\pkgSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PkgSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkgSiswa = pkgSiswa::with('siswa')->latest()->get();
        $siswa= Siswa::all();
        return view('admin.pkgSiswa.index', compact('pkgSiswa' ,'siswa'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pkgSiswa= pkgSiswa::all();
        $siswa= Siswa::all();
        return view('admin.pkgSiswa.create', compact('pkgSiswa','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'id_kompetensi' => 'required|min:5',
        //     'pertanyaan' => 'required',
        // ]);

        $pkgSiswa = new pkgSiswa();
        $pkgSiswa->id_kompetensi = $request->id_kompetensi;
        $pkgSiswa->pertanyaan = $request->pertanyaan;
        $pkgSiswa->save();
        return redirect()->route('pkgSiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pkgSiswa  $pkgSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(pkgSiswa $pkgSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pkgSiswa  $pkgSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pkgSiswa = pkgSiswa::findOrFail($id);
        $siswa = Siswa::all();
        return view('admin.pkgSiswa.edit', compact('pkgSiswa', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pkgSiswa  $pkgSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'id_kompetensi' => 'required|min:5',
        //     'pertanyaan' => 'required',

        // ]);

        $pkgSiswa = pkgSiswa::findOrFail($id);
        $pkgSiswa->id_kompetensi = $request->id_kompetensi;
        $pkgSiswa->pertanyaan = $request->pertanyaan;
        $pkgSiswa->save();
        return redirect()->route('pkgSiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pkgGuru  $pkgGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkgSiswa = pkgSiswa::findOrFail($id);
        $pkgSiswa->delete();
        return redirect()->route('pkgSiswa.index');
    }
}
