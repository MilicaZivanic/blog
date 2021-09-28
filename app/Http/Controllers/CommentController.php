<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'comment' => 'required',
        ]);

        DB::beginTransaction();
        try
        {

            Comment::create([
                'comment' => $request->input('comment'),
                'post_id' => $request->input('post_id'),
                'user_id' => $request->session()->get('user')->id
            ]);
            DB::commit();

            return redirect()->route('post.show', [$request->input('slug')])->with('success', 'Comment added successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('post.show', [$request->input('slug')])->with('errorMessage', 'An error occurred!');
        }
    }

    public function destroy(Request $request, $id){
        $comment = Comment::where('id', $id);
        $comment->delete();
        
        return redirect()->route('post.show', [$request->input('slug')])->with('success', 'Comment deleted successfully!');
    }
}
