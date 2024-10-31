<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class, CategorySeeder::class, CompanySeeder::class, WorldSeeder::class]);
        // User::factory(9)->create(); // Crea 9 usuarios
 

        // User::create([
        //     'name' => 'Jose Daniel Grijalba Osorio',
        //     'email' => 'jose.jdgo97@gmail.com',
        //     'email_verified_at' => now(),
        //     'company_id' => 1,
        //     'password' => bcrypt('123123123'),
        // ])->assignRole('superAdmin');

    }
}
