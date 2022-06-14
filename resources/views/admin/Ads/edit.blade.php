@extends('layouts.master')

@section('title')
   تعديل الاعلان
@endsection

@section('content')
    <div class="container-fluid">

        <div class="mb-2">
            <a href="{{ route('Ads.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>تعديل الاعلان  {{ $Ad->url }}</h5>
                <div style="text-align: center">
                    <img class="img-responsive mb-1" src="{{ asset('/assets/images/' . $Ad->photo)}}" style="height: 100px; width: 100px">
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('Ads.update',$Ad->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <input type="hidden" class="id" name="id" value="{{ $Ad->id }}">


                       {{-- ADS URL --}}
                       <div class="col-md-6">
                        <div class="form-group mb-2 mt-0 pt-0">
                            <label for="">عنوان الاعلان </label>
                        <input class="form-control" type="text" name="url" id="" value="{{ $Ad->url}}">
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>









                         {{--POST PHOTO --}}
                         <div class="col-md-6 mt-3 mb-3" >
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">صورة الاعلان</label>
                                <input type="file" name="photo" id="">
                                @error('photo')
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

@section('scripts')
    <script>
         $('#category_id').on('change', function()
        {
            var cat_id = $(this).val();
            alert(cat_id);

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

