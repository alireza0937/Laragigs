<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            "name"=> "Alireza",
            "email"=> "test@test.gmail.com"
        ]);
        Listing::factory(6)->create([
            "user_id"=> $user->id
        ]);

    }
}
