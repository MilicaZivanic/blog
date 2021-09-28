@extends('layout')
@section('title') Home @endsection

@section('content')
        <section>
            <div class="container">
                <div class="text-center">
                    <h1>Blog posts</h1>

                    <br>

                    <p class="lead">Explore our blog and give us feedback through comments</p>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
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

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form">
                        <form action="" method="GET">
                            <div class="form-group">
                                <label class="control-label">Blog Search</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name="query">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="section-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            @foreach ($posts as $post)
                                @include('partials.blog-post', [
                                    'post' => $post,
                                ])
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="pagination-block">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
