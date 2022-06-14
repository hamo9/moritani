

    <!-- top bar -->
    <div class="top_bar d-none d-md-block">
        <div class="container">
            <div class="row p-1">
                <div class="col-md-6">
                    الثلاثاء 15 ذو القعده 1443 ه - 14 يونيو 2022
                </div>
                <div class="col-md-6 text-start">

                @if (App::getLocale() == 'rrr')
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                        عربي
                    </a>
                @else
                    <a href="{{ LaravelLocalization::getLocalizedURL('fr') }}">
                        <img width="20px" height="20px" src="assets/img/france.png" alt=""> francais
                    </a>
                @endif



                    </div>
            </div>
        </div>
    </div>

    <!-- Page header with logo and tagline-->
    <header class="bg-light border-bottom d-none d-md-block">
        <div class="container">
            <div class="text-center my-1">
                <img width="150px" height="150px" src="{{ asset('assets/frontEnd/img/logo.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </header>


    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary myNavbar" style="background-color: rgb(0, 163, 0) !important">
        <div class="container">
            <div class="navbar-brand d-md-none">
                <img width="60px" height="60px" src="{{ asset('assets/frontEnd/img/logo.png') }}" alt=""
                    class="img-fluid">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse m-auto text-left" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 custom_nav_bar">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('welcome.frontEnd') }}">
                            {{ __('navbar.home') }}
                        </a>
                    </li>
                     @if (isset($categories) && $categories->count() > 0)
                        @foreach ($categories as $category)
                            <li class="nav-item dropdown has-megamenu d-none d-md-block">
                                <a class="nav-link dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">{{ $category->name }}</a>
                                <div class="dropdown-menu megamenu" role="menu">
                                    <!-- for disktop -->
                                    <div class=" d-none d-md-block ">
                                        <div class="row">

                                            @php
                                                $posts = $category
                                                    ->posts()
                                                    ->latest()
                                                    ->take(4)
                                                    ->get();
                                            @endphp

                                            @foreach ($posts as $post)
                                                <div class="col-md-3 text-black">
                                                    <div class="p-2">
                                                        <div class="my_box_img" style="background-image: url('assets/images/{{ $post->photo }}');"></div>

                                                        <h6 class="mt-2">{{ $post->title }}</h6>
                                                        <div class="date mb-1 mt-1 small_text">
                                                            <i class="bi bi-clock"></i>
                                                            <span>{{ $post->created_at }}</span>
                                                            @if (isset($post->sub_category) && $post->sub_category->count() > 0)
                                                                <a href="{{ route('post.frontEnd',$post->id) }}">{{ $post->sub_category->name }}</a>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- for mobile -->
                                    <ul class="list-unstyled d-md-none">
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item d-md-none">
                                <a class="nav-link active"
                                    href="{{ route('category_posts.frontEnd', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </li>

                        @endforeach
                    @endif

                    {{-- <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#"
                            data-bs-toggle="dropdown">{{ $lastCategory->name }}</a>
                        <div class="dropdown-menu megamenu" role="menu">

                            <div class=" d-none d-md-block ">
                                <div class="row">

                                    @php
                                        $posts = $lastCategory
                                            ->videos()
                                            ->latest()
                                            ->take(4)
                                            ->get();
                                    @endphp

                                    @foreach ($posts as $post)
                                        <div class="col-md-3 text-black">
                                            <div class="p-2">

                                                <video controls class="my_box_img"  style="height:200px; width:100%;">
                                                    <source src="{{ asset('/assets/images/'.$post->video) }}" type="video/mp4">
                                                </video>

                                                <h6 class="mt-2">

                                                    <a href="{{ route('video.frontEnd',$post->id) }}">{{ $post->title }}</a>
                                                </h6>
                                                <div class="date mb-1 mt-1 small_text">
                                                    <i class="bi bi-clock"></i>
                                                    <span>{{ $post->created_at }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </li> --}}

                </ul>
            </div>
        </div>
    </nav>


   @if (App::getLocale() == 'fr')
        <div class="text-center mt-2 col-md-6 m-auto">
            <img src="{{ asset('assets/frontEnd/img/SNIM2-FR.jpg') }}" alt="" class="img-fluid m-auto text-center">
        </div>
    @else
        <div class="text-center mt-2 col-md-6 m-auto">
            <img src="{{ asset('assets/frontEnd/img/SNIM2.jpg') }}" alt="" class="img-fluid">
        </div>
    @endif

