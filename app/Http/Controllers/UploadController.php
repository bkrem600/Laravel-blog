<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function show(Upload $upload, $originalName='')
    {
        $upload = Upload::findOrFail($upload->id);
        //dd($upload);
        return response()->file(storage_path() . '/app/' . $upload->path);
    }

    public function index()
    {
        $uploads = Upload::with('user')->get();
        return view('uploads.index', ['uploads' => $uploads]);
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2|max:50',
            'content' => 'required|min:5',
            'upload' => 'required|image'
        ]);
        $upload = new Upload;
        $upload->mimeType = $request->file('upload')->getMimeType();
        $upload->originalName = $request->file('upload')->getClientOriginalName();
        $upload->path = $request->file('upload')->store('uploads');
        $upload->user_id = Auth::id();
        $upload->title = $request->title;
        $upload->content = $request->content;
        $upload->save();
        return view('uploads.create',
        ['id'=>$upload->id,
        'path'=>$upload->path,
        'originalName'=>$upload->originalName,
        'mimeType'=>$upload->mimeType,
        'title'=>$upload->title,
        'content'=>$upload->content]
    );
    }

    public function edit(Upload $upload)
    {
        return view('uploads.edit',
        ['id'=>$upload->id,
        'path'=>$upload->path,
        'originalName'=>$upload->originalName,
        'mimeType'=>$upload->mimeType,
        'user_id' => $upload->user_id]
    );
    }

    public function update(Request $request, Upload $upload)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:50',
            'content' => 'required|min:5',
            'upload' => 'required|image'
        ]);
        $upload = Upload::findOrFail($upload->id);
        $upload->title = $request->old('title');
        $upload->content = $request->old('content');
        if($request->hasFile('upload')){
            Storage::delete($upload->path);
            $upload->mimeType = $request->file('upload')->getMimeType();
            $upload->originalName = $request->file('upload')->getClientOriginalName();
            $upload->path = $request->file('upload')->store('uploads');
            $upload->user_id = Auth::id();
            $upload->title = $request->title;
            $upload->content = $request->content;
        }
        $upload->save();
        return back()->withInput(['operation'=>'upload', 'id'=>$upload->id]);
    }

    public function destroy(Upload $upload)
    {
        $upload = Upload::findOrFail($upload->id);
        Storage::delete($upload->path);
        $upload->delete();
        return back()->with(['operation' => 'deleted' , 'id' => $upload->id]);
    }

    public function file(Upload $upload, $originalName='')
    {
        $upload = Upload::findOrFail($upload->id);
        return response()->file(storage_path() . '/app/' . $upload->path);
    }

    public function showUpload(Upload $upload, $originalName = '')
    {
        $upload = Upload::findOrFail($upload->id);
        return view('uploads.show', ['upload'=>$upload]);
    }
}
