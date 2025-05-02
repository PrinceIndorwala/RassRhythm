<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Video;

class MediaController extends Controller
{
    public function showMedia()
    {
        $galleries = Gallery::all();
        $videos = Video::all();
        return view('admin.media', compact('galleries', 'videos'));
    }
    
    
}
