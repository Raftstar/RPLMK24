<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GalleryImage;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::all();
        return view('home', compact('images'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
+
        DB::table('gallery_images')->insert([
            'judul' => $request->judul,
            'image' => $imageName,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('home')->with('success', 'Image uploaded successfully.');
    }

    public function edit($id)
    {
    $image = GalleryImage::findOrFail($id);
    return view('edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'judul' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'deskripsi' => 'required',
    ]);

    $image = GalleryImage::findOrFail($id);
    $image->judul = $request->judul;
    $image->image = $request->image;
    $image->deskripsi = $request->deskripsi;
    $image->save();

    return redirect()->route('home')->with('success', 'Image updated successfully.');
    }

    public function delete($id)
    {
        GalleryImage::find($id)->delete();
        return redirect()->route('home')->with('success', 'Image deleted successfully.');
    }
}