<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atasan = Atasan::all();
        return view('admin.atasan.index', compact('atasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atasan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kompetensi' => 'required',

        ]);

        $atasan = new Atasan();
        $atasan->nama_kompetensi = $request->nama_kompetensi;
        $atasan->save();
        return redirect()->route('atasan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kompetensi_atasan  $kompetensi_atasan
     * @return \Illuminate\Http\Response
     */
    public function show(Kompetensi_atasan $kompetensi_atasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atasan = Atasan::findOrFail($id);
        return view('admin.atasan.edit', compact('atasan'));

        $atasan->save();
        return redirect()->route('atasan.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kompetensi' => 'required',

        ]);

        $atasan = Atasan::FindOrFail($id);
        $atasan->nama_kompetensi = $request->nama_kompetensi;
        $atasan->save();
        return redirect()->route('atasan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atasan =Atasan::findOrFail($id);
        $atasan->delete();
        return redirect()->route('atasan.index');
    }
}
