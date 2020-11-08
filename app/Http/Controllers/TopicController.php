<?php
//php artisan make:controller TopicController
namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use App\Topic;
use App\Http\Resources\Topic as TopicResource;
use App\Http\Requests\TopicCreateRequest;

class TopicController extends Controller
{
    public function store(TopicCreateRequest $request) {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post = new Post;
        $post->body = $request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);

        // retun data using topic resources (json formatted)
        return new TopicResource($topic);
    }
}
