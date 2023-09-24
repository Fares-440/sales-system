<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'fares',
            'email' => 'fares@gmail.com',
            'password' =>  Hash::make('123456789'),
        ]);

        \App\Models\User::factory(10000)->create();
        $this->call([
            CountryTableSeeder::class
        ]);

        \App\Models\Supplier::factory(20)->create();
        \App\Models\CategoryType::factory(5)->create();
        \App\Models\Category::factory(20)->create();
    }
}
