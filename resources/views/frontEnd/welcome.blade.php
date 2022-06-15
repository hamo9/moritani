@include('frontEnd.layout.header')

<body>

    {{-- start navbar --}}
    @include('frontEnd.layout.navbar')


    <!-- start hero section -->
    @include('frontEnd.layout.hero')
    <!-- End hero section -->

    <!-- start main section -->
    <div class="container p-md-0 mt-4">
        <div class="row p-0">

            <div class="col-md-8 mb-4">
                <!-- start news section -->
                @include('frontEnd.layout.news')

                <!-- end news section -->

                <!-- advertisement widget-->
                <div class="card mb-4 col-12">
                    <div class="card-body text-center">
                        <img src="{{ asset('/assets/images/' . $ads[0]->photo)}}" class="img-fluid" alt="">
                    </div>
                </div>

                <!-- start reports section -->
                @include('frontEnd.layout.reports')
                <!-- start reports section -->

                <!-- End reports section -->


                <div class="row mt-4">
                    <!-- start the press section -->
                    @include('frontEnd.layout.press')



                    <!-- start Figures section -->
                    @include('frontEnd.layout.figures')

                     <!-- start videos section -->
                    @include('frontEnd.layout.videos')



                </div>


                <!-- Start opinion section -->
                @include('frontEnd.layout.opinion')


                <!-- advertisement widget-->
                <div class="card mb-4 col-12 mt-3">
                    <div class="card-body text-center">
                        <img src="{{ asset('/assets/images/' . $ads[1]->photo)}}" class="img-fluid" alt="">
                    </div>
                </div>

                <!-- start sports section -->
                @include('frontEnd.layout.sports')


                <!-- End sports section -->

                <!-- start Mix section -->
                @include('frontEnd.layout.mix')

                <!-- End Mix section -->


            </div>


            <div class="col-md-4">
               <!-- Search widget-->
               <div class="card mb-4">
                <div class="card-header myTitle">{{ __('welcome.search') }}</div>
                <div class="card-body">
                <form action="{{ route('search.frontEnd') }}" method="post">
                    @csrf
                        <div class="input-group">
                            <input class="form-control form-control-lg" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search"  name="search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </form>
                </div>
            </div>
                <!-- advertisement widget-->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset('/assets/images/' . $ads[2]->photo)}}" class="img-fluid" alt="">
                    </div>
                </div>

                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header myTitle">{{ __('welcome.Categories') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0 myTitle">
                                        <li class="mt-2"><a href="{{ route('category_posts.frontEnd',$category->id) }}">{{ $category->name }}</a></li>
                                        </ul>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

                <!-- for Most Read of the Week widget-->
                @include('frontEnd.layout.read_week')


                <!-- start Economie section -->
                @include('frontEnd.layout.economie')


                <!-- start Society section -->
                @include('frontEnd.layout.society')


                <!-- for Most Read widget-->
                @include('frontEnd.layout.most_read')


                <!-- start Economie section -->
                @include('frontEnd.layout.follow')

            </div>
        </div>
    </div>

    @include('frontEnd.layout.footer')

