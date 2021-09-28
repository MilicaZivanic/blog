@extends('layout')
@section('title') Contact @endsection

@section('content')
        <!-- CONTACT -->
        <section>
            <div class="container">
                 <div class="text-center">
                      <h1>Contact Us</h1>

                      <br>

                      <p class="lead">Contact us and we will get back to you as soon as we can.</p>
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

        <section id="contact">
            <div class="container">
                 <div class="row">

                      <div class="col-md-6 col-sm-12">
                           <form id="contact-form" role="form" action="{{ route('contact-us.send') }}" method="post">
                               @csrf
                                <div class="col-md-12 col-sm-12">
                                     <input type="text" class="form-control" placeholder="Enter full name" name="name" >
                                     <span class="text" style="color: white">@error('name'){{ $message }} @enderror</span>

                                     <input type="email" class="form-control" placeholder="Enter email address" name="email" >
                                     <span class="text" style="color: white">@error('email'){{ $message }} @enderror</span>

                                     <input type="text" class="form-control" placeholder="Enter Subject" name="subject" >

                                     <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" ></textarea>
                                     <span class="text" style="color: white">@error('message'){{ $message }} @enderror</span>

                                </div>

                                <div class="col-md-4 col-sm-12">
                                     <input type="submit" class="form-control" name="send message" value="Send Message">
                                </div>

                           </form>
                      </div>

                      <div class="col-md-6 col-sm-12">
                           <div class="contact-image">
                                <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="">
                           </div>
                      </div>

                 </div>
            </div>
       </section>
@endsection
