<?php

namespace App\Http\Controllers;

use App\Models\pkgAtasan;
use App\Models\Atasan;
use Illuminate\Http\Request;

class PkgAtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkgAtasan = pkgAtasan::with('atasan')->latest()->get();
        $atasan= Atasan::all();
        return view('admin.pkgAtasan.index', compact('pkgAtasan' ,'atasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pkgAtasan= pkgAtasan::all();
        $atasan= Atasan::all();
        return view('admin.pkgAtasan.create', compact('pkgAtasan','atasan'));
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

        $pkgAtasan = new pkgAtasan();
        $pkgAtasan->id_kompetensi = $request->id_kompetensi;
        $pkgAtasan->pertanyaan = $request->pertanyaan;
        $pkgAtasan->save();
        return redirect()->route('pkgAtasan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pkgAtasan  $pkgAtasan
     * @return \Illuminate\Http\Response
     */
    public function show(pkgAtasan $pkgAtasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pkgAtasan  $pkgAtasan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pkgAtasan = pkgAtasan::findOrFail($id);
        $atasan = Atasan::all();
        return view('admin.pkgAtasan.edit', compact('pkgAtasan', 'atasan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pkgAtasan  $pkgAtasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'id_kompetensi' => 'required|min:5',
        //     'pertanyaan' => 'required',

        // ]);

        $pkgAtasan = pkgAtasan::findOrFail($id);
        $pkgAtasan->id_kompetensi = $request->id_kompetensi;
        $pkgAtasan->pertanyaan = $request->pertanyaan;
        $pkgAtasan->save();
        return redirect()->route('pkgAtasan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pkgAtasan  $pkgAtasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkgAtasan = pkgAtasan::findOrFail($id);
        $pkgAtasan->delete();
        return redirect()->route('pkgAtasan.index');
    }

}

