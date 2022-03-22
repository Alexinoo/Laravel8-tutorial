<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function getAllPosts()
    {
        $url = 'https://jsonplaceholder.typicode.com/posts';

        $response = Http::get($url);

        return $response->json();
    }

    public function getPostById($id)
    {
        $url = 'https://jsonplaceholder.typicode.com/posts/' . $id;

        $post = Http::get($url);

        return $post->json();
    }

    public function addPost()
    {
        $url = 'https://jsonplaceholder.typicode.com/posts';

        // Pass as an associative array
        $post = Http::post($url, [
            'userId' => 9,
            'title' => "New Post title",
            'body' => "New Post Desc"
        ]);

        return $post->json();
    }


    public function updatePost()
    {
        $url = 'https://jsonplaceholder.typicode.com/posts/100';

        // Pass as an associative array
        $post = Http::put($url, [

            'title' => "Updated title",
            'body' => "Updated Desc"
        ]);

        return $post->json();
    }

    public function deletePost($id)
    {
        $url = 'https://jsonplaceholder.typicode.com/post/' . $id;

        // Pass as an associative array
        $post = Http::delete($url);

        return $post->json();
    }
}
