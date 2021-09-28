@extends('layout')
@section('title') My profile @endsection
@section('content')
    <section style="padding: 30px">
        <div class="container">
            <div class="text-center">
                <h1>My profile</h1>

                <br>

            </div>
        </div>
    </section>

    <div class="container" style="padding:0px  20px">
        <div class="row">
            <div class="col-md-12 col-sm-12" style="padding:3rem; margin:2rem">
                <h2 >{{ $user->name }} - {{ $user->role->title }}</h2>
                <hr>
                <p>Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }} </p>
                @if (session('user')->role->title != "user")
                    <p>Total posts: {{ $user->posts->count() }}</p>
                @endif
                <p>Total comments: {{ $user->comments->count() }} </p>
            </div>
        </div>
    </div>


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

    <section style="padding: 20px">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <form action="{{ route('my-profile-update') }}" method="POST">
                        @method('PUT')
                        @csrf
                            <div class="col-md-8 col-sm-12" >
                                <input type="text" class="form-control" style="padding: 3rem; margin: 2rem" value="{{ $user->name }}" placeholder="Enter new username" name="name">
                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>


                                <input type="password" style="padding: 3rem; margin: 2rem" class="form-control" name="password" placeholder="Enter new password">
                                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                            </div>

                            <div class="col-md-5 col-sm-12">
                                <input type="submit" class="form-control" value="Change profile" style="padding-bottom:4rem; padding-top:2rem; margin: 2rem">
                            </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
