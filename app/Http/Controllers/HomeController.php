<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::remove()->get()->count();
        $posts      = Post::remove()->get()->count();
        $lastPost   = Post::remove()->orderByDesc('id')->first();
        $chunk_most_read = Post::remove()->orderByDesc('read_count')->first();

        // return $chunk_most_read;
        return view('admin.home',compact('categories','posts','lastPost','chunk_most_read'));
    }
}
