@extends('layout')
@section('title') Home @endsection

@section('content')
     <!-- HOME -->
     <section id="home">
        <div class="row">
             <div class="owl-carousel owl-theme home-slider">
                  <div class="item item-first">
                       <div class="caption">
                            <div class="container">
                                 <div class="col-md-6 col-sm-12">
                                      <h1>Now Is The Time For You To Know The Truth About Blog.</h1>
                                      <h3>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</h3>
                                      <a href="{{ route('post.index') }}" class="section-btn btn btn-default">Read Blog</a>
                                 </div>
                            </div>
                       </div>
                  </div>

                  <div class="item item-second">
                       <div class="caption">
                            <div class="container">
                                 <div class="col-md-6 col-sm-12">
                                      <h1>Five Common Myths About Blog.</h1>
                                      <h3>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</h3>
                                      <a href="{{ route('post.index') }}" class="section-btn btn btn-default">Read Blog</a>
                                 </div>
                            </div>
                       </div>
                  </div>

                  <div class="item item-third">
                       <div class="caption">
                            <div class="container">
                                 <div class="col-md-6 col-sm-12">
                                      <h1>Efficient Learning Methods</h1>
                                      <h3>Nam eget sapien vel nibh euismod vulputate in vel nibh. Quisque eu ex eu urna venenatis sollicitudin ut at libero.</h3>
                                      <a href="{{ route('post.index') }}" class="section-btn btn btn-default">Read Blog</a>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
   </section>

   <main>
        <section>
             <div class="container">
                  <div class="row">
                       <div class="col-md-12 col-sm-12">
                            <div class="text-center">
                                 <h2>About us</h2>

                                 <br>

                                 <p class="lead">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.

                                    Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.</p>
                            </div>
                       </div>
                  </div>
             </div>
        </section>
        <section>
             <div class="container">
                  <div class="row">
                       <div class="col-md-12 col-sm-12">
                            <div class="section-title text-center">
                                 <h2>Latest Blog posts</h2>
                            </div>
                       </div>

                       @foreach ($posts as $post)
                            @include('partials.blog-post', [
                                'post' => $post,
                            ])
                       @endforeach
                  </div>
             </div>
        </section>
   </main>

@endsection
