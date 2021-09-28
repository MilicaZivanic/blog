@extends('layout')
@section('title') Create a post @endsection

@section('content')
    <section style="padding: 30px">
        <div class="container">
            <div class="text-center">
                <h1>Create New Post</h1>

                <br>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if (session('errorMessage'))
                <div class="alert alert-danger">
                    {{ session('errorMessage') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <section style="padding: 20px">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="col-md-12 col-sm-12" >
                                <input type="text" class="form-control" style="padding: 3rem; margin: 2rem" value="{{ old('title') }}" placeholder="Title" name="title">
                                <span class="text-danger">@error('title'){{ $message }} @enderror</span>


                                <textarea class="form-control" style="padding: 3rem; margin: 2rem" rows="10" value="{{ old('description') }}" placeholder="Content" name="description"></textarea>
                                <span class="text-danger">@error('description'){{ $message }} @enderror</span>

                                <input type="file" name="image" style="padding: 3rem; margin: 2rem">
                                <span class="text-danger">@error('image'){{ $message }} @enderror</span>

                            </div>

                            <div class="col-md-4 col-sm-12">
                                <input type="submit" class="form-control" value="Submit" style="padding-bottom:4rem; padding-top:2rem; margin: 2rem">
                            </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
