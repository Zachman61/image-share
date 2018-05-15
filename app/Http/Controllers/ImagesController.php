<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Storage;

class ImagesController extends Controller
{
    public function index(Request $request)
    {
        return view('images')->with('images', $request->user()->images()->orderBy('created_at', 'desc')->paginate(15));
    }

    public function show(Image $image)
    {
        return \Image::make(Storage::get($image->file))->response();
    }

    public function delete(Request $request, Image $image)
    {
        if ($image->user->id != $request->user()->id)
        {
            abort(403);
        }

        if (Storage::delete($image->file))
        {
            $image->delete();
           return redirect(route('images'));
        }

        abort(500);
    }
}
