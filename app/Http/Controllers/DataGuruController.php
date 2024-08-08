<?php

namespace App\Http\Controllers;

use App\Models\dataGuru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGuru = dataGuru::latest()->get();
        $mapel= Mapel::all();
        return view('admin.dataGuru.index', compact('dataGuru', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataGuru= dataGuru::all();
        $mapel= Mapel::all();
        return view('admin.dataGuru.create', compact('dataGuru','mapel'));
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'nip' => 'required',
            'id_mapel' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5000',

        ]);

        $dataGuru = new dataGuru();
        $dataGuru->nama = $request->nama;
        $dataGuru->jenis_kelamin = $request->jenis_kelamin;
        $dataGuru->nip = $request->nip;
        $dataGuru->id_mapel = $request->id_mapel;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/data_gurus', $image->hashName());
        $dataGuru->image = $image->hashName();
        $dataGuru->save();
        return redirect()->route('dataGuru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function show(dataGuru $dataGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::all();
        $dataGuru = dataGuru::findOrFail($id);
        return view('admin.dataGuru.edit', compact('dataGuru', 'mapel'));

        $dataGuru->save();
        return redirect()->route('dataGuru.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required|min:5',
            'nip' => 'required',
            'id_mapel' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg|max:5000',

        ]);

        $dataGuru = dataGuru::findOrFail($id);
        $dataGuru->nama = $request->nama;
        $dataGuru->jenis_kelamin = $request->jenis_kelamin;
        $dataGuru->nip = $request->nip;
        $dataGuru->id_mapel = $request->id_mapel;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/data_gurus', $image->hashName());
        $dataGuru->image = $image->hashName();
        $dataGuru->save();
        return redirect()->route('dataGuru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $dataGuru = dataGuru::findOrFail($id);
        Storage::delete('public/data_gurus/' . $dataGuru->image);
        $dataGuru->delete();
        return redirect()->route('dataGuru.index');
    }
}
