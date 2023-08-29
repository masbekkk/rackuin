<?php

namespace App\Http\Controllers;

use App\Models\DataApp;
use App\Models\UserDownloadedCatalogue;
use Illuminate\Http\Request;

class UserDownloadedCatalogueController extends Controller
{
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
        }
        
    }

}
