<?php

namespace Database\Seeders;
use App\Models;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 100; $i++) {
            Models\User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'profile_picture' => "http://gravatar.com/avatar/" . md5(strtolower(trim($faker->email))) .
                "?d=monsterid",
                'bio' => Str::random(100)
            ]);
        }
        for ($i=0; $i < 100; $i++) {
            Models\Post::create([
                'title' => $faker->title,
                'body' => Str::random(120),
                'category_id'=>rand(0,20),
                'user_id' => rand(0, 100)
            ]);
        }
        for ($i=0; $i < 20; $i++) {
            Models\Category::create([
                'name' => $faker->name,
                'user_id' => rand(0, 100)

            ]);
        }
        for ($i=0; $i < 100; $i++) {
            Models\Comment::create([
                'comment' => Str::random(50),
                'user_id' => rand(0, 100),
                'post_id' => rand(0, 100)

            ]);
        }
        for ($i=0; $i < 100; $i++) {
            Models\Like::create([
                'like' => rand(0,1),
                'user_id' => rand(0, 100),
                'post_id' => rand(0, 100)

            ]);
        }
        for ($i=0; $i < 100; $i++) {
            Models\Friend::create([
                'user_id_1' => rand(0,100),
                'user_id_2' => rand(0, 100)
            ]);
        }
    }
}
