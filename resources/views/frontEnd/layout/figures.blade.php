<div class="col-md-6 the_press_section mb-3">
    <div class="card card-body MyHover_blue">
        <div class="row card_title">
            <div class="col-6">
                <h4>{{ __('welcome.interview') }}</h4>
            </div>

            <div class="col-6 text-end btn_controller_slider">
                <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_Figures"
                        data-bs-slide="next"></i>
                </button>
                <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_Figures"
                        data-bs-slide="prev"></i>
                </button>
            </div>

        </div>

        @if ($chunk_Figures->count() > 0)
            <div id="carouselExampleControls_Figures" class="carousel slide" data-bs-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-inner repoerts_carousel">


                    @for ($x = 0; $x < $chunk_Figures->count(); $x++)
                        <div class="carousel-item">
                            <div class="row mt-2 card_small_reports">
                                @php
                                    $number = 0;
                                @endphp

                                @foreach ($chunk_Figures[$x] as $item)
                                    @php
                                        $number = ++$number;
                                    @endphp

                                    @if ($number == 1)
                                        <img src="{{ asset('/assets/images/' . $item->photo) }}"
                                            class="img-fluid" alt="">
                                        <div class="medium_text mt-2 mb-1"> <i
                                                class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}
                                        </div>
                                        <a href="{{ route('post.frontEnd', $item->id) }}">
                                            <h4>{{ $item->title }}</h4>
                                        </a>

                                        <p>
                                            @php
                                                $val = substr($item->body, 0, 100);
                                            @endphp

                                            {{ $val }} ....
                                        </p>
                                    @else
                                        <a class="row mt-3" href="{{ route('post.frontEnd', $item->id) }}">
                                            <div class="col-5">
                                                <div class="img_for_news"
                                                    style="background-image: url('assets/images/{{ $item->photo }}')">
                                                </div>

                                            </div>
                                            <div class="col-7">
                                                <div class="small_text mt-1"> <i
                                                        class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}
                                                </div>
                                                <h6>{{ $item->title }}</h6>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endfor




                </div>

            </div>
     
        @endif


    </div>
</div>
