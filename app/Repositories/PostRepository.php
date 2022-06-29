<?php

namespace App\Repositories;

use App\Http\Filters\PostFilter;
use App\Models\Post;

class PostRepository
{
    public function all($data)
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        return Post::filter($filter)
                    ->with('category')
                    ->with('tags')
                    ->where(['visible' => 1])
                    ->published()
                    ->paginate(10);
    }
}