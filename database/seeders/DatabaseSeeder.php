<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\entreprise;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CategorieSeeder::class
        ]);


        //creating the first admin
        User::factory(1)->create();
        $admin = User::where('email', 'admin@gmail.com')->first();
        echo "the admin token is : " . $admin->createToken('admin')->plainTextToken;
    }
}
