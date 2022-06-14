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

                        <h3 class="mt-4"> {{ $post->title }} </h3>
                        <p class="small_text"><i class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</p>
                        <hr>

                        <div class="content_post">
                            <div class="img_for_post_detail mb-5">
                                <video controls class="my_box_img"  style="height:450px; width:100%;">
                                    <source src="{{ asset('/assets/images/'.$post->video) }}" type="video/mp4">
                                </video>
                            </div>

                            <p class="lead">
                               {{ $post->body }}
                            </p>
                        </div>

                    </div>
                    <div class="card-footer p-3">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-share-fill"></i>

                            </div>
                            <div class="col-10 text-center icon_share_post">

                                <a class="p-2" href="//www.facebook.com/sharer.php?u=https://www.saharamedias.net/?p=186721" rel="external noopener nofollow" title="فيسبوك" target="_blank" data-raw="https://www.facebook.com/sharer.php?u=post_link" data-bs-toggle="tooltip" data-bs-placement="top">
                                    <i class="bi bi-facebook"></i>
                                </a>

                                <a class="p-2" href="//twitter.com/intent/tweet?text=text&amp;url=https://www.saharamedias.net/?p=186721" rel="external noopener nofollow" target="_blank" data-raw="https://twitter.com/intent/tweet?text={post_title}&amp;url={post_link}" data-bs-toggle="tooltip" data-bs-placement="top" title="twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>

                                <a class="p-2" href="mailto:?subject=subject&amp;body=https://www.saharamedias.net/?p=186721" rel="external noopener nofollow" target="_blank" data-raw="mailto:?subject=&amp;" data-bs-toggle="tooltip" data-bs-placement="top" title="email">
                                    <i class="bi bi-envelope-fill"></i>
                                </a>

                            </div>



                        </div>
                    </div>
                </div>
                <!-- end main post -->

               @if (isset($next_post) && $next_post !='')
                    <!-- for next post -->
                    <div class="mt-5">
                        <div class="for_next_post mb-3" style="background-image: url('assets/images/{{ $next_post->photo }}');">
                                <div class="overray"></div>
                        <h2>{{ $next_post->title }}</h2>
                        <a href="{{ route('post.frontEnd',$next_post->id) }}" class="post_content">

                                    <h6 class="mb-4">{{ \Carbon\Carbon::parse($next_post->created_at)->diffForhumans() }}</h6>
                                    <h3>
                                        @php
                                            $val =  substr($next_post->body, 0, 100)
                                        @endphp

                                        {{  $val}} ....
                                    </h3>
                                </a>
                            </div>
                    </div>
               @endif

                <!-- start other posts -->
                    @if (isset($other_posts))
                        <div class="card card-body pt-1 sports_section MyHover_green mt-5">
                            <div class="row card_title">
                                <div class="col-6">
                                    <h4>other posts</h4>
                                </div>
                            </div>
                            <div class="row mt-2 card_small_reports">
                                @foreach ($other_posts as $posts)
                                        <a href="{{ route('post.frontEnd',$posts->id) }}" class="col-6 col-md-4">
                                            <video controls class="my_box_img"  style="height:200px; width:100%;">
                                                <source src="{{ asset('/assets/images/'.$post->video) }}" type="video/mp4">
                                            </video>

                                        <div class="date mb-1 mt-1 small_text">
                                            <i class="bi bi-clock"></i>
                                            <span>{{ \Carbon\Carbon::parse($posts->created_at)->diffForhumans() }}</span>
                                        </div>
                                        <h6>{{ $posts->title }}</h6>
                                    </a>
                                @endforeach

                            </div>

                        </div>
                    @endif
                <!-- End other posts -->

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


