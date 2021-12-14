<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        $user = User::factory(5)->create();

        Post::factory(10)->create([

        ]);

        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // $post = Post::create([
        //     'title' => 'My Family Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
        //     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        //     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        //     nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        //     reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        //     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        //     mollit anim id est laborum.</p>'
        // ]);

        // $post = Post::create([
        //     'title' => 'My Work Post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
        //     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        //     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        //     nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        //     reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        //     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        //     mollit anim id est laborum.</p>'
        // ]);
    }
}
