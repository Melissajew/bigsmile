<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($post_id){
        return view('photos.create')->with('post_id', $post_id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);

        // Handle File Upload
        //Get filename with the extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('photo')->getClientOriginalExtension();
        //Create new filename
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('post_id'), $fileNameToStore);
        //Upload Photo
        $photo = new Photo;
        $photo->post_id = $request->input('post_id');
        $photo->title = $request->input('title');
        $photo->body = $request->input('body');
        $photo->size = $request->file('photo')->getClientSize();
        // $photo->user_id = auth()->user()->id;
        $photo->photo = $fileNameToStore;
        
        $photo->save();

        return redirect('/posts/'.$request->input('post_id'))->with('success', 'Photo Uploaded');
    }

    public function show($id){
      $photo = Photo::find($id);
      return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id){
      $photo = Photo::find($id);

      if(Storage::delete('public/photos/'.$photo->post_id.'/'.$photo->photo)){
        $photo->delete();

        return redirect('/')->with('success', 'Photo Deleted');
      }
    }
}
