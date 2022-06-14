@extends('layouts.master')

@section('title')
    اضافه مورد
@endsection




@section('content')
    <div class="container-fluid">

        <div class="mb-2">
            <a href="{{ route('posts.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>إضافة مقال جديد</h5>
            </div>
            <div class="card-body">

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <input type="hidden" class="userid" name="userid" id="userid" value="">


                        {{-- POST TITLE AR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">عنوان المقال بالعربي</label>
                                <input class="form-control" type="text" name="title_ar" id="">
                                @error('title_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- POST TITLE FR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">عنوان المقال بالفرنسي</label>
                                <input class="form-control" type="text" name="title_fr" id="">
                                @error('title_fr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                         {{-- CATEGORY ID --}}
                         <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">اختار القسم الرئيسي</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value="">اختار القسم رئيسي</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->getTranslation('name','ar') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         {{--SUB CATEGORY ID --}}
                         <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">اختار القسم الفرعي ( ختياري )</label>
                                <select name="subCategory_id" class="form-control" id="subCategory_id">
                                    <option value="">اختار القسم الفرعي ( ختياري )</option>

                                </select>
                                @error('subCategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         {{--TYPE --}}
                         <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">حالة المقال</label>
                                <select name="type" class="form-control">
                                    <option value="0">غير عاجل</option>
                                    <option value="1">عاجل</option>
                                </select>
                            </div>
                        </div>

                         {{--POST PHOTO --}}
                         <div class="col-md-6 mt-3 mb-3" >
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">صورة المقال</label>
                                <input type="file" name="photo" id="">
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        {{--POST BODY AR --}}
                        <div class="col-md-12">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">تفاصيل المقال بالعربي</label>
                                <textarea name="body_ar" id=""  rows="10" style="width: 100%"></textarea>
                                @error('body_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{--POST BODY FR --}}
                        <div class="col-md-12">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">تفاصيل المقال بالفرنسي</label>
                                <textarea name="body_fr" id=""  rows="10" style="width: 100%"></textarea>
                                @error('body_fr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
         $('#category_id').on('change', function()
        {
            var cat_id = $(this).val();
            // alert(cat_id);

            if(cat_id)
                 {
                    $.ajax(
                        {
                            url:"{{ route('posts.subCategories') }}",
                            type:"GET",
                            data:
                            {
                                'id'       : cat_id,
                            },

                            dataType: 'json',
                            success:function(data)
                            {
                                $("#subCategory_id").empty();
                                $.each(data,function(key,value)
                                {
                                    $("#subCategory_id").append('<option value="'+value.id+'">'+value.name.ar+'</option>')
                                });
                            }
                        });
                 }else
                 {
                     alert('Error');
                 }

        })
    </script>
@endsection

