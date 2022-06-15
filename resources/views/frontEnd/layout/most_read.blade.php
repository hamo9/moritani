<div class="card mb-4 mt-4">
    <div class="card card-body MyHover_blue">
        <div class="row card_title mb-2">
            <div class="col-6">
                <h5 class="text-success">{{ __('welcome.more_reading') }}</h5>
            </div>

            <div class="col-6 text-end btn_controller_slider pb-2">
                <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_most"
                        data-bs-slide="next"></i>
                </button>
                <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_most"
                        data-bs-slide="prev"></i>
                </button>
            </div>
        </div>

        @if ($chunk_most_read->count() > 0)
            <div id="carouselExampleControls_most" class="carousel slide" data-bs-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-inner repoerts_carousel">


                    @php
                        $myNumber = 0;
                    @endphp
                    @for ($x = 0; $x < $chunk_most_read->count(); $x++)
                        <div class="carousel-item">
                            <div class="row col-12 m-auto">

                                @foreach ($chunk_most_read[$x] as $item)
                                    <a href="{{ route('post.frontEnd', $item->id) }}" class="text-dark row mb-2 mt-4">
                                        <div class="col-6 most_read_count">
                                            <div class="most_read_count_1">
                                                {{ $item->read_count }}
                                            </div>
                                            <div class="img_for_most_read"
                                                style="background-image: url('assets/images/{{ $item->photo }}')">
                                            </div>
                                        </div>
                                        <div class="col-6 p-0 myTitle">
                                            <p>{{ $item->title }}</p>
                                            <p class="small_text"><i
                                                    class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}
                                            </p>
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

{{-- ============================== --}}
