@include('frontEnd.layout.header')

<body>

    {{-- start navbar --}}
    @include('frontEnd.layout.navbar')
    <!--<div class="mt-3 mb-3">-->
    <!--    <div class="text-center">-->
    <!--        <img  src="{{ asset('/assets/images/' . $ads->photo) }}" class="img-fluid" alt="">-->
    <!--    </div>-->
    <!--</div>-->

    <div class="container p-md-0 mt-4 mb-5 mt-4">
        <div class="row p-0">

            <div class="col-md-8 mb-4">

                <!-- start main post -->
                <div class="card pt-1 mb-3 shadow">
                    <div class="card-body">

                        <h4 class="mt-4 mb-3">
                            {{ __('welcome.search') }} :
                        </h4>

                    <form action="{{ route('search.frontEnd') }}" method="post">
                        @csrf
                            <div class="input-group">
                                <input class="form-control form-control-lg" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="search">
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </form>


                        <!-- search result -->
                        <div class="search_result mt-5">

                            @if (isset($categories2))
                                @foreach ($categories2->posts as $post)
                                    <a href="{{ route('post.frontEnd',$post->id) }}" class="row mb-4">
                                        <div class="col-md-6">
                                        <div class="img_category_posts" style="background-image: url('assets/images/{{ $post->photo }}')"></div>

                                        </div>
                                        <div class="col-md-6">
                                        <p class="small_text"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</p>
                                        <h5>
                                            {{  $post->title}}
                                        </h5>
                                        </div>
                                    </a>
                                @endforeach
                            @elseif(isset($posts))
                                @foreach ($posts as $item)
                                    <a href="{{ route('post.frontEnd',$item->id) }}" class="row mb-4">
                                        <div class="col-md-6">
                                        <div class="img_category_items" style="background-image: url('assets/images/{{ $item->photo }}')"></div>

                                        </div>
                                        <div class="col-md-6">
                                        <p class="small_text"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</p>
                                        <h5>
                                            {{  $item->title}}
                                        </h5>
                                        </div>
                                    </a>
                                @endforeach
                             @endif






                        </div>

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
                        @if (isset($chunk_most_read))
                            @foreach ($chunk_most_read as $item)
                                <a href="{{ route('post.frontEnd',$item->id) }}" class="row mb-2 mt-4">
                                    <div class="col-6 most_read_count">
                                    <div class="most_read_count_1">{{ $item->read_count }}</div>
                                    <div class="my_box_img_small" style="background-image: url('assets/images/{{ $item->photo }}');">
                                        </div>
                                    </div>
                                    <div class="col-6 p-0">
                                        <p>{{ $item->title }}</p>
                                        <p class="small_text"><i class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</p>
                                    </div>
                                </a>
                            @endforeach
                        @endif


                    </div>


                </div>

                <!-- start Follow section -->
                <div class="the_press_section mt-4">
                    <div class="card card-body ">
                        <h5>Follow Us</h5>
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
    <!-- start hero section -->

    @include('frontEnd.layout.footer')

