<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JurusanController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        if($user->role !== 'operator'){
            return redirect()->route('dosen.index')->with('access_denied','Anda tidak bisa mengakses halaman tabel jurusan.');
        }

        $jurusan = jurusan::paginate(10);
        return view('jurusan.index', compact('jurusan'));

    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $user = auth()->user();
        if($user->role != 'operator'){
            return redirect()->route('jurusan.create')->with('access_denied','Anda tidak bisa mengakses halaman tabel  jurusan.');
        }

        return view('jurusan.create');

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =$request->all();
        jurusan::create($input);

        return redirect()->route('jurusan.index')->with('berhasil', "$request->fakultas Berhasil Ditambahkan");

        // return redirect('jurusan')->with('berhail', 'jurusan Addedd');
    }


    //     $validated = $request->validate([
    //         'fakultas' => 'required',
    //     ]);

    //     jurusan::create($validated);

    //     return redirect('/jurusan')->with('berhasil', "$request->jurusan Berhasil ditambahkan!");
    // }


     /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return\Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        return view('jurusan.edit')->with([
            'jurusan' => Jurusan::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fakultas' => 'required',
        ]);

        $jurusan = Jurusan::find($id);
        $jurusan->fakultas = $request->fakultas;
        $jurusan->save();
        return redirect()->route('jurusan.index')->with('berhasil', $jurusan->fakultas . "Berhasil diubah!");

        // return to_route('jurusan.index')->with('succes', 'data di tambah');
    }


    public function destroy(string $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        return back()->with('succes', 'data dihapus');

        // jurusan::destroy($id);
        // return back('jurusan')->with('flash_message', 'jurusan deleted!');
    }
}
