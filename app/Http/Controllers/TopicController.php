<?php
//php artisan make:controller TopicController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Topic;

class TopicController extends Controller
{
    public function store(Request $request) {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post = new Post;
        $post->body = $request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);
    }
}
