<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriSepatuController extends Controller
{
    function show(Kategori $kategori)
    {
        return view('Kategori.detail', [
            'title' => $kategori->k_kategori,
            'detail' => $kategori->sepatu,
        ]);
    }
}
