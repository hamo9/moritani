@extends('layouts.master')

@section('title')
    اضافه مورد
@endsection

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="{{ route('posts.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>عرض تفاصيل المقال {{ $post->getTranslation('title','ar') }}</h5>
                <div style="text-align: center">
                    <img class="img-responsive mb-1" src="{{ asset('/assets/images/' . $post->photo)}}" style="height: 100px; width: 100px; text-align: center">
                </div>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      العنوان بالعربي
                      <span class="badge-pill">{{ $post->getTranslation('title','ar') }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        العنوان بالفرنسي
                        <span class="badge-pill">{{ $post->getTranslation('title','fr') }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    القسم الرئيسي
                    <span class="badge-pill">{{ $post->category->getTranslation('name','ar') }}</span>
                    </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        القسم الفرعي
                        @isset($post->sub_category)
                            <span class="badge-pill">{{ $post->sub_category->getTranslation('name','ar') }}</span>
                        @endisset
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                         تفاصيل المقال بالعربي
                        <span class="badge-pill">{{ $post->getTranslation('body','ar') }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        تفاصيل المقال بالفرنسي
                       <span class="badge-pill">{{ $post->getTranslation('body','fr') }}</span>
                   </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        حالة المقال
                            <span class="badge-pill">{{ $post->type() }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        انشاء بواسطة

                        <span class="badge-pill">{{ $post->user->name }}</span>

                    </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        تاريخ الانشاء
                        <span class="badge-pill">{{ $post->created_at }}</span>

                    </li>

                  </ul>
            </div>
        </div>
    </div>
@endsection
