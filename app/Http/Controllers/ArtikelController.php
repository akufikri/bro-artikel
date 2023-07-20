<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function artikel()
    {   $data = Artikel::all();
        return view('artikel_end', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'judul' => 'required',
            'foto' => 'nullable',
            'penulis' => 'required|min:2|max:100',
            'deskripsi' => 'required',
        ]);
         
        $data = Artikel::create($validate);
       if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoBackend/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
       }

        return redirect('artikel_end')->with('success', 'Data success di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Artikel::find($id);

        return view('update.edit_artikel_end', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = Artikel::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoBackend/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
       }


        return redirect('artikel_end')->with('success', 'Data success di update');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Artikel::findorfail($id);

        $data->delete($id);

        return back();
    }
}