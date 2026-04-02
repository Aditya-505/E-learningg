<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mapel = Mapel::all();
        return view('admin.mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
        'nama_mapel' => 'required|string|max:100',
    ]);

    $lastRecord = Mapel::latest('id')->first();
    $lastId = $lastRecord ? $lastRecord->id : 0;
    $kode_mapel = 'MPL-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

    $mapel = new Mapel();
    $mapel->kode_mapel = $kode_mapel; 
    $mapel->nama_mapel = $request->nama_mapel;
    $mapel->save();

    return redirect()->route('mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::findOrfail($id);
        return view('admin.mapel.edit',compact('mapel'));
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
        $request->validate([
            'nama_mapel' => 'required|string|max:100',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
