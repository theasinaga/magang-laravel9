<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagangController extends Controller
{
    public function index()
    {
        //get posts
        $magangs = Magang::latest()->paginate(5);

        //render view with posts
        return view('magangs.index', compact('magangs'));
    }

    public function create()
    {
        return view('magangs.create');
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'   => 'required|min:1',
            'alamat' => 'required|min:1',
            'asal_instansi' => 'required|min:1',
            'semester' => 'required|min:1'
        ]);

        //create post
        Magang::create([
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
            'asal_instansi'   => $request->asal_instansi,
            'semester'   => $request->semester
        ]);

        //redirect to index
        return redirect()->route('magangs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Magang $magang)
    {
        return view('magangs.edit', compact('magang'));
    }
    
    public function update(Request $request, Magang $magang)
    {
        //validate form
        $this->validate($request, [
            'nama'   => 'required|min:1',
            'alamat' => 'required|min:1',
            'asal_instansi' => 'required|min:1',
            'semester' => 'required|min:1'
        ]);

        //redirect to index
        return redirect()->route('magangs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(Magang $magang)
    {
        //delete post
        $magang->delete();

        //redirect to index
        return redirect()->route('magangs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
