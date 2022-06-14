<div class="col-12 mt-4 pt-2 ">
    <div class="card card-body Opinion_section MyHover_blue">
        <div class="row card_title">
            <div class="col-6">
                <h4>{{ __('welcome.openioun') }}</h4>
            </div>
            <div class="col-6 text-end btn_controller_slider">
                <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_Opinion"
                        data-bs-slide="next"></i>
                </button>
                <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_Opinion"
                        data-bs-slide="prev"></i>
                </button>
            </div>
        </div>

        @if ($chunk_Opinion->count() > 0)
            <div id="carouselExampleControls_Opinion" class="carousel slide" data-bs-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-inner repoerts_carousel">


                    @for ($x = 0; $x < $chunk_Opinion->count(); $x++)
                        <div class="carousel-item">
                            <div class="row mt-3">

                                @foreach ($chunk_Opinion[$x] as $item)
                                    <a href="{{ route('post.frontEnd', $item->id) }}" class="col-md-4">
                                        <div class="mb-4">
                                            <div class="img_for_reports"
                                                style="background-image: url('assets/images/{{ $item->photo }}')">
                                            </div>

                                            <div class="date mb-2 mt-1 small_text">
                                                <i class="bi bi-clock"></i>
                                                <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</span>
                                            </div>
                                            <h6>{{ $item->title }}</h6>
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
</div>
