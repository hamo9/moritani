<?php
namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index() {

        $posts = Post::orderBy('created_at', 'desc')->limit(500)->get();

        return response()->view('Sitemap', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
      }
}
