@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Page Informaiton And Social</h3>
        <div class="row">
            <div class="col-md-8">
                <form class="form" method="POST" action="{{ route('backend.socials.create') }}" enctype="multipart/form-data"> 
                    @csrf
                    <input type="text" name="id" value="{{  is_object($post) ? $post->id : '' }}">
                    <div class="form-group">
                        <label for="site_title">Page Title</label>
                        <input type="text" class="form-control @error('site_title') is-invalid @enderror" value="{{  is_object($post) ? $post->site_title : '' }}" name="site_title">
                        @error('site_title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{  is_object($post) ? $post->email : '' }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{  is_object($post) ? $post->contact : '' }}" name="phone">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{  is_object($post) ? $post->address : '' }}" name="address">
                        @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{  is_object($post) ? $post->facebook : '' }}" name="facebook">
                        @error('facebook')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="youtube">Youtube</label>
                        <input type="text" class="form-control @error('youtube') is-invalid @enderror" value="{{  is_object($post) ? $post->youtube : '' }}" name="youtube">
                        @error('youtube')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{  is_object($post) ? $post->instagram : '' }}" name="instagram">
                        @error('instagram')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" value="{{  is_object($post) ? $post->twitter : '' }}" name="twitter">
                        @error('twitter')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="linked_in">Linked In</label>
                        <input type="text" class="form-control @error('linked_in') is-invalid @enderror" value="{{  is_object($post) ? $post->linked_in : '' }}" name="linked_in">
                        @error('linked_in')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">Whatsapp</label>
                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" value="{{  is_object($post) ? $post->whatsapp : '' }}" name="whatsapp">
                        @error('whatsapp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="line">Line</label>
                        <input type="text" class="form-control @error('line') is-invalid @enderror" value="{{  is_object($post) ? $post->line : '' }}" name="line">
                        @error('line')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="footer_text">Footer Text</label>
                        <input type="text" class="form-control @error('footer_text') is-invalid @enderror" value="{{  is_object($post) ? $post->footer_text : '' }}" name="footer_text">
                        @error('footer_text')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#btn-title').click(function(event){
            event.preventDefault();
            var title = $('#title').val();

            $.ajax({
                
            })
        });
    });
</script>
@endsection