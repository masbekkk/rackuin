<?php

namespace App\Http\Controllers;

use App\Models\DataApp;
use App\Models\UserDownloadedCatalogue;
use Illuminate\Http\Request;

class UserDownloadedCatalogueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('download');
    }

    public function index()
    {
        return view('admin.user-downloaded-catalog');
    }

    public function showData()
    {
        $data = UserDownloadedCatalogue::all();
        return response()->json(['data' => $data], 200);
    }

    public function download(Request $request)
    {

        $request->validate([
            'name' => 'required| string',
            'email' => 'required| string',
            'phone_number' => 'required| string'
        ]);
        $dataApp = DataApp::first('file_katalog');
        // dd($dataApp);
        $downloadCatalog = new UserDownloadedCatalogue();
        $downloadCatalog->name = $request->name;
        $downloadCatalog->email = $request->email;
        $downloadCatalog->phone_number = $request->phone_number;
        if($downloadCatalog->save()) {
            if($dataApp->file_katalog != null )
            return response()->download($dataApp->file_katalog);
            else return response()->download('assets/contoh.pdf');
        }else {
            return redirect()->route('homepage')->with('errors', $downloadCatalog->getErrors());
        }
        
    }

}
