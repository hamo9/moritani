@extends('layouts.master')

@section('title')
    اضافه مورد
@endsection




@section('content')
    <div class="container-fluid">

        <div class="mb-2">
            <a href="{{ route('Ads.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>إضافة اعلان جديد</h5>
            </div>
            <div class="card-body">

                <form action="{{ route('Ads.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <input type="hidden" class="userid" name="userid" id="userid" value="">


                        {{-- ADS URL --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">عنوان الاعلان </label>
                                <input class="form-control" type="text" name="url" id="">
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         {{--ADS PHOTO --}}
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
                            <button class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
@endsection


