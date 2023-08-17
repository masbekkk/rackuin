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

    public function store(Request $request)
    {
        $dataApp = DataApp::first();
        // dd($dataApp);
        if (!empty($dataApp)) {

            $dataApp->about_us = $request->about_us;
            $dataApp->visi = $request->visi;
            $dataApp->misi = $request->misi;
            $dataApp->company_name = $request->company_name;
            $image_about_us = $request->file('image_about_us');
            if (!empty($image_about_us)) {
                $image_about_usName = time() . '.' . $image_about_us->extension();
                $image_about_us->move(public_path('assets/image_about_us'), $image_about_usName);
                $dataApp->image = 'assets/image_about_us/' . $image_about_usName;
            }

            $logo = $request->file('logo');
            if (!empty($logo)) {
                $logoName = time() . '.' . $logo->extension();
                $logo->move(public_path('assets/logo'), $logoName);
                $dataApp->logo = 'assets/logo/' . $logoName;
            }

            $fileKatalog = $request->file('file_katalog');
            if (!empty($fileKatalog)) {
                $fileKatalogName = time() . '.' . $fileKatalog->extension();
                $fileKatalog->move(public_path('assets/fileKatalog'), $fileKatalogName);
                $$dataApp->file_katalog = 'assets/fileKatalog/' . $fileKatalogName;
            }

            $dataApp->link_ig = $request->link_ig;
            $dataApp->link_wa = $request->link_wa;
            $dataApp->link_fb = $request->link_fb;
        } else {

            $dataApp = new DataApp();

            $dataApp->about_us = $request->about_us;
            $dataApp->visi = $request->visi;
            $dataApp->misi = $request->misi;
            $dataApp->company_name = $request->company_name;
            $image_about_us = $request->file('image_about_us');
            if (!empty($image_about_us)) {
                $image_about_usName = time() . '.' . $image_about_us->extension();
                $image_about_us->move(public_path('assets/image_about_us'), $image_about_usName);
                $dataApp->image = 'assets/image_about_us/' . $image_about_usName;
            }

            $logo = $request->file('logo');
            if (!empty($logo)) {
                $logoName = time() . '.' . $logo->extension();
                $logo->move(public_path('assets/logo'), $logoName);
                $dataApp->logo = 'assets/logo/' . $logoName;
            }

            $fileKatalog = $request->file('file_katalog');
            if (!empty($fileKatalog)) {
                $fileKatalogName = time() . '.' . $fileKatalog->extension();
                $fileKatalog->move(public_path('assets/fileKatalog'), $fileKatalogName);
                $dataApp->file_katalog = 'assets/fileKatalog/' . $fileKatalogName;
            }

            $dataApp->link_ig = $request->link_ig;
            $dataApp->link_wa = $request->link_wa;
            $dataApp->link_fb = $request->link_fb;
        }
       


        
        if ($dataApp->save())
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
