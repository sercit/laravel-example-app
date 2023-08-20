<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authorId = 1;

        Post::search('repudiandae')
            ->within('another_index_with_posts')
            ->where('author_id',  $authorId)
            ->paginate(15);

        return view('home');
    }
}
