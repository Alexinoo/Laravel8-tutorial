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

    public function getSinglePostById($id)
    {
        $post = DB::table('posts')->where(['id' => $id])->first();

        return view('Post.single-post', compact('post'));
    }

    public function editPost($id)
    {
        $post = DB::table('posts')->where(['id' => $id])->first();

        return view('Post.edit-post', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        DB::table('posts')->where(['id' => $id])->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return back()->with('post_updated', 'Post has been updated successfully');
    }

    public function deletePost($id)
    {
        DB::table('posts')->where(['id' => $id])->delete();

        return back()->with('post_deleted', 'Post deleted successfully');
    }

    public function innerJoinClause()
    {
        $results =  DB::table('post_owners')
            ->join('posts', 'post_owners.id', '=', 'posts.owner_id')
            ->select('post_owners.name', 'posts.title', 'posts.body')
            ->get();
        return $results;
    }
}
