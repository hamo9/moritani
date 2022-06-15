<div class="card card-body pt-1 mb-3 MyHover_red">
    <div class="row card_post_title">
        <div class="col-6">
            <h4>{{ __('welcome.News') }}</h4>
        </div>

        <div class="col-6 text-end btn_controller_slider">
            <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_news"
                    data-bs-slide="next"></i>
            </button>
            <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_news"
                    data-bs-slide="prev"></i>
            </button>
        </div>

    </div>

    @if ($chunk_news->count() > 0)
        <div id="carouselExampleControls_news" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner repoerts_carousel">


                @for ($x = 0; $x < $chunk_news->count(); $x++)
                    <div class="carousel-item">
                        <div class="row mt-2 card_small_news">

                            @foreach ($chunk_news[$x] as $item)
                                <a href="{{ route('post.frontEnd', $item->id) }}" class="col-md-6 mt-4 text-dark">
                                    <div>
                                        <div class="date text-black-50 mb-1">
                                            <i class="bi bi-clock"></i>
                                            <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</span>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="img_for_news"
                                                style="background-image: url('assets/images/{{ $item->photo }}')">
                                            </div>

                                        </div>
                                        <div class="col-8">
                                            <h5>{{ $item->title }}</h5>
                                            <div class="desc">

                                                <p>{{ substr($item->body, 0, 140) }} ... </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endfor



            </div>

        </div>

    @endif

</div>
