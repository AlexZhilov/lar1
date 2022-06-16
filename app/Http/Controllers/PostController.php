<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{

    public function index()
    {
//        $category = Category::find(2)->posts;
//        dd($category);

        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function view(Post $post)
    {
        return view('post.view', compact('post'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('tags', 'categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'text' => 'required|string',
//            'img' => 'string',
            'category_id' => 'integer',
            'tag' => 'array',
        ]);
//        dd($data);
        $tags = $data['tag'];
        unset($data['tag']);

        $post = Post::create($data);
        //добавляем теги к посту
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'integer',
            'tag' => 'array',
//            'img' => 'string',
        ]);
//        dd($data);
        $tags = $data['tag'];
        unset($data['tag']);

        $post->update($data);
        //добавляем теги к посту
        $post->tags()->sync($tags);

        return redirect()->route('post.view', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
