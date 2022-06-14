@include('frontEnd.layout.header')

<body>

    {{-- start navbar --}}
    @include('frontEnd.layout.navbar')

    <!--<div class="mt-3 mb-3">-->
    <!--    <div class="text-center">-->
    <!--        <img src="{{ asset('/assets/images/' . $ads->photo) }}" class="img-fluid" alt="">-->
    <!--    </div>-->
    <!--</div>-->


    <div class="container p-md-0 mt-4 mb-5 mt-4">
        <div class="row p-0">

            <div class="col-md-8 mb-4">

                <!-- start category posts -->
                <div class="card mb-3 shadow">
                    <div class="card-header">
                        <h4>
                            {{ __('welcome.posts') }} {{ $category->name }}
                        </h4>
                    </div>
                    <div class="card-body">


                        @if (isset($category->posts))
                            @foreach ($category->posts as $post)
                                <a href="{{ route('post.frontEnd', $post->id) }}" class="text-dark row mt-4">
                                    <div class="col-md-6">
                                        <div class="img_category_posts"
                                            style="background-image:url('assets/images/{{ $post->photo }}')"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small_text"><i
                                                class="bi bi-clock p-1"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}
                                        </p>
                                        <h4>{{ $post->title }}</h4>
                                        <p>
                                            {{ substr($post->body, 0, 150) }} ...
                                        </p>

                                    </div>

                                </a>
                            @endforeach
                        @endif




                    </div>

                </div>
                <!-- end main post -->



            </div>

            <div class="col-md-4">


                <!-- for Most Read widget-->
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="row card_title">
                            <div class="col-8">
                                <h5 class="text-success">{{ __('welcome.more_reading') }}</h5>
                            </div>

                        </div>

                        <hr>
                        @php
                            $myNumber = 0;
                        @endphp

                        @if (isset($chunk_most_read))
                            @foreach ($chunk_most_read as $item)
                                <a href="{{ route('post.frontEnd', $item->id) }}" class="text-dark row mb-2 mt-4">
                                    <div class="col-6 most_read_count">
                                        <div class="most_read_count_1">{{ ++$myNumber }}</div>
                                        <div class="my_box_img_small"
                                            style="background-image: url('assets/images/{{ $item->photo }}');">
                                        </div>
                                    </div>
                                    <div class="col-6 p-0">
                                        <p>{{ $item->title }}</p>
                                        <p class="small_text"><i
                                                class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        @endif

                    </div>


                </div>

                <!-- start Follow section -->
                <div class="the_press_section mt-4">
                    <div class="card card-body ">
                        <h5>{{ __('welcome.follow') }}</h5>
                        <div class="row social_follow mt-4">
                            <div class="col-3">
                                <i class="bi bi-facebook"></i>
                            </div>
                            <div class="col-3">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div class="col-3">
                                <i class="bi bi-youtube"></i>
                            </div>
                            <div class="col-3">
                                <i class="bi bi-twitter"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontEnd.layout.footer')
