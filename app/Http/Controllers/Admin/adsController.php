<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdsRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Ads;

use Illuminate\Http\Request;

class adsController extends Controller
{
    public function index()
    {
        $ads = Ads::remove()->paginate(10);
        // return $ads;
        return view('admin.Ads.index',compact('ads'));
    }

    public function create()
    {
        return view('admin.Ads.create');
    }

    public function store(AdsRequest $request)
    {
        // return $request;

        try
        {

            DB::beginTransaction();
            $create = Ads::create(
                [


                    'url'              => $request->url,
                    'created_by'        => auth()->user()->id,
                    'created_at'        => Carbon::now(),
                ]);

            // CHECK IF  IMAGES IS FOUND
            if ($request->hasFile('photo'))
            {

                $img = $request->photo;

                $update = $create->update(
                    [
                        'photo' => $img->store('ahmed', 'public'),
                    ]);
            }

            DB::commit();

            session()->flash('Add','تم اضافة الاعلان بنجاح');
            return redirect()->route('Ads.index');

        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Ads.index');
        }

    }


    public function edit($id)
    {
        try
        {
            $Ad          = Ads::find($id);
            // return $post;

            if ($Ad && $Ad->count() > 0)
            {

                return view('admin.Ads.edit',compact('Ad'));
            }else
            {
                session()->flash('delete','هذا الاعلان غير متاح');
                return redirect()->route('Ads.index');
            }


        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('posts.index');
        }
    }

    public function update($id,AdsRequest $request)
    {
        try
        {
            // return $request;
            $Ad               = Ads::find($id);

            if ($Ad && $Ad->count() > 0)
            {

                DB::beginTransaction();
            $update = $Ad->update(
                [
                    'url'              => $request->url,
                    'created_by'        => auth()->user()->id,
                    'created_at'        => Carbon::now(),
                ]);

                if ($request->hasFile('photo'))
                {
                    Storage::disk('public')->delete('/assets/images/', $Ad->photo);
                    $img = $request->photo;

                    $data = $Ad->update(
                        [
                            'photo' => $img->store('ahmed', 'public'),
                        ]);
                }
                DB::commit();

                session()->flash('Add','تم اضافة الاعلان بنجاح');
                return redirect()->route('Ads.index');
            }else
            {
                DB::rollBack();
                session()->flash('delete','هذا الاعلان غير متاح');
                return redirect()->route('Ads.index');
            }


        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Ads.index');
        }
    }

    public function delete(Request $request)
    {
        try
        {

            $Ad = Ads::find($request->id);
            if ($Ad && $Ad->count() > 0)
            {
                Storage::disk('public')->delete('/assets/images/',$Ad->photo);
                $Ad->delete();
                session()->flash('delete','تم الحزف بنجاح');
                return redirect()->route('Ads.index');
            }
        } catch (\Throwable $th)
        {
            return $th;
            session()->flash('delete','هناك خطا ما برجاء المحاولة فيما بعد');
            return redirect()->route('Ads.index');
        }
    }

}
