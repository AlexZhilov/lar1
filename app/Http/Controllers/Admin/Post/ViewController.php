<?php


namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Models\User;

class ViewController
{
    public function __invoke(Post $post)
    {
        return view('admin.post.view', compact('post'));
    }
}
