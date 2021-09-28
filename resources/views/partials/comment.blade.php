<div class="col-md-12 col-xs-12" style="border: 0.5px solid #c2c2c2; border-radius:5px">
    <h3>{{ $comment->user->name }}</h3>
    <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
    <hr style="margin: 2px">
    <p>{{ $comment->comment }}</p>
    @if ($comment->user_id == session('user')->id)
        <form action="{{ route('comment.destroy', [$comment->id]) }}" method="POST" style="margin:0px">
            @csrf
            @method('DELETE')
            <input type="hidden" name="slug" value="{{ $slug }}">
            <button type="submit" class="btn btn-info" style="margin-bottom: 5px">Remove comment</button>
        </form>
    @endif
</div>
