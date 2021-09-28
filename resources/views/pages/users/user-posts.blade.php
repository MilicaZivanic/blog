@extends('layout')
@section('title') My Posts @endsection
    <section>
        <div class="container">
            <div class="text-center">
                <h1>My Posts</h1>

                <br>
            </div>
        </div>
    </section>
    <section class="section-background">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        @if (count($posts) == 0)
                            <section>
                                <div class="container">
                                    <div class="text-center">
                                        <h1>No blog posts published. Go and write some.</h1>

                                        <br>
                                    </div>
                                </div>
                            </section>
                        @endif
                        @foreach ($posts as $post)
                            @include('partials.blog-post', [
                                'post' => $post,
                            ])
                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('content')
@endsection
