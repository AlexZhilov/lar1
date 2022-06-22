<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserRole;
use Database\Factories\UserFactory;
use Database\Factories\UserRoleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->posts();
        $this->users();
        $this->articles();


    }


    public function posts()
    {
        Category::factory(25)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(200)->create();

        foreach ($posts as $post){
            $tagsIds = $tags->random(random_int(1,5))->pluck('id');
            $post->tags()->attach($tagsIds);
        }
    }

    public function users()
    {
        User::factory()->create(UserFactory::createAdmin());
        foreach (UserRoleFactory::roles() as $id => $role){
            UserRole::factory()->create([
                'id' => $id,
                'title' => $role
            ]);
        }
        User::factory(5)->create();
    }

    public function articles()
    {
        ArticleCategory::factory(15)->create();
        Article::factory(100)->create();

    }
}
