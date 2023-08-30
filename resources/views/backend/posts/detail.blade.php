@extends('frontend.index')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex-center my-5">
            <div class="col-md-3 related">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="border-bottom border-dark pb-1">Related Posts</h3>
                    </div>

                    @foreach ($relatedPosts as $related)
                        <div class="col-md-12 py-1">
                            <h6><a href="{{ url('/category') . '/' . $related->category->name_en . '/' . $related->id }}" >
                                @if (app()->getLocale() == 'mm')
                                    {{ $related->title_mm }}
                                @elseif(app()->getLocale() == 'ch')
                                    {{ $related->title_ch }}
                                @else
                                    {{ $related->title_en }}
                                @endif
                                </a></h6>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mb-5">
                    <div class="col-12">
                        <span class="d-none" id="id">{{ $post->id }}</span>
                        <span>{{ $post->category->name }}</span>
                        <h2>
                            @if (app()->getLocale() == 'mm')
                                {{ $post->title_mm }}
                            @elseif(app()->getLocale() == 'ch')
                                {{ $post->title_ch }}
                            @else
                            {{ $post->title_en }}
                            @endif
                        </h2>
                    </div>
                    <div class="col-12">
                        <img src="/storage/images/original/{{ $post->img_link }}" alt="" width="100%" height="400px" style="object-fit: cover">
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 social" id="social">
                        <div class="row text-center">
                            <div class="col-12">
                                <i class="fa-regular fa-message"></i>
                            </div>
                            <div class="col-12">
                                    <i class="fa-regular fa-eye"></i>
                            </div>
                            <div class="col-12">
                                <div class="btn border-bottom mb-2">
                                    <span id="views">{{ $post->views }}</span>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}">
                                    <i class="fa-brands fa-square-facebook"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-2">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" target="_blank" rel="noopener">
                                    <i class="fa-brands fa-square-twitter"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-2">
                                {{-- <script type="IN/Share" data-url="{{ URL::current() }}"><i class="fa-brands fa-linkedin-in"></i></script> --}}
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" target="_blank">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-11">
                        <h6>BY <a href="" class="tex-dark fw-bold me-3">The VWXYZ Online</a><span>{{ date('d F Y', strtotime($post->created_at)) }}</span></h6>
                        <p>
                            @if (app()->getLocale() == 'mm')
                                {!! str_replace("\n", '', $post->desc_mm) !!}
                            @elseif(app()->getLocale() == 'ch')
                                {!! str_replace("\n", '', $post->desc_ch) !!}
                            @else
                                {!! str_replace("\n", '', $post->desc_en) !!}
                            @endif
                        </p>
                        <div class="col-12 mb-4"><strong>Topics:</strong>
                            @if (app()->getLocale() == 'mm')
                                {{ $post->topic_mm }}
                            @elseif(app()->getLocale() == 'ch')
                                {{ $post->topic_ch }}
                            @else
                            {{ $post->topic_en }}
                            @endif
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card py-2">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2">
                                        <img src="" alt="logo" width="130px">
                                    </div>
                                    <div class="col-md-3">
                                        The VWXYZ Online
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4"><strong>Tags:</strong>
                            @foreach ($post->tags as $tagId)
                                @php
                                    $tag = \App\Models\Tag::find($tagId);
                                @endphp
                                @if ($tag)
                                    @if (app()->getLocale() == 'mm')
                                        {{ $tag->name_mm }}
                                    @elseif (app()->getLocale() == 'ch')
                                        {{ $tag->name_ch }}
                                    @else
                                        {{ $tag->name_en }}
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12">
                            <div class="row my-3  d-flex align-items-center">
                                <div class="col">
                                </div>
                                <span class="text-end col">YOUR THOUGHTS …</span>
                                <button class="btn btn-reaction mb-2" id="btn-like">
                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                </button>
                                <button class="btn btn-reaction mb-2" id="btn-love">
                                    <img src="{{ asset('/images/loved.svg') }}" alt="">
                                </button>
                                <button class="btn btn-reaction mb-2" id="btn-wow">
                                    <img src="{{ asset('/images/wow.svg') }}" alt="">
                                </button>
                                <button class="btn btn-reaction mb-2" id="btn-sad">
                                    <img src="{{ asset('/images/sad.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="YOUR_NONCE_VALUE"></script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>

<script>
    $(document).ready(function(){
        var value = $('#views').html();
        var id = $('#id').html();
        $.ajax({
            url: '{{ route('new_views_count') }}',
            method: 'GET',
            data: {value: value, id: id},
            success: function(response){
                $('#views').html(response);
            },
            error: function(xhr, status, error) {
                console.log('error' + error);
            }
        });

        var likedKey = `liked_${id}`;
        if (localStorage.getItem(likedKey)) {
            $('#btn-love').prop('disabled', true);
            $('#btn-wow').prop('disabled', true);
            $('#btn-sad').prop('disabled', true);
        }

        var lovedKey = `loved_${id}`;
        if (localStorage.getItem(lovedKey)) {
            $('#btn-like').prop('disabled', true);
            $('#btn-wow').prop('disabled', true);
            $('#btn-sad').prop('disabled', true);
        }
        var wowKey = `wow_${id}`;
        if (localStorage.getItem(wowKey)) {
            $('#btn-like').prop('disabled', true);
            $('#btn-love').prop('disabled', true);
            $('#btn-sad').prop('disabled', true);
        }
        var sadKey = `sad_${id}`;
        if (localStorage.getItem(sadKey)) {
            $('#btn-like').prop('disabled', true);
            $('#btn-love').prop('disabled', true);
            $('#btn-wow').prop('disabled', true);
        }

        $('#btn-like').click(function(){
            var likedKey =  `liked_${id}`;
            if (!localStorage.getItem(likedKey)) {
                $.ajax({
                    url: `/post/like/${id}`,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        document.cookie = `${likedKey}=true`;
                        localStorage.setItem(likedKey, 'true');

                        $('#btn-love').prop('disabled', true);
                        $('#btn-wow').prop('disabled', true);
                        $('#btn-sad').prop('disabled', true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error liking post:', error);
                    }
                });
            }

        });
        $('#btn-love').click(function(){
            var lovedKey =  `loved_${id}`;
            if (!localStorage.getItem(lovedKey)) {
                $.ajax({
                    url: `/post/love/${id}`,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        document.cookie = `${lovedKey}=true`;
                        localStorage.setItem(lovedKey, 'true');

                        $('#btn-like').prop('disabled', true);
                        $('#btn-wow').prop('disabled', true);
                        $('#btn-sad').prop('disabled', true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error liking post:', error);
                    }
                });
            }

        });

        $('#btn-wow').click(function(){
            var wowKey =  `wow_${id}`;
            if (!localStorage.getItem(wowKey)) {
                $.ajax({
                    url: `/post/wow/${id}`,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        document.cookie = `${wowKey}=true`;
                        localStorage.setItem(wowKey, 'true');

                        $('#btn-like').prop('disabled', true);
                        $('#btn-love').prop('disabled', true);
                        $('#btn-sad').prop('disabled', true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error liking post:', error);
                    }
                });
            }

        });

        $('#btn-sad').click(function(){
            var sadKey =  `sad_${id}`;
            if (!localStorage.getItem(sadKey)) {
                $.ajax({
                    url: `/post/sad/${id}`,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        document.cookie = `${sadKey}=true`;
                        localStorage.setItem(sadKey, 'true');

                        $('#btn-like').prop('disabled', true);
                        $('#btn-love').prop('disabled', true);
                        $('#btn-wow').prop('disabled', true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error liking post:', error);
                    }
                });
            }

        });

    });
</script>

@endsection
