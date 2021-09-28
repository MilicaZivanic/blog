<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="courses-thumb courses-thumb-secondary">
        <div class="courses-top">
            <div class="courses-image">
                    <img src="{{ asset('images/'. $post->image_path) }}" class="img-responsive" alt="{{ $post->title }}">
            </div>
            <div class="courses-date">
                    <span title="Author"><i class="fa fa-user"></i> {{ $post->user->name }}</span>
                    <span title="Date"><i class="fa fa-calendar"></i> {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
                    <!--<span title="Views"><i class="fa fa-eye"></i> 114</span> -->
            </div>
        </div>

        <div class="courses-detail">
            <h3><a href="blog-post-details.html">{{ $post->title }}</a></h3>
        </div>

        <div class="courses-info">
            <a href="{{ route('post.show', [ $post->slug ]) }}" class="section-btn btn btn-primary btn-block">Read More</a>
        </div>
        @if(session('user') && (session('user')->id == $post->user_id || session('user')->role->title == 'admin'))
            <div style="display: flex; justify-content:space-around; align-items:center" >
                <span>
                    <a href="{{ route('post.edit', [$post->slug]) }}" class="section-btn btn btn-warning btn-block">Edit</a>
                </span>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="margin:0px">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="section-btn btn btn-danger btn-block">Delete</button>
                </form>
            </div>
        @endif
    </div>
</div>
