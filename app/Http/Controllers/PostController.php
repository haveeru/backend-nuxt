<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\Post as PostResource;
use App\Post;
use App\Topic;
//use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(StorePostRequest $request, Topic $topic)
    {
        $post = new Post();
        $post->body = $request->body;
        $post->user()->associate($request->user());

        // post will be saved to given post
        $topic->posts()->save($post);
        return new PostResource($post);
    }
}
