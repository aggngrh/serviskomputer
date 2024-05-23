<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(): View
    {
        $dataPegawai = Pegawai::latest()->paginate(10);
        return view('pegawai.index', compact('dataPegawai'));
    }

    public function create(): View
    {
        return view('pegawai.create');
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'nama_pegawai'   => 'required',
            'alamat'          => 'required',
            'jenis_kelamin'   => 'required',
            'jabatan'       => 'required',
            'status'        => 'required'
        ]);

        Pegawai::create([
            'nama_pegawai'    => $request->nama_pegawai,
            'alamat'          => $request->alamat,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'jabatan'       => $request->jabatan,
            'status'        => $request->status,
        ]);
        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id_pegawai): View
    {
        $dataPegawai = Pegawai::findOrFail($id_pegawai);
        return view('pegawai.edit', compact('dataPegawai'));
    }

    public function show($id_pegawai): View
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);

        return view('pegawai.show', compact('pegawai'));
    }
    public function update(Request $request, $id_pegawai): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_pegawai'   => 'required',
            'alamat'          => 'required',
            'jenis_kelamin'   => 'required',
            'jabatan'       => 'required',
            'status'        => 'required'
        ]);

        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->update([
            'nama_pegawai'    => $request->nama_pegawai,
            'alamat'          => $request->alamat,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'jabatan'       => $request->jabatan,
            'status'        => $request->status,
        ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_pegawai): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

