<?php
//php artisan make:controller TopicController
namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use App\Topic;
use App\Http\Resources\Topic as TopicResource;
use App\Http\Requests\TopicCreateRequest;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    public function index() {
        //get all 
        //$topics = Topic::latestFirst()->get();
        // get 5 per page
        $topics = Topic::latestFirst()->paginate(5);
        return TopicResource::collection($topics);
    }

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

    public function show(Topic $topic) {
        return new TopicResource($topic);
    }

    public function update(UpdateTopicRequest $request, Topic $topic) {
       $topic->title = $request->get('title', $topic->title);
       $topic->save();
       return new TopicResource($topic);
    }
}
