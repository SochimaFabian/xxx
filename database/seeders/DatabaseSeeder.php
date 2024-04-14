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
        // \App\Models\User::factory(130)->create();
        // \App\Models\Post::factory(100)->create();
        // \App\Model\Post
        // \App\Models\Post::factory(1000)->create();
        \App\Models\Profile::factory(15)->create();
        \App\Models\Profile::factory(15)->create();
        \App\Models\Profile::factory(15)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Post::factory(10)->create();
    }
}
