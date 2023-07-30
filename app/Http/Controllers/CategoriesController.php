<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.categories');
    }

    public function getCategories()
    {
        $category = Categories::all();
        return response()->json(['data' => $category], 200);
    }

    public function store( Request $request)
    {
        $category = new Categories();
        $category->category = $request->category;
        $category->save();

        return response()->json(['message' => 'Data Ukuran Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Kategori Berhasil Dihapus!'], 200);
    }
}
