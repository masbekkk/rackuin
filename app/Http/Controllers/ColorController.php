<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.color');
    }

    public function getColor()
    {
        $color = Color::all();

        return response()->json(['data' => $color], 200);
    }

    public function store(Request $request)
    {
        $color = new Color();
        $color->hex_color = $request->hex_color;
        $color->color = $request->color;
        $color->save();

        return response()->json(['message' => 'Data Warna Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        Color::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Warna Berhasil Dihapus!'], 200);
    }
}
