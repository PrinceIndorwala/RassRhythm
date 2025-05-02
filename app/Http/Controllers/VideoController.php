<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Gallery;  // Assuming you also have an Image or Gallery model
use App\Models\Enrollment;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    // Show Video Upload Form (admin panel)
    public function showUploadForm()
    {
        return view('admin.videos');  // Form view to upload video
    }

    // Store Uploaded Video
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'video' => 'required|mimes:mp4,mkv,avi,webm|max:50000',
            'category' => 'required|string',
            'description' => 'required|string',
            'uploadDate' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/videos'), $filename);

            // Store video data in the database
            $video = new Video();
            $video->video_path = 'uploads/videos/' . $filename;
            $video->category = $request->category;
            $video->description = $request->description;
            $video->uploadDate = $request->uploadDate;
            $video->save();

            return redirect()->back()->with('success', 'Video uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload video. Please try again.');
    }

   
    public function index()
    {
        $videos = Video::all();  // Retrieve all videos
        $isEnrolled = Enrollment::where('user_id', auth()->id())->exists();

        return view('admin.videoList', compact('videos'));  // Display videos list
    }
    public function destroy($id)
{
    $video = Video::findOrFail($id);

    // Optional: Delete the video file from storage if needed
    if (\File::exists(public_path($video->video_path))) {
        \File::delete(public_path($video->video_path));
    }

    $video->delete();

    return redirect()->back()->with('success', 'Video deleted successfully.');
}

public function publicShow($id)
{
    $video = Video::findOrFail($id);
    return view('video-detail', compact('video'));
}

    // Optionally, you can use a method to display images as well in gallery (if you're using a Gallery model for images)
   
        public function showGalleryItems()
    {
        $galleryItems = Gallery::all(); 
        $videos = Video::all();
        $isEnrolled = Enrollment::where('user_id', auth()->id())->exists();
        return view('gallery', compact('galleryItems','videos','isEnrolled')); 
    }

     public function show($id)
{
    $video = Video::findOrFail($id);
    return view('admin.videos.show', compact('video'));
}
}