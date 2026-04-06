<?php

namespace App\Http\Controllers;
use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $jurusan = Jurusan::all();
       return view('admin.jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusan.create', compact('jurusan'));
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
            'jurusan'         => 'required|string',
            'tentang_jurusan' => 'required',
        ]);

        $jurusan                    = new Jurusan();
        $jurusan->jurusan           = $request->jurusan;
        $jurusan->foto              = $request->foto;
        $jurusan->tentang_jurusan   = $request->tentang_jurusan;

    if ($request->hasFile('foto')) {
        $img  = $request->file('foto');
        $name = rand(1000, 9999) . $img->getClientOriginalName();
        $img->move('storage/jurusan', $name);
        $jurusan->foto = $name;
    }


        $jurusan->save();

        return redirect()->route('jurusan.index')->with('success', 'jurusan berhasil ditambahkan.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
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
            'jurusan'         => 'required|string',
            'tentang_jurusan' => 'required',
        ]);

        $jurusan                    = new Jurusan();
        $jurusan->jurusan           = $request->jurusan;
        $jurusan->foto              = $request->foto;
        $jurusan->tentang_jurusan   = $request->tentang_jurusan;

    if ($request->hasFile('foto')) {
        $img  = $request->file('foto');
        $name = rand(1000, 9999) . $img->getClientOriginalName();
        $img->move('storage/jurusan', $name);
        $jurusan->foto = $name;
    }


        $jurusan->save();

        return redirect()->route('jurusan.index')->with('success', 'jurusan berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
