<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\videosRequest;




class videosController extends Controller
{
    public function index()
    {
        $videos = Video::paginate(10);
        return view('admin.Videos.index',compact('videos'));
    }

    public function create()
    {
        return view('admin.Videos.create');
    }


    public function store(videosRequest $request)
    {
        $category = Category::remove()->find(11);
        // return $request;
        try
        {
            if ($category && $category->count() > 0)
            {
                // return $category;
                DB::beginTransaction();
                $create = Video::create(
                    [

                        'title'             => ["fr" => $request->title_fr, "ar" => $request->title_ar],
                        'body'              => ["fr" => $request->body_fr, "ar" => $request->body_ar],
                        'created_by'        => auth()->user()->id,
                        'category_id'       => 11,
                        'created_at'        => Carbon::now(),
                    ]);

                // CHECK IF  IMAGES IS FOUND
                if ($request->hasFile('video'))
                {

                    $videos = $request->video;

                    $update = $create->update(
                        [
                            'video' => $videos->store('videos', 'public'),
                        ]);
                }



                DB::commit();

                session()->flash('Add','تم اضافة الفيديو بنجاح');
                return redirect()->route('Videos.index');
            } else
            {
                session()->flash('delete','يجب اضافة كل الاقسام الرئيسية اولا');
                return redirect()->route('Videos.index');
            }
        } catch (\Throwable $th)
        {
            DB::rollback();
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Videos.index');
        }

    }


    public function edit($id)
    {
        try
        {
            $video          = Video::with('user')->find($id);
            // return $post;

            if ($video && $video->count() > 0)
            {

                return view('admin.Videos.edit',compact('video'));
            }else
            {
                session()->flash('delete','هذا الفيديو غير متاح');
                return redirect()->route('Videos.index');
            }


        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Videos.index');
        }
    }

    public function update($id,videosRequest $request)
    {
        try
        {
            // return $request;
            $video               = Video::find($id);

            if ($video && $video->count() > 0)
            {

                DB::beginTransaction();
               $update = $video->update(
                   [
                        'title'             => ["fr" => $request->title_fr, "ar" => $request->title_ar],
                        'body'              => ["fr" => $request->body_fr, "ar" => $request->body_ar],
                        'created_by'        => auth()->user()->id,
                        'created_at'        => Carbon::now(),
                   ]);

                   if ($request->hasFile('video'))
                   {
                       Storage::disk('public')->delete('/assets/images/', $video->video);
                       $img = $request->video;

                       $data = $video->update(
                           [
                               'video' => $img->store('videos', 'public'),
                           ]);
                   }
                   DB::commit();

                   session()->flash('Add','تم اضافة الفيديو بنجاح');
                   return redirect()->route('Videos.index');
            }else
            {
                DB::rollBack();
                session()->flash('delete','هذا الفيديو غير متاح');
                return redirect()->route('Videos.index');
            }


        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Videos.index');
        }
    }


    public function delete(Request $request)
    {
        try
        {

            $video = Video::find($request->id);
            if ($video && $video->count() > 0)
            {
                Storage::disk('public')->delete('/assets/images/',$video->video);
                $video->delete();
                session()->flash('delete','تم الحزف بنجاح');
                return redirect()->route('Videos.index');
            }
        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Videos    .index');
        }
    }

}
