@extends('layouts.master')

@section('title')
Dashboard
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">لوحه التحكم</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                عدد الاقسام الرئيسية
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                عدد المقالات</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><br>

    <!-- Content Row -->

    <!-- <div class="row">


        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">اخر مقال</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
                </div>

                @if (isset($lastPost))
                <a href="{{ route('post.frontEnd',$lastPost->id) }}">
                    <div class="card-body">
                        <img class="img-responsive mb-1" src="{{ asset('/assets/images/' . $lastPost->photo)}}"
                            style="height: 100px; width: 100%">
                        <h3>{{$lastPost->getTranslation('title','ar')}}</h3>
                    </div>
                </a>
                @endif
            </div>
        </div>


        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">المقال الاكثر قرائة</h6>

                </div>

                <div class="card-body">
                    <div class="card-body">
                        @if (isset($lastPost))
                        <a href="{{ route('post.frontEnd',$chunk_most_read->id) }}">
                            <div class="card-body">
                                <img class="img-responsive mb-1"
                                    src="{{ asset('/assets/images/' . $chunk_most_read->photo)}}"
                                    style="height: 100px; width: 100%">
                                <h3>{{$chunk_most_read->getTranslation('title','ar')}}</h3>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>



</div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>
@endsection