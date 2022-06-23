<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    /**
     * Create Post
     * @param $data
     */
    public function store($data)
    {
        $tags = self::tags($data);

        $post = Post::create($data);
        //добавляем теги к посту
        $post->tags()->attach($tags);
        flash("Пост $post->id успешно добавлен");
//        session()->flash('flash', "Пост $post->id успешно добавлен");
    }

    /**
     * Update Post
     * @param $post
     * @param $data
     */
    public function update($post, $data)
    {
        $tags = self::tags($data);

        $post->update($data);
        //добавляем теги к посту
        $post->tags()->sync($tags);
        flash("Данные поста $post->id успешно обновлены");
//        session()->flash('flash', "Данные поста $post->id успешно обновлены");
    }

    /**
     * Add tags to post
     * @param $data
     * @return array|mixed
     */
    public static function tags(&$data)
    {
        $tags = [];

        if (isset($data['tag'])) {
            $tags = $data['tag'];
            unset($data['tag']);
        }

        return $tags;
    }

}
