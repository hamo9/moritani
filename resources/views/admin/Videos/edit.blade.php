@extends('layouts.master')

@section('title')
   تعديل الفيديو
@endsection

@section('content')
    <div class="container-fluid">

        <div class="mb-2">
            <a href="{{ route('Videos.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>تعديل الفيديو  {{ $video->getTranslation('title','ar') }}</h5>
                <div class="text-center">
                    @if (isset($video->video))
                        <video controls  style="height:200px; width:300px; text-align: center">
                            <source src="{{ asset('/assets/images/'.$video->video) }}" type="video/mp4">
                        </video>
                    @endif
                </div>

            </div>
            <div class="card-body">

                <form action="{{ route('Videos.update',$video->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <input type="hidden" class="id" name="id" value="{{ $video->id }}">


                        {{-- video TITLE AR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">عنوان الفيديو بالعربي</label>
                                <input class="form-control" type="text" name="title_ar" value="{{ $video->getTranslation('title','ar') }}">
                                @error('title_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- video TITLE FR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">عنوان الفيديو بالفرنسي</label>
                                <input class="form-control" type="text" name="title_fr"  value="{{ $video->getTranslation('title','fr') }}">
                                @error('title_fr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>








                        {{--VIDEO PHOTO --}}
                        <div class="col-md-6 mt-3 mb-3" >
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for=""> الفيديو</label>
                                <input type="file" name="video" id="">
                                @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        {{--video BODY AR --}}
                        <div class="col-md-12">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">تفاصيل الفيديو بالعربي</label>
                                <textarea name="body_ar" id=""  rows="10" style="width: 100%">
                                    {{$video->getTranslation('body','ar')}}
                                </textarea>
                                @error('body_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{--video BODY FR --}}
                        <div class="col-md-12">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">تفاصيل الفيديو بالفرنسي</label>
                                <textarea name="body_fr" id=""  rows="10" style="width: 100%">
                                    {{$video->getTranslation('body','fr')}}
                                </textarea>
                                @error('body_fr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary">تعديل</button>
                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
@endsection



