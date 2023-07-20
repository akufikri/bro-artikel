<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class FrontController extends Controller
{
   public function home()
   {  $data = Artikel::paginate(3);
    return view('frontend.home', compact('data'));
   }

//    artikel
   public function artikel(){    
   $artikel = Artikel::all();
    return view('frontend.artikel', compact('artikel'));
   }
   public function preveiew($id){
    $artikel = Artikel::find($id);
    return view('frontend.artikel_prev', compact('artikel'));
   }
   
   // // About
   // public function tentang_kami(){
   //    return view('frontend.tentang_kami');
   // }
   
   // Insert artikel Front
   public function insert_artikel(){
      $data = Artikel::all();
      return view('frontend.insert_artikel', compact('data'));
   }
   public function process_insert_artikel(Request $request){
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

        return redirect()->back();
   }
   public function delete_editor_artikel($id){
      $data = Artikel::findorfail($id);
      $data->delete($id);

      return back();
   }

   
}