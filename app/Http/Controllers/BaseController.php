<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('pages.main.index')->with('posts', Post::orderBy('updated_at', 'DESC')->limit(3)->get());
    }

    public function blog(){
        return view('pages.blog.index');
    }

    public function about(){
        return view('pages.main.about-us');
    }


}
