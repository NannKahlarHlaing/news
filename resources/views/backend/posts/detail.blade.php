@extends('frontend.index')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex-center my-5">
            <div class="col-lg-9">
                <div class="row mb-5">
                    <div class="col-12">
                        <span class="d-none" id="id">{{ $post->id }}</span>
                        <h2>{{ $post->title }}</h2>
                    </div>
                    <div class="col-12 overflow-hidden">
                        <span class="category">
                            @if (app()->getLocale() == 'mm')
                                {{ $post->category->name_mm }}
                                @isset($post->sub_category_id)
                                    / {{$post->sub_category->name_mm }}
                                @endisset
                            @elseif(app()->getLocale() == 'ch')
                                {{ $post->category->name_ch }}
                                @isset($post->sub_category_id)
                                    / {{$post->sub_category->name_ch }}
                                @endisset
                            @elseif(app()->getLocale() == 'ta')
                                {{ $post->category->name_ta }}
                                @isset($post->sub_category_id)
                                    / {{$post->sub_category->name_ta }}
                                @endisset
                            @elseif(app()->getLocale() == 'en')
                                {{ $post->category->name_en }}
                                @isset($post->sub_category_id)
                                    / {{$post->sub_category->name_en }}
                                @endisset
                            @endif
                        </span>
                        <img src="/storage/images/original/{{ $post->img_link }}" alt="" width="100%" height="400px" style="object-fit: cover">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-2 social" id="social">
                        <div class="row text-center">
                            <div class="col-12">
                                <a href="mailto:?subject=Check%20out%20this%20awesome%20content&body=I%20thought%20you%20might%20find%20this%20interesting:%20{{ urlencode(url()->current()) }}" title="Share on Email"><i class="fa-regular fa-message"></i></a>
                            </div>

                            <div class="col-12">
                                <i class="fa-regular fa-eye" title="Views"></i>
                            </div>
                            <div class="col-12">
                                <div class=" border-bottom mb-2">
                                    <span id="views">{{ $post->views }}</span>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" title="Share on Facebook">
                                    <i class="fa-brands fa-square-facebook"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-2">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" target="_blank" rel="noopener" title="Share on Twitter">
                                    <i class="fa-brands fa-square-twitter"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-2">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" target="_blank" title="Share on LinkedIn">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-11 col-10">
                        <h6><span>{{ date('d F Y', strtotime($post->created_at)) }}</span></h6>
                        <p>
                            {!! $post->desc !!}
                        </p>
                        <div class="col-12 my-4 fw-bold fs-15"><strong>{{ __('language.topics') }}:</strong>
                            {{ $post->topic }}
                        </div>
                        <div class="col-12 mb-4 tags"><strong>{{ __('language.tags') }}:</strong>
                            @foreach ($post->tags as $tagId)
                                @php
                                    $tag = \App\Models\Tag::find($tagId);
                                @endphp
                                @if ($tag)
                                    @if (app()->getLocale() == 'mm')
                                        <span>{{ $tag->name_mm }}</span>
                                    @elseif (app()->getLocale() == 'ch')
                                        <span>{{ $tag->name_ch }}</span>
                                    @elseif (app()->getLocale() == 'ta')
                                        <span>{{ $tag->name_ta }}</span>
                                    @elseif(app()->getLocale() == 'en')
                                        <span>{{ $tag->name_en }}</span>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card p-2">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2 logo">
                                        <img src="{{ asset('images/logo.png') }}" alt="logo" width="100%">
                                    </div>
                                    <div class="col-md-10">
                                        <form class="form" action="" id="comment-form">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div>
                                                <p id="post_id_errors" class="text-danger"></p>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="user_type" id="anonymous" value="anonymous" checked>
                                                <label class="form-check-label" for="anonymous">{{ __('language.anonymous') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="user_type" id="visible" value="visible">
                                                <label class="form-check-label" for="visible">{{ __('language.visible') }}</label>
                                            </div>
                                            <div class="mb-3" id="user-details">
                                                <input type="text" class="me-3 mb-3 mb-lg-0" id="user_name" name="user_name" placeholder="Enter your name">
                                                <input type="email" id="user_email" name="user_email" placeholder="Enter your email">
                                                <div>
                                                    <p id="user_name_errors" class="text-danger"></p>
                                                </div>
                                                <div>
                                                    <p id="user_email_errors" class="text-danger"></p>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <textarea name="comment" id="comment-msg" class="comment" rows="3" width="100%"></textarea>
                                                <div>
                                                    <p id="comment_errors" class="text-danger"></p>
                                                </div>
                                            </div>
                                            <button class="btn btn-green" id="comment">{{ __('language.comment') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="comments">
                                <div class="row d-flex-center mt-3 mb-2">
                                    <div class="col-12">
                                        <h5 class="mt-2">{{ __('language.comment_lists') }}</h5>
                                    </div>
                                </div>
                                @foreach ($comments as $item)
                                    <div class="card p-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-9">
                                                <h6>
                                                    @if ($item->user_type == 'anonymous')
                                                        {{ __('language.anonymous') }}
                                                    @else
                                                        {{$item->name}}
                                                    @endif
                                                </h6>
                                                <p>{{ $item->comment }}</p>
                                            </div>
                                            <div class="col-md-3 text-md-end text-lg-end text-muted">
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row my-3  d-flex align-items-center">
                                <div class="col d-none d-md-block d-lg-block"></div>
                                <span class="text-center text-md-end text-lg-end col-12 col-md-5 col-lg-4">{{ __('language.your_thoughts') }}</span>
                                <div class="col-12 col-md-5 col-lg-4 text-center text-md-start text-lg-start">
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
            <div class="col-lg-3 related">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="border-bottom border-dark pb-1">{{ __('language.related_posts') }}</h3>
                    </div>
                    @foreach ($relatedPosts as $related)
                        <div class="col-md-12 py-1">
                            <h6>
                                @if (app()->getLocale() == 'mm')
                                    <a href="{{ url('/mm/category') . '/' . $related->category->url_slug . '/' . $related->id }}">{{ $related->title }}</a>
                                @elseif(app()->getLocale() == 'ch')
                                    <a href="{{ url('/ch/category') . '/' . $related->category->url_slug . '/' . $related->id }}">{{ $related->title }}</a>
                                @elseif(app()->getLocale() == 'ta')
                                    <a href="{{ url('/ta/category') . '/' . $related->category->url_slug . '/' . $related->id }}">{{ $related->title }}</a>
                                @elseif(app()->getLocale() == 'en')
                                    <a href="{{ url('/en/category') . '/' . $related->category->url_slug . '/' . $related->id }}">{{ $related->title }}</a>
                                @endif
                            </h6>
                        </div>
                    @endforeach
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

        $("input[name='user_type']").change(function() {
            if ($(this).val() === "visible") {
                $("#user-details").show();
            } else {
                $("#user-details").hide();
            }
        });

        if ($("input[name='user_type']:checked").val() === "visible") {
            $("#user-details").show();
        } else {
            $("#user-details").hide();
        }

        $('#comment-form').submit(function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            var user_type = $('input[name="user_type"]:checked').val();
            var user_name = $('input[name="user_name"]').val();
            var user_email = $('input[name="user_email"]').val();
            var comment = $('#comment-msg').val();
            if(comment === ''){
                $('#comment_errors').text('Comment is required.')
            }

            if(user_type === 'visible'){
                if(user_name === ''){
                    $('#user_name_errors').text('User Name is required.')
                }
                if(user_email === ''){
                    $('#user_email_errors').text('User Email is required.')
                }
            }
            $.ajax({
                url: '{{ route('comment') }}',
                type: 'GET',
                data: {'id' : '1','formData': formData},
                success: function (response){
                    console.log(response);
                    if(response.success){
                        location.reload();
                    }
                }
            })

        })

    });
</script>

@endsection
