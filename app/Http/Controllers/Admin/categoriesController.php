<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoriesRequest;
use Illuminate\Support\Facades\DB;


class categoriesController extends Controller
{
    public function index()
    {
        $categories = Category::remove()->orderByDesc('id')->paginate(10);
        // return $categories;
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit($id)
    {
        try
        {
            $category = Category::find($id);
            return view('admin.categories.edit',compact('category'));

        } catch (\Throwable $th)
        {
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('categories.index');
        }
    }


    public function store(categoriesRequest $request)
    {

        try {
            $category = Category::create(
                [
                    'name'          => ["fr" => $request->name_fr, "ar" => $request->name_ar],
                    'created_by'    => auth()->user()->id,
                    // 'created_at' => Carbon::now(),
                ]);

                session()->flash('Add','تم الاضافة بنجاح');
                return redirect()->route('categories.index');

        } catch (\Throwable $th)
        {
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('categories.index');
        }
    }

    public function update($id,categoriesRequest $request)
    {
        try
        {
            $category = Category::find($id);
            if ($category && $category->count() > 0)
            {
                $update = $category->update(
                    [
                        'name'          => ["fr" => $request->name_fr, "ar" => $request->name_ar],
                        'created_by'    => auth()->user()->id,
                    ]);

                session()->flash('Add','تم تعديل القسم بنجاح');
                return redirect()->route('categories.index');
            }else
            {
                session()->flash('delete','هذا القسم غير متاح');
                return redirect()->route('categories.index');
            }
        } catch (\Throwable $th)
        {
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('categories.index');
        }
    }


    public function delete(Request $request)
    {
        $category = Category::with('posts','sub_category')->find($request->id);
        DB::beginTransaction();
        if ($category->posts && $category->posts->count() > 0)
        {


            foreach ($category->posts as $post)
            {
                $post->update(
                    [
                        'remove' => 1
                    ]);
            }
        }

        if ($category->sub_category && $category->sub_category->count() > 0)
        {


            foreach ($category->sub_category as $sub_category)
            {
                $sub_category->update(
                    [
                        'remove' => 1
                    ]);
            }
        }

        $category->update(
            [
                'remove' => 1
            ]);
            DB::commit();
            DB::rollback();


        session()->flash('delete','تم حزف القسم بنجاح');
        return redirect()->back();
    }


    public function softDelete()
    {
        $categories = Category::restore()->get();
        return view('admin.categories.softDelete',compact('categories'));
    }

    public function restore(Request $request)
    {
        $category = Category::with('posts','sub_category')->find($request->id);
        // return $category;
        DB::beginTransaction();
        if ($category->posts && $category->posts->count() > 0)
        {
            foreach ($category->posts as $post)
            {
                $post->update(
                    [
                        'remove' => 0
                    ]);
            }
        }

        if ($category->sub_category && $category->sub_category->count() > 0)
        {
            foreach ($category->sub_category as $sub_category)
            {
                $sub_category->update(
                    [
                        'remove' => 0
                    ]);
            }
        }

        $category->update(
            [
                'remove' => 0
            ]);
            DB::commit();
            DB::rollback();


        session()->flash('Add','تم اعادة تفعيل القسم بنجاح');
        return redirect()->route('categories.index');
    }
}
