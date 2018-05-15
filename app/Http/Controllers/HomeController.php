<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $imageCount = $user->images()->count();
        $newImages = $user->images()->where('created_at', '>', $user->updated_at);
        $newImageCount = $newImages->count();
        return view('home')->with('imageCount', $imageCount)->with('newImageCount', $newImageCount);
    }
}
