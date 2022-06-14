<div class="col-12 the_press_section mb-3">
    <div class="card card-body MyHover_blue">
        <div class="row card_title">
            <div class="col-6">
                <h4>{{ __('welcome.Videos') }}</h4>
            </div>

            <div class="col-6 text-end btn_controller_slider">
                <button><i class="bi bi-chevron-right" data-bs-target="#carouselExampleControls_videos"
                        data-bs-slide="next"></i>
                </button>
                <button><i class="bi bi-chevron-left" data-bs-target="#carouselExampleControls_videos"
                        data-bs-slide="prev"></i>
                </button>
            </div>

        </div>

        @if ($chunk_vedios->count() > 0)
            <div id="carouselExampleControls_videos" class="carousel slide" data-bs-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-inner repoerts_carousel">


                    @for ($x = 0; $x < $chunk_vedios->count(); $x++)
                        <div class="carousel-item">
                            <div class="row mt-2 card_small_reports">

                                @foreach ($chunk_vedios[$x] as $item)
                                    <div class="col-md-6">

                                        <video controls class="my_box_img" style="height:200px; width:100%;">
                                            <source src="{{ asset('/assets/images/' . $item->video) }}"
                                                type="video/mp4">
                                        </video>

                                        <h6 class="mt-2">

                                            <a
                                                href="{{ route('video.frontEnd', $item->id) }}">{{ $item->title }}</a>
                                        </h6>
                                        <div class="date mb-1 mt-1 small_text">
                                            <i class="bi bi-clock"></i>
                                            <span>{{ $item->created_at }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
      
        @endif






    </div>

</div>
