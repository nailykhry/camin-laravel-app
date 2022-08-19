<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;

class SepatuController extends Controller
{
    public function index()
    {
        return view('Sepatu.index', [
            "title" => "Daftar Sepatu",
            "sepatu" => Sepatu::latest()->filter(request(['search']))->paginate(15)->withQueryString(),
        ]);
    }
    public function create()
    {
        return view('Sepatu.create', [
            "title" => "Tambah"
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            's_foto' => 'image|file|required',
            's_nama' => 'required',
            's_hargabeli' => 'required',
            's_hargajual' => 'required',
            's_kategori' => 'required',
            's_deskripsi' => 'required',
            's_bahan' => 'required',
        ]);

        if($request->file('s_foto'))
        {
            $validatedData['s_foto'] = $request->file('s_foto')->store('sepatu-image');
        }
        $sepatu = Sepatu::create([
            's_foto' => $validatedData['s_foto'],
            's_nama' => $request->s_nama,
            's_hargabeli' => $request->s_hargabeli,
            's_hargajual' => $request->s_hargajual,
            's_kategori' => $request->s_kategori,
            's_deskripsi' => $request->s_deskripsi,
            's_bahan' => $request->s_bahan,
        ]);

        if ($sepatu) {
            return redirect()
                ->route('sepatu.index')
                ->with([
                    'success' => 'Sepatu berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terdapat kesalahan, coba lagi!'
                ]);
        }
    }


    public function edit($id)
    {
        $sepatu = Sepatu::findOrFail($id);
        return view('sepatu.edit', compact('sepatu'), [
            "title" => "Edit"
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            's_foto' => 'image|file|required',
            's_nama' => 'required',
            's_hargabeli' => 'required',
            's_hargajual' => 'required',
            's_kategori' => 'required',
            's_deskripsi' => 'required',
            's_bahan' => 'required',
        ]);

        $sepatu = Sepatu::findOrFail($id);

        if($request->file('s_foto'))
        {
            $validatedData['s_foto'] = $request->file('s_foto')->store('sepatu-image');
        }
        $sepatu->update([
            's_foto' =>  $validatedData['s_foto'],
            's_nama' => $request->s_nama,
            's_hargabeli' => $request->s_hargabeli,
            's_hargajual' => $request->s_hargajual,
            's_kategori' => $request->s_kategori,
            's_deskripsi' => $request->s_deskripsi,
            's_bahan' => $request->s_bahan,
        ]);

        if ($sepatu) {
            return redirect()
                ->route('sepatu.index')
                ->with([
                    'success' => 'Sepatu berhasil diperbarui'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terdapat kesalahan, coba lagi!'
                ]);
        }
    }


    public function destroy($id)
    {
        $sepatu = Sepatu::findOrFail($id);
        $sepatu->delete();

        if ($sepatu) {
            return redirect()
                ->route('sepatu.index')
                ->with([
                    'success' => 'Berhasil menghapus data sepatu'
                ]);
        } else {
            return redirect()
                ->route('sepatu.index')
                ->with([
                    'error' => 'Terdapat kesalahan, coba lagi!'
                ]);
        }
    }
}
