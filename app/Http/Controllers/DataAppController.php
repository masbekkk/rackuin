<?php

namespace App\Http\Controllers;

use App\Models\DataApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('showAboutUs');
    }

    public function showAboutUs()
    {
        $data = DataApp::first();
        return view('frontend.tentang', ['data' => $data]);
    }

    public function index()
    {
        $data = DataApp::first();
        return view('admin.data-app', ['data' => $data]);
    }

    public function store( Request $request)
    {
        $image = "";
        $image_about_us = $request->file('image_about_us');
        if (!empty($image_about_us)) {
            $image_about_usName = time() . '.' . $image_about_us->extension();
            $image_about_us->move(public_path('assets/image_about_us'), $image_about_usName);
            $image = 'assets/image_about_us/' . $image_about_usName;
        }

        $dataApp = [
            'about_us' => $request->about_us,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' => $image,
        ];

        $updated = DataApp::updateOrCreate(['id' => 1], $dataApp);
        if($updated)
        return redirect()->route('identitas-app.index')->with('success', 'Data Identitas Berhasil Ditambahkan!');
        else return redirect()->route('identitas-app.index')->with('errors', $updated->getErrors());

        // return response()->json(['message' => 'Data Identitas Web Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        DataApp::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Identitas Web Berhasil Dihapus!'], 200);
    }
}
