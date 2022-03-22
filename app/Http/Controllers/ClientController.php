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
}