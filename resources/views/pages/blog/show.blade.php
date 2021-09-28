@extends('layout')
@section('title') Home @endsection

@section('content')
    <section>
        <div class="container" style="padding:0px 20px">
            <div class="row">
                <div class="col-md-12 col-sm-12" style="padding:0rem 3rem; margin:0rem 2rem">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('errorMessage'))
                        <div class="alert alert-danger">
                            {{ session('errorMessage') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>{{ $post->title }}</h2>

            <p class="lead">
                <i class="fa fa-user"></i> {{ $post->user->name }} &nbsp;&nbsp;&nbsp;
                <i class="fa fa-calendar"></i> {{ date('jS M Y', strtotime($post->updated_at)) }} &nbsp;&nbsp;&nbsp;
                <!-- <i class="fa fa-eye"></i> 114 -->
            </p>

            <br>
            <img src="{{ asset('images/'. $post->image_path) }}" class="img-responsive" alt="{{ $post->title }}">

            <br><br>

            <p style="font-size:2rem; letter-spacing:1px">{{ $post->description }}</p>

            <br>
            <br>

            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <h4>Comments</h4>
                    @if ($post->comments->count() == 0)
                        <p>No comments found.</p>
                    @else
                        @foreach ($post->comments as $comment)
                            @include('partials.comment', [
                                'comment' => $comment,
                                'slug' => $post->slug
                            ])
                        @endforeach
                    @endif
                    <br>
                    @if (!session('user'))
                        <h4>Log in to leave a comment</h4>
                    @else
                        <h4>Leave a Comment</h4>
                        <form action="{{ route('comment.store') }}" method="POST" class="form">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="slug" value="{{ $post->slug }}">
                            <div class="form-group">
                                <label class="control-label">Message</label>

                                <textarea name="comment" class="form-control" rows="10" autocomplete="off"></textarea>
                            </div>

                            <button type="submit" class="section-btn btn btn-primary">Submit</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
