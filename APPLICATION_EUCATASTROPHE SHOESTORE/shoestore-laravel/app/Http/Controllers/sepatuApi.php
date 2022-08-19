<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class sepatuApi extends Controller
{
    public function index()
    {
        $sepatu = Sepatu::all();
        $response = [
            'message' => 'Data Sepatu',
            'data' => $sepatu,
        ];
        return response()->json($response, HttpFoundationResponse::HTTP_OK);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            's_foto' => ['required'],
            's_nama' => ['required'],
            's_hargajual' => ['required'],
            's_hargabeli' => ['required'],
            's_kategori' => ['required'],
            's_deskripsi' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                HttpFoundationResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $sepatu = Sepatu::create($request->all());

            $response = [
                'message' => 'Berhasil disimpan',
                'data' => $sepatu,
            ];
            return response()->json($response, HttpFoundationResponse::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Gagal menyimpan" . $e->errorInfo,
            ]);
        }
    }

    public function show($id_sepatu)
    {
        $sepatu = Sepatu::where('id', $id_sepatu)->firstOrFail();
        if (is_null($sepatu)) {
            return $this->sendError('Sepatu tidak ditemukan');
        }
        return response()->json([
            'success' => true,
            'message' => 'Data sepatu ditemukan',
            'data' => $sepatu,
        ]);
    }

    public function update(Request $request, $id_sepatu)
    {
        $sepatu = Sepatu::find($id_sepatu);
        $sepatu->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Data Sepatu telah diubah.",
            "data" => $sepatu,
        ]);
    }

    public function destroy($id_sepatu)
    {
        $deletedRows = Sepatu::where('id', $id_sepatu)->delete();
        return response()->json([
            "success" => true,
            "message" => "Data Sepatu berhasil dihapus.",
            "data" => $deletedRows,
        ]);
    }
}
