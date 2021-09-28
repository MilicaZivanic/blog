@extends('layout')
@section('title') Register @endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
                <h4 style="text-align: center">Register</h4><hr>
                <form action="{{ route('register.store') }}" method="post" style="padding-bottom: 3rem">

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

                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter username" value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <button type="submit" class="btn btn-block" style="background-color: #252020; color:white">Sign Up</button>
                <br>
                <a href="{{ route('login') }}">I already have an account, sign in</a>
                </form>
        </div>
        </div>
    </div>
