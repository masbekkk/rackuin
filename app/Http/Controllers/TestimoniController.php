<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.testimoni');
    }

    public function getTestimonies()
    {
        $data = Testimoni::all();

        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $testimoni = new Testimoni();
        $testimoni->name = $request->name;
        $testimoni->review = $request->review;
   
        $bukti_testimoni = $request->file('bukti_testimoni');
        if (!empty($bukti_testimoni)) {
            $bukti_testimoniName = time() . '.' . $bukti_testimoni->extension();
            $bukti_testimoni->move(public_path('assets/bukti_testimoni'), $bukti_testimoniName);
            $testimoni->image = 'assets/bukti_testimoni/' . $bukti_testimoniName;
        }
        if($testimoni->save())
        return redirect()->route('testimoni.index')->with('success', 'Data Testimoni Berhasil Ditambahkan!');
        else return redirect()->route('testimoni.index')->with('errors', $testimoni->getErrors());
        // return response()->json(['message' => 'Data Produk Image Berhasil Ditambahkan!'], 200);
    }

    public function update($id, Request $request)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->name = $request->name;
        $testimoni->review = $request->review;
   
        $bukti_testimoni = $request->file('bukti_testimoni');
        if (!empty($bukti_testimoni)) {
            $bukti_testimoniName = time() . '.' . $bukti_testimoni->extension();
            $bukti_testimoni->move(public_path('assets/bukti_testimoni'), $bukti_testimoniName);
            $oldTestimoniImage = $testimoni->image;
            if (File::exists(public_path($oldTestimoniImage))) {
                File::delete(public_path($oldTestimoniImage));
            }
            $testimoni->image = 'assets/bukti_testimoni/' . $bukti_testimoniName;
        }
        if($testimoni->save())
        return redirect()->route('testimoni.index')->with('success', 'Data Testimoni Berhasil Ditambahkan!');
        else return redirect()->route('testimoni.index')->with('errors', $testimoni->getErrors());
        // return response()->json(['message' => 'Data Produk Image Berhasil Ditambahkan!'], 200);
    }

    public function destroy($id)
    {
        $data = Testimoni::findOrFail($id);

        if (File::exists(public_path($data->image))) {
            File::delete(public_path($data->image));
        }
        $data->delete();
        return response()->json(['message' => 'Data Testimoni Berhasil Dihapus!'], 200);
    }
}
