<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.size');
    }

    public function getSize()
    {
        $size = Size::all();
        return response()->json(['data' => $size], 200);
    }

    public function store( Request $request)
    {
        $size = new Size();
        $size->size = $request->size;
        $size->save();

        return response()->json(['message' => 'Data Ukuran Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        Size::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Ukuran Berhasil Dihapus!'], 200);
    }
}
