<div class="card card-body pt-1 sports_section MyHover_green">
    <div class="row card_title">
        <div class="col-6">
            <h4>{{ __('welcome.sport') }}</h4>
        </div>
        <div class="col-6 text-end btn_controller_slider">
            <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_sports"
                    data-bs-slide="next"></i>
            </button>
            <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_sports"
                    data-bs-slide="prev"></i>
            </button>
        </div>
    </div>

    @if ($chunk_sports->count() > 0)
        <div id="carouselExampleControls_sports" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner repoerts_carousel">


                @for ($x = 0; $x < $chunk_sports->count(); $x++)
                    <div class="carousel-item">
                        <div class="row mt-2 card_small_reports">
                            @php
                                $number = 0;
                            @endphp

                            @foreach ($chunk_sports[$x] as $item)
                                @php
                                    $number = ++$number;
                                @endphp

                                @if ($number == 1)
                                    <a href="{{ route('post.frontEnd', $item->id) }}"
                                        class="main_post_for_reports mb-3"
                                        style="background-image: url('assets/images/{{ $item->photo }}')">
                                        <div class="overray"></div>
                                        <div class="post_content">
                                            <h6 class="mb-4">
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</h6>
                                            <h3>
                                                @php
                                                    $val = substr($item->body, 0, 100);
                                                @endphp

                                                {{ $val }} ....
                                            </h3>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('post.frontEnd', $item->id) }}" class="col-6 col-md-4">
                                        <div class="img_for_reports"
                                            style="background-image: url('assets/images/{{ $item->photo }}')"></div>

                                        <div class="date mb-1 mt-1 small_text">
                                            <i class="bi bi-clock"></i>
                                            <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</span>
                                        </div>
                                        <h6>{{ $item->title }}</h6>
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
