<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::all();
        $categories = Category::pluck('title', 'id')->all();
        return view('admin.post.create', compact('tags', 'categories'));
    }
}
