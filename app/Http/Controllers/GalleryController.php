<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    // Show Photo Upload Form (admin panel)
    public function uploadPhoto()
    {
        return view('admin.galleryy'); // Your upload form blade file
    }

    // Store Uploaded Photo
    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'description' => 'required|string',
           
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gallery'), $filename);

            // Store photo in database
            $gallery = new Gallery();
            $gallery->photo_path = 'uploads/gallery/' . $filename;
            $gallery->category = $request->category;
            $gallery->description = $request->description;
            $gallery->uploaded_at = now();
            $gallery->save();

            return redirect()->back()->with('success', 'Photo uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload photo. Please try again.');
    }
    
    //public function store(Request $request)
    // {
    //     $request->validate([
    //         'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //         'category' => 'required|string',
    //         'description' => 'required|string|max:255',
    //     ]);

    //     $filename = $request->file('photo')->store('gallery', 'public');

    //     Gallery::create([
    //         'photo_path' => $filename,
    //         'category' => $request->category,
    //         'description' => $request->description,
    //         'uploaded_at' => now(),
    //     ]);

    //     return redirect()->back()->with('success', 'Photo uploaded successfully!');
    // }

    // Show all images and videos
    public function showGallery()
    {
        $galleryItems = Gallery::all();
        $videos = Video::all();
        return view('gallery', compact('galleryItems', 'videos'));
    }
    public function destroy($id)
    {
        // Find the gallery item by ID and delete it
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        // Redirect back with a success message
        return redirect()->route('admin.media')->with('success', 'Gallery item deleted successfully.');
    }
    // List all images (admin)
    public function index()
    {
        $galleryItems = Gallery::all();
        return view('admin.galleryList', compact('galleryItems'));
    }
}
