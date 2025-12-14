<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creates 5 users
        $users = User::factory(5)->create();
        //cretes 10 posts
        $posts = Post::factory(10)->make()->each(function($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
        // creates 20 comments
        Comment::factory(20)->make()->each(function($comment) use ($posts, $users){
            $comment->post_id = $posts->random()->post_id;
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
