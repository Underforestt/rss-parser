<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function create(array $properties){
        Post::create([
            'title' => $properties['title'],
            'body' => $properties['body'],
            'pub_date' => $properties['pub_date'],
        ]);
    }


}
