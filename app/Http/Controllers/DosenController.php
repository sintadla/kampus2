<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'admin'){
            return redirect()->route ('jurusan.index')->with('access_denied','Anda tidak bisa mengakses halaman tabel dosen.');
        }

        $dosen = Dosen::all();
        return view('dosen.index', ['dosen' => $dosen]);
    }

    public function create()
    {
        return view('dosen.create', [
            'jurusan' => jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required|string',
            // 'jurusan_id' => 'required',
        ]);
        $validated['jurusan_id'] = $request->input('jurusan_id');

        $dosen = new Dosen($validated);
        $dosen->save();

        Dosen::create($validated);

        return redirect()->route('dosen.index')->with('berhasil', "$request->nama_dosen Berhasil Ditambahkan");
        // return redirect('/dosen')->with('berhasil', "$request->nama_dosen Berhasil ditambahkan");
        // Dosen::create($validated);
        // return redirect()->route('dosen.index')->with('berhasil', "$request->nama_dosen Berhasil Ditambahkan!");

        // return redirect()->route('dosen.index');
    }

    public function edit(Dosen $dosen)
    {
        $jurusan = jurusan::all();

        return view('dosen.edit', compact('dosen', 'jurusan'));
        // return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'jurusan_id' => 'required',
            Rule::exists('jurusan','id'),
        ]);

        DB::table('dosen')->where('id', $dosen->id)->update([
            'nama_dosen' => $request->nama_dosen,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_telepon' => $request->nomor_telepon,
            'jurusan_id' => $request->jurusan_id,

        ]);
        return redirect()->route('dosen.index')->with('berhasil', $dosen->nama_dosen . "Berhasil diubah!");
        // $dosen->update($validated);
 // return redirect()->route('dosen.index')->with('berhasil', "$request->nama_dosen Berhasil diubah!");
    }


    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('berhasil', "$dosen->nama_dosen Berhasil dihapus!");
    }

}
