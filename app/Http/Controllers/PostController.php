<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAllPosts()
    {

        $posts = DB::table('posts')->get();

        return view('Post.index', compact('posts'));
    }

    public function addPost()
    {
        return view('Post.create');
    }

    public function storePost(Request $request)
    {
        DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return back()->with('post_created', 'Post has been created successfully');
    }
}
