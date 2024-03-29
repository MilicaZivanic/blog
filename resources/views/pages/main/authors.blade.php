@extends('layout')
@section('title') Home @endsection

@section('content')
    <section>
        <div class="container">
            <div class="text-center">
                <h1>Team</h1>

                <br>

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
            </div>
        </div>
    </section>

    <section id="team" class="section-background">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                            <div class="team-image">
                                <img src="images/author-image-1-646x680.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="team-info">
                                <h3>John Doe</h3>
                                <span>CEO</span>
                            </div>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                            <div class="team-image">
                                <img src="images/author-image-2-646x680.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="team-info">
                                <h3>Jane Doe</h3>
                                <span>CTO</span>
                            </div>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-google"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                            <div class="team-image">
                                <img src="images/author-image-3-646x680.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="team-info">
                                <h3>Beky Fox</h3>
                                <span>Marketing Expert</span>
                            </div>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-envelope-o"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                            <div class="team-image">
                                <img src="images/author-image-4-646x680.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="team-info">
                                <h3>Daniel Smith</h3>
                                <span>Customer Support</span>
                            </div>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-google"></a></li>
                                <li><a href="#" class="fa fa-behance"></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
