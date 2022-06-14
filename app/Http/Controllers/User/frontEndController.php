<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use GNAHotelSolutions\Weather\Weather;
use App\Models\Ads;


class frontEndController extends Controller
{
    public function welcome()
    {

        $categories = Category::remove()->with('sub_category', 'posts')->take(10)->get();
        $lastCategory = Category::remove()->with('sub_category', 'videos')->find(11);
        // return $lastCategory;

        // NEWS POSTS
        $chunk_news = Post::where('category_id', 1)->remove()->get();
        $chunk_news = $chunk_news->chunk(6);

        // reports POSTS
        $chunk_reports = Post::where('category_id', 2)->remove()->get();
        $chunk_reports = $chunk_reports->chunk(4);

        // the press POSTS
        $press = Post::where('category_id', 3)->remove()->get();
        $chunk_press = $press->chunk(3);

        // the Figures POSTS
        $Figures = Post::where('category_id', 5)->remove()->get();
        $chunk_Figures = $Figures->chunk(3);

        // the Opinion POSTS
        $Opinion = Post::where('category_id', 4)->remove()->get();
        $chunk_Opinion = $Opinion->chunk(3);

        // sports POSTS
        $sports = Post::where('category_id', 6)->remove()->get();
        $chunk_sports = $sports->chunk(4);

        // mix POSTS
        $chunk_mix = Post::where('category_id', 7)->remove()->get();
        $chunk_mix = $chunk_mix->chunk(5);

        // Economie POSTS
        $chunk_economie = Post::where('category_id', 8)->remove()->get();
        $chunk_economie = $chunk_economie->chunk(3);

        // Society POSTS
        $chunk_Society = Post::where('category_id', 9)->remove()->get();
        $chunk_Society = $chunk_Society->chunk(3);

        // most read of week POSTS
        $date = \Carbon\Carbon::today()->subDays(7);
        $chunk_read_week = Post::remove()->orderByDesc('read_count')->where('created_at','>=',$date)->get();
        $chunk_read_week = $chunk_read_week->chunk(4);

        // most read POSTS
        $chunk_most_read = Post::remove()->orderByDesc('read_count')->get();
        $chunk_most_read = $chunk_most_read->chunk(4);

           // most vedios
        $chunk_vedios = Video::where('category_id', 11)->get();

        $chunk_vedios = $chunk_vedios->chunk(2);

        // Ads
        $ads   = Ads::all();

        // $weather = new Weather();
        // $currentWeatherInGirona = json_decode($weather->get('girona,es'));

        // return $currentWeatherInGirona;

        $LastPosts = Post::orderBy('id', 'desc')->take(5)->remove()->get();

        return view('frontEnd.welcome', compact(
            'categories',
            'chunk_reports',
            'chunk_news',
            'chunk_press',
            'chunk_Figures',
            'chunk_Figures',
            'chunk_Opinion',
            'chunk_sports',
            'chunk_mix',
            'chunk_economie',
            'chunk_Society',
            'chunk_read_week',
            'chunk_most_read',
            'LastPosts',
            'ads',
            'chunk_vedios',
            'lastCategory'
        ));
    }



    public function search(Request $request)
    {
        // return $request;
        $categories = Category::remove()->with('sub_category', 'posts')->get();

        $categories2         = Category::where('name', 'LIKE', "%{$request->search}%")->remove()->with(['posts' => function($q)
        {
            $q->remove();

        }])->first();
        $posts              = Post::where('title', 'LIKE', "%{$request->search}%")->orWhere('body', 'LIKE', "%{$request->search}%")->remove()->with('category')->get();

        if ($categories && $categories->count() > 0)
        {
            // return $categories;
            $ads                = Ads::find(1);
            $chunk_most_read    = Post::remove()->orderByDesc('read_count')->take(5)->get();
            return view('frontEnd.search',compact('categories2','ads','chunk_most_read'));

        } elseif($posts && $posts->count() > 0)
        {
            // return $posts;
            $ads                = Ads::find(1);
            $chunk_most_read    = Post::remove()->orderByDesc('read_count')->take(5)->get();
            return view('frontEnd.search',compact('posts','ads','chunk_most_read'));

        }


    }


    public function category_posts($id)
    {
        $categories         = Category::remove()->with('sub_category', 'posts')->take(10)->get();
        $lastCategory = Category::remove()->with('sub_category', 'videos')->find(11);

        $ads        = Ads::find(1);
        $category = Category::with(['posts'=>function($q)
        {
            $q->remove();

        }])->find($id);


        $chunk_most_read    = Post::remove()->orderByDesc('read_count')->take(5)->get();

        // return $chunk_most_read;
        return view('frontEnd.category_posts',compact('categories','ads','category','chunk_most_read','lastCategory'));
    }

    public function post($id)
    {
        $post = Post::remove()->with('category')->find($id);
        $lastCategory = Category::remove()->with('sub_category', 'videos')->find(11);


       if ($post && $post->count() > 0)
       {
        $categories         = Category::remove()->with('sub_category', 'posts')->take(10)->get();
        $ads                = Ads::find(1);
        $chunk_most_read    = Post::remove()->orderByDesc('read_count')->take(5)->get();
        $next_post          = Post::remove()->where('id','>',$post->id)->where('category_id',$post->category->id)->first();

        if (isset($next_post))
        {

            $other_posts        = Post::where('category_id',$post->category->id)->where('id','<>',$post->id)->where('id','<>',$next_post->id)->remove()->take(3)->get();

        }else
        {
            $next_post          = '';
            $other_posts        = Post::where('category_id',$post->category->id)->where('id','<>',$post->id)->remove()->take(3)->get();
        }
        // return $chunk_most_read;

        $read_count = $post->read_count;
        $post->update(
            [
                'read_count' => $read_count + 1
            ]);
        return view('frontEnd.post',compact('categories','ads','post','chunk_most_read','next_post','other_posts','lastCategory'));
       }


    }


    public function video($id)
    {
        $post = Video::with('category')->find($id);

       if ($post && $post->count() > 0)
       {
        $categories         = Category::remove()->with('sub_category', 'posts')->take(10)->get();
        $ads                = Ads::find(1);
        $chunk_most_read    = Post::remove()->orderByDesc('read_count')->take(5)->get();
        $lastCategory       = Category::remove()->with('sub_category', 'videos')->find(11);
        $next_post          = Post::remove()->where('id','>',$post->id)->where('category_id',$post->category->id)->first();

        if (isset($next_post))
        {

            $other_posts        = Post::where('category_id',$post->category->id)->where('id','<>',$post->id)->where('id','<>',$next_post->id)->remove()->take(3)->get();

        }else
        {
            $next_post          = '';
            $other_posts        = Video::where('category_id',$post->category->id)->where('id','<>',$post->id)->take(3)->get();
        }
        // return $chunk_most_read;


        return view('frontEnd.video',compact('categories','ads','post','chunk_most_read','next_post','other_posts','lastCategory'));
       }


    }
}
