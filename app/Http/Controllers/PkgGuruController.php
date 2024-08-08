<?php

namespace App\Http\Controllers;

use App\Models\pkgGuru;
use App\Models\Guru;
use Illuminate\Http\Request;

class PkgGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkgGuru = pkgGuru::with('guru')->latest()->get();
        $guru= Guru::all();
        return view('admin.pkgGuru.index', compact('pkgGuru' ,'guru'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pkgGuru= pkgGuru::all();
        $guru= Guru::all();
        return view('admin.pkgGuru.create', compact('pkgGuru','guru'));
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

        $pkgGuru = new pkgGuru();
        $pkgGuru->id_kompetensi = $request->id_kompetensi;
        $pkgGuru->pertanyaan = $request->pertanyaan;
        $pkgGuru->save();
        return redirect()->route('pkgGuru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pkgGuru  $pkgGuru
     * @return \Illuminate\Http\Response
     */
    public function show(pkgGuru $pkgGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pkgGuru  $pkgGuru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pkgGuru = pkgGuru::findOrFail($id);
        $guru = Guru::all();
        return view('admin.pkgGuru.edit', compact('pkgGuru', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pkgGuru  $pkgGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'id_kompetensi' => 'required|min:5',
        //     'pertanyaan' => 'required',

        // ]);

        $pkgGuru = pkgGuru::findOrFail($id);
        $pkgGuru->id_kompetensi = $request->id_kompetensi;
        $pkgGuru->pertanyaan = $request->pertanyaan;
        $pkgGuru->save();
        return redirect()->route('pkgGuru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pkgGuru  $pkgGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkgGuru = pkgGuru::findOrFail($id);
        $pkgGuru->delete();
        return redirect()->route('pkgGuru.index');
    }
}
