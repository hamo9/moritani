@extends('layouts.master')

@section('title')
الاقسام الفرعية المحزوفة
@endsection

@section('style')
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="d-flex mb-2">




            <div id="flash_messages">
                @if(session()->has('Add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="Add">
                        <strong>{{ session()->get('Add') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session()->has('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_alert">
                        <strong>{{ session()->get('delete') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-right">الاقسام الفرعية</h6>
            </div>
            <div class="card-body">



                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>اسم القسم بالعربي</th>
                                <th>اسم القسم بالفرنسي</th>
                                <th>انشاء بواسطة</th>
                                <th>الاجرائات </th>

                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $x = 1;
                            @endphp
                        @if ($subCategories && $subCategories->count() > 0)
                            @foreach ($subCategories as $category)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{$category->getTranslation('name','ar')}}</td>
                                    <td>{{$category->getTranslation('name','fr')}}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <a href="#exampleModal" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="{{ $category->id }}" data-name="{{$category->getTranslation('name','ar')}}">
                                            اعادة تفعيل
                                        </a>
                                        @include('admin.subCategories.restore')


                                        {{-- <a href="{{ route('categories.delete',$category->id) }}" class="btn btn-danger btn-sm"> حزف</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            {{-- start message whene no data available --}}
                            <div class="col-md-6 m-auto text-center">
                                <img src="assets/img/undraw_Empty_re_opql.png" alt="" class="img-fluid">
                                <h2>ليس لديك أي اقسام فرعية محزوفة</h2>
                            </div>
                            {{-- End message whene no data available --}}
                        @endif
                        </tbody>
                    </table>
                </div>



            </div>
        </div>




    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function()
        {
        $('#errors').fadeOut(3000);
        $('#Add').fadeOut(3000);
        $('#delete_alert').fadeOut(3000);
        });
    </script>

    {{-- DELETE CATEGORY --}}
    <script>

        $('#exampleModal').on('show.bs.modal', function(event)
        {
            // alert("fd");
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // alert(id);
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection

