<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\suCategoryRequest;
use Illuminate\Support\Facades\DB;


class subCategoriesController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::remove()->orderByDesc('id')->paginate(10);
        return view('admin.subCategories.index',compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::remove()->get();
        return view('admin.subCategories.create',compact('categories'));
    }

    public function edit($id)
    {
        try
        {
            $subCategory    = SubCategory::find($id);
            $categories     = Category::remove()->get();
            return view('admin.subCategories.edit',compact('subCategory','categories'));

        } catch (\Throwable $th)
        {
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('subCategories.index');
        }
    }


    public function store(suCategoryRequest $request)
    {

        try {

                $category = SubCategory::create(
                    [
                        'name'          => ["fr" => $request->name_fr, "ar" => $request->name_ar],
                        'category_id'   => $request->category_id,
                        'created_by'    => auth()->user()->id,
                        // 'created_at' => Carbon::now(),
                    ]);

                session()->flash('Add','تم الاضافة بنجاح');
                return redirect()->route('subCategories.index');

        } catch (\Throwable $th)
        {
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('subCategories.index');
        }
    }

    public function update($id,suCategoryRequest $request)
    {
        try
        {
            $category = SubCategory::find($id);
            if ($category && $category->count() > 0)
            {
                $update = $category->update(
                    [
                        'name'          => ["fr" => $request->name_fr, "ar" => $request->name_ar],
                        'category_id'   => $request->category_id,
                        'created_by'    => auth()->user()->id,
                    ]);

                session()->flash('Add','تم تعديل القسم بنجاح');
                return redirect()->route('subCategories.index');
            }else
            {
                session()->flash('delete','هذا القسم غير متاح');
                return redirect()->route('subCategories.index');
            }
        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('categories.index');
        }
    }


    public function delete(Request $request)
    {
        $subCategories = SubCategory::with('posts')->find($request->id);
        // return $subCategories;
        DB::beginTransaction();
        if ($subCategories->posts && $subCategories->posts->count() > 0)
        {


            foreach ($subCategories->posts as $post)
            {
                $post->update(
                    [
                        'remove' => 1
                    ]);
            }
        }

        $subCategories->update(
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
        $subCategories = SubCategory::restore()->get();
        return view('admin.subCategories.softDelete',compact('subCategories'));
    }

    public function restore(Request $request)
    {
        $subCategory = SubCategory::with('posts')->find($request->id);
        // return $category;
        DB::beginTransaction();
        if ($subCategory->posts && $subCategory->posts->count() > 0)
        {
            foreach ($subCategory->posts as $post)
            {
                $post->update(
                    [
                        'remove' => 0
                    ]);
            }
        }

        $subCategory->update(
            [
                'remove' => 0
            ]);
            DB::commit();
            DB::rollback();


        session()->flash('Add','تم اعادة تفعيل القسم بنجاح');
        return redirect()->route('subCategories.index');
    }
}
