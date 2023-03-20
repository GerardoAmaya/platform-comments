<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //Create 10 users
        $users = \App\Models\User::factory(10)
        ->hasComments(3)
        ->create();

        //Create 10 posts
        $comments = \App\Models\Comment::get();

        //Create 1-3 replies for each comment and assign a random user to each reply
        foreach ($comments as $comment) {
            \App\Models\Reply::factory(rand(1, 3))->create([
                'comment_id' => $comment->id,
                'user_id' => rand(1, 10)
            ]);
            
        }
    }
}
