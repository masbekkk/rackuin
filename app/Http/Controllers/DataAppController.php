<?php

namespace App\Http\Controllers;

use App\Models\DataApp;
use Illuminate\Http\Request;

class DataAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DataApp::first();
        return view('admin.data-app', ['data' => $data]);
    }

    public function getSize()
    {
        $size = DataApp::all();
        return response()->json(['data' => $size], 200);
    }

    public function store( Request $request)
    {
        $dataApp = [
            'about_us' => $request->about_us,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];

        DataApp::updateOrCreate(['id' => 1], $dataApp);

        return response()->json(['message' => 'Data Identitas Web Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        DataApp::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Identitas Web Berhasil Dihapus!'], 200);
    }
}
