<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{
    public function index()
    {
        $categories     = Category::remove()->get();
        $subCategories  = SubCategory::remove()->get();
        $posts          = Post::remove()->with('category')->orderByDesc('id')->paginate(10);
        // return $posts;
        return view('admin.posts.index',compact('subCategories','categories','posts'));
    }

    public function create()
    {
        $categories     = Category::remove()->get();
        $subCategories  = SubCategory::remove()->get();
        return view('admin.posts.create',compact('categories','subCategories'));
    }

    public function subCategories(Request $request)
    {
        // return $request->id;
         $SubCategory = SubCategory::where('category_id',$request->id)->remove()->select('name','id')->get();
         return \response()->json($SubCategory);
    }


    public function store(PostsRequest $request)
    {
        // return $request;

        try
        {

            DB::beginTransaction();
            $create = Post::create(
                [

                    'title'             => ["fr" => $request->title_fr, "ar" => $request->title_ar],
                    'body'              => ["fr" => $request->body_fr, "ar" => $request->body_ar],
                    'type'              => $request->type,
                    'category_id'       => $request->category_id,
                    'subCategory_id'    => $request->subCategory_id,
                    'created_by'        => auth()->user()->id,
                    'created_at'        => Carbon::now(),
                ]);

            // CHECK IF  IMAGES IS FOUND
            if ($request->hasFile('photo'))
            {

                $img = $request->photo;

                $update = $create->update(
                    [
                        'photo' => $img->store('posts', 'public'),
                    ]);
            }

            DB::commit();

            session()->flash('Add','تم اضافة المقال بنجاح');
            return redirect()->route('posts.index');

        } catch (\Throwable $th) {
            DB::rollback();
            // return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('posts.index');
        }

    }

    public function show($id)
    {
        $categories     = Category::remove()->get();
        $subCategories  = SubCategory::remove()->get();
        $post          = Post::remove()->with('sub_category','category')->find($id);
        // return $post;
        return view('admin.posts.show',compact('subCategories','categories','post'));
    }

    public function edit($id)
    {
        try
        {
            $post          = Post::remove()->with('sub_category','category')->find($id);
            // return $post;

            if ($post && $post->count() > 0)
            {
                // $subCategory    = SubCategory::find($id);
                $categories     = Category::remove()->get();
                $subCategory    = SubCategory::remove()->get();
                // return $subCategory;
                return view('admin.posts.edit',compact('subCategory','categories','post'));
            }else
            {
                session()->flash('delete','هذا المقال غير متاح');
                return redirect()->route('posts.index');
            }


        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('posts.index');
        }
    }

    public function update($id,PostsRequest $request)
    {
        try
        {
            // return $request;
            $post               = Post::remove()->find($id);

            if ($post && $post->count() > 0)
            {
                $subCategory    = SubCategory::find($id);
                $categories     = Category::remove()->get();
                DB::beginTransaction();
               $update = $post->update(
                   [
                        'title'             => ["fr" => $request->title_fr, "ar" => $request->title_ar],
                        'body'              => ["fr" => $request->body_fr, "ar" => $request->body_ar],
                        'type'              => $request->type,
                        'category_id'       => $request->category_id,
                        'subCategory_id'    => $request->subCategory_id,
                        'created_by'        => auth()->user()->id,
                        'created_at'        => Carbon::now(),
                   ]);

                   if ($request->hasFile('photo'))
                   {
                       Storage::disk('public')->delete('/assets/images/', $post->photo);
                       $img = $request->photo;

                       $data = $post->update(
                           [
                               'photo' => $img->store('posts', 'public'),
                           ]);
                   }
                   DB::commit();

                   session()->flash('Add','تم اضافة المقال بنجاح');
                   return redirect()->route('posts.index');
            }else
            {
                DB::rollBack();
                session()->flash('delete','هذا المقال غير متاح');
                return redirect()->route('posts.index');
            }


        } catch (\Throwable $th)
        {
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('posts.index');
        }
    }


    public function delete(Request $request)
    {
        $post = Post::find($request->id);

        if ($post && $post->count() > 0)
        {
            $post->update(
                [
                    'remove' => 1
                ]);
        }

        session()->flash('delete','تم حزف المقال بنجاح');
        return redirect()->back();
    }


    public function softDelete()
    {
        $posts = Post::restore()->get();
        return view('admin.posts.softDelete',compact('posts'));
    }

    public function restore(Request $request)
    {
        $posts = Post::find($request->id);
        if ($posts && $posts->count() > 0)
        {
            $posts->update(
                [
                    'remove' => 0
                ]);
        }
        session()->flash('Add','تم اعادة تفعيل المقال بنجاح');
        return redirect()->route('posts.index');
    }
}
