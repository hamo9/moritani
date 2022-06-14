@extends('layouts.master')

@section('title')
الفيديوهات
@endsection

@section('style')
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="d-flex mb-2">

            <a href="{{ route('Videos.create') }}" class="btn btn-success ml-3">اضافة فيديو جديد</a>



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
                <h6 class="m-0 font-weight-bold text-primary text-right">الفيديوهات</h6>
            </div>
            <div class="card-body">



                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>عنوان الفيديو بالعربي</th>
                                <th>عنوان الفيديو بالفرنسي</th>
                                <th> الفيديو</th>
                                <th>وصف الفيديو بالعربي</th>
                                <th>وصف الفيديو بالفرنسي</th>
                                <th>انشاء بواسطة</th>
                                <th> تاريخ الانشاء</th>
                                <th>الاجرائات </th>

                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $x = 1;
                            @endphp
                        @if ($videos && $videos->count() > 0)
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{$video->getTranslation('title','ar')}}</td>
                                    <td>{{$video->getTranslation('title','fr')}}</td>
                                    <td>
                                        {{-- <iframe width="400" height="250" src="https://www.youtube.com/embed/{{ $value->youtube_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                        @if (isset($video->video))
                                            <video controls  style="height:200px; width:100%;">
                                                <source src="{{ asset('/assets/images/'.$video->video) }}" type="video/mp4">
                                            </video>
                                        @endif
                                    </td>
                                    <td>{{$video->getTranslation('body','ar')}}</td>
                                    <td>{{$video->getTranslation('body','fr')}}</td>

                                    <td>{{ $video->user->name }}</td>
                                    <td>{{ $video->created_at }}</td>
                                    <td>
                                        <a href="{{ route('Videos.edit',$video->id) }}" class="btn btn-info btn-sm"> تعديل</a>
                                        {{-- <a href="{{ route('Videos.show',$video->id) }}" class="btn btn-warning btn-sm"> تفاصيل</a> --}}
                                        <!-- Button trigger modal -->
                                        <a href="#exampleModal" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="{{ $video->id }}" data-name="{{$video->getTranslation('title','ar')}}">
                                            حزف
                                        </a>
                                        @include('admin.Videos.delete')
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            {{-- start message whene no data available --}}
                            <div class="col-md-6 m-auto text-center">
                                <img src="assets/img/undraw_Empty_re_opql.png" alt="" class="img-fluid">
                                <h2>ليس لديك أي فيديوات </h2>
                                <a href="{{ route('Videos.create') }}" class="btn btn-primary">اضافة فيديو  جديد</a>
                            </div>
                            {{-- End message whene no data available --}}
                        @endif
                        </tbody>
                    </table>
                    {{ $videos->links() }}
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

    {{-- DELETE post --}}
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

