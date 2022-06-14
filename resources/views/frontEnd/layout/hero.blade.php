<div class="container main-container">
    <div class="hero mt-4">

        @if ($LastPosts->count() > 0)
            <div class="row p-md-0">

                @php
                    $number = 0;
                    $number2 = 0;

                @endphp

                @foreach ($LastPosts as $item)
                    @php
                        $number = ++$number;
                    @endphp

                    @if ($number == 1)
                        <a href="{{ route('post.frontEnd',$item->id) }}" class="col-md-6 p-md-0">
                            <div class="for_new_post"
                        style="background-image: url('assets/images/{{ $item->photo }}');">
                                <div class="overray"></div>
                                <div class="post_content">
                                    <h6 class="mb-4">{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</h6>
                                    <h3>
                                        {{ $item->title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach

                <div class="col-md-6">
                    <div class="row pt-2 pt-md-0 p-2 p-md-0">
                        @foreach ($LastPosts as $item)
                            @php
                                $number2 = ++$number2;
                            @endphp


                                    @if ($number2 > 1)
                                        <a href="{{ route('post.frontEnd',$item->id) }}" class="col-6 box_for_new_post_small">
                                            <div class="for_new_post_small"
                                            style="background-image: url('assets/images/{{ $item->photo }}');">
                                                <div class="overray"></div>
                                                <div class="post_content">
                                                    <p>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</p>
                                                    <h6>
                                                        {{ $item->title }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    @endif

                        @endforeach
                    </div>
                </div>
            </div>

        @endif
    </div>
</div>
