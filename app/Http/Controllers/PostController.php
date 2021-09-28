<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['query'])){
            $search = ($_GET['query']);
            $posts = Post::where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->paginate(3);
            $posts->appends($request->all());
            return view('pages.blog.index')->with('posts', $posts);
        }
        return view('pages.blog.index')->with('posts', Post::orderBy('updated_at', 'DESC')->paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $image = Post::uploadImage($request->image);

        DB::beginTransaction();
        try
        {

            Post::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => $slug,
                'image_path' => $image,
                'user_id' => $request->session()->get('user')->id
            ]);
            DB::commit();

            return redirect()->route('post.index')->with('success', 'Post added successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('post.create')->with('errorMessage', 'An error occurred!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('pages.blog.show')->with('post', Post::with('comments')->with('user')->where('slug', $slug)->first());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('pages.blog.edit')->with('post', Post::where('slug', $slug)->first());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $slug)
    {

        try
        {
            $post = Post::where('slug', $slug)->first();
            $post->update($request->except('image_path'));

            if($request->has('image')){
                $image = Post::uploadImage($request->image);
                Post::deleteImage($post->image);
                $newImage = Post::uploadImage($request->image);
                $post->image_path = $newImage;
                $post->save();
            }

            DB::commit();

            return redirect()->route('post.index')->with('success', 'Product edited successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('post.edit', $slug)->with('errorMessage', 'An error occurred!');
        }
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Product deleted successfully!');
    }

    public function user_posts($id){
        return view('pages.users.user-posts')->with('posts', Post::where('user_id', $id)->get());
    }
}
