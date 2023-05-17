<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tickets;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('thisispassword')
        ]);

        Tickets::create([
            'name' => 'Festival',
            'qty' => '20',
            'price' => '1500000'
        ]);

        Tickets::create([
            'name' => 'Ultimate Experience',
            'qty' => '10',
            'price' => '11000000'
        ]);

        Tickets::create([
            'name' => 'Cat 8',
            'qty' => '100',
            'price' => '1000000'
        ]);
    }
}
