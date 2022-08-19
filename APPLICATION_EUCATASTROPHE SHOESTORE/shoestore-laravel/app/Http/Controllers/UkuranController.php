<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    function show(Sepatu $sepatu)
    {
        return view('Ukuran.index', [
            'title' => $sepatu->s_nama,
            'ukuran' => $sepatu->ukuran,
            'sepatu' => $sepatu,
            'sPaginate' => Sepatu::latest()->filter(request(['search']))->paginate(12)->withQueryString(),
        ]);
    }
    
    public function create(Sepatu $sepatu)
    {
        return view('Ukuran.create', [
            "title" => "Tambah Ukuran",
            "sepatu" => $sepatu,
        ]);
    }


    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'u_ukuran' => 'required',
            'u_deksripsi' => 'required',
            'u_stock' => 'required',
        ]);

        $ukuran = Ukuran::create([
            'sepatu_id' => $id,
            'u_ukuran' => $request->u_ukuran,
            'u_deksripsi' => $request->u_deksripsi,
            'u_stock' => $request->u_stock,

        ]);

        if ($ukuran) {
            return redirect()
                ->route('Ukuran.index')
                ->with([
                    'success' => 'Ukuran berhasil ditambahkan'
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
}
