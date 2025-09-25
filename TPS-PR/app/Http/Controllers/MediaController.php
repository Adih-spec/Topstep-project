<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(12);
        return view('components.CMS.media.index', compact('media'));
    }

    public function create()
    {
        return view('media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:4096',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        Media::create([
            'file_name' => $request->file('file')->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $request->file('file')->getMimeType(),
            'file_size' => $request->file('file')->getSize(),
        ]);

        return redirect()->route('media.index')->with('success', 'File uploaded!');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('media.index')->with('success', 'File moved to recycle bin!');
    }
}
