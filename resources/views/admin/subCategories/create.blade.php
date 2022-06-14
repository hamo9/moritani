@extends('layouts.master')

@section('title')
    اضافه مورد
@endsection




@section('content')
    <div class="container-fluid">

        <div class="mb-2">
            <a href="{{ route('subCategories.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>إضافة قسم جديد</h5>
            </div>
            <div class="card-body">

                <form action="{{ route('subCategories.store') }}" method="post">
                    @csrf

                    <div class="row">

                        <input type="hidden" class="userid" name="userid" id="userid" value="">


                        {{-- SUB CATEGORY NAME_AR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">اسم القسم الفرعي بالعربي</label>
                                <input class="form-control" type="text" name="name_ar" id="">
                                @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- SUB CATEGORY NAME_FR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">اسم القسم الفرعي بالفرنسي</label>
                                <input class="form-control" type="text" name="name_fr" id="">
                                @error('name_fr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                         {{-- CATEGORY ID --}}
                         <div class="col-md-12">
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">اسم القسم الفرعي بالفرنسي</label>
                                <select name="category_id" class="form-control">
                                    <option value="" >اختار قسم رئيسي</option>
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






                        <div class="col-12 mt-4">
                            <button class="btn btn-primary">حفظ</button>
                            <button class="btn btn-dark mr-2">اعادة تعيين</button>

                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
@endsection

