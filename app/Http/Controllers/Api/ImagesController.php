<?php

namespace App\Http\Controllers\Api;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ImagesController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->images()->paginate(10);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
           'image' => [
               'image',
               'mimes:jpeg,bmp,png,gif',
               'max:'. config('img.max_file_size')
           ]
        ]);
        $file = $request->file('image');

        $path = $file->store('public/'. floor($request->user()->Id / 1000));

        $image = new Image;
        $image->user_id = $request->user()->id;
        $image->hash = Str::random(16) . '.' . $file->getClientOriginalExtension();
        $image->file = $path;
        $image->save();

        return json_encode(['filename' => $image->hash]);
    }

}
