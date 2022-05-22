<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(StorePostRequest $request){
        $time = Carbon::now();
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'pub_date' => $time->toDateTimeString(),
        ]);
        return response()->json($post, 201);
    }

    public function find(Post $post){
        return response()->json($post);
    }

    public function update(StorePostRequest $request, Post $post){
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function delete(Post $post){
        $post->delete();
        return response()->json(null, 204);
    }
}
