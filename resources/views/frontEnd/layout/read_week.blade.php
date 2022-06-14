<div class="card mb-4">
    <div class="card card-body MyHover_blue">
        <div class="row card_title mb-2">
            <div class="col-6">
                <h6>{{ __('welcome.Most Read Week') }}</h6>
            </div>

            <div class="col-6 text-end btn_controller_slider pb-2">
                <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_week"
                        data-bs-slide="next"></i>
                </button>
                <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_week"
                        data-bs-slide="prev"></i>
                </button>
            </div>
            <hr>

        </div>

        <div id="carouselExampleControls_week" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner repoerts_carousel">

                @if ($chunk_read_week->count() > 0)
                    @for ($x = 0; $x < $chunk_read_week->count(); $x++)

                        <div class="carousel-item">
                            <div class="row mt-2 card_small_reports">

                                @foreach ($chunk_read_week[$x] as $item)

                                    <a href="{{ route('post.frontEnd',$item->id) }}" class="row mb-2">
                                        <div class="col-6">
                                        <div class="img_for_most_read" style="background-image: url('assets/images/{{ $item->photo }}')"></div>
                                        </div>
                                        <div class="col-6 p-0">
                                        <p>{{ $item->title }}</p>
                                            <p class="small_text"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    @endfor
                @endif



            </div>

        </div>


    </div>
</div>

