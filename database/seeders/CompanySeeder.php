<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::insert([
            [
                'company_name' => 'Uzumaky',
                'logo' => 'logo.jpg',
                'country' => 'Colombia',
                'department' => 'Valle del Cauca',
                'city' => 'Cali',
                'company_type' => 'tipo A1.',
                'nit' => '15556684',
                'phone' => '316433314',
                'email' => 'jose97@gmail.com',
                'tax_amount' => '12.5',
                'tax_name' => 'monster',
                'currency' => 'Af',
                'address' => 'cl 95',
                'zip_code' => '35',
            ],

            // [
            //     'conutry' => 'USA',
            //     'company_type' => 'tipo A2.',
            //     'nit' => '15356684',
            //     'phone' => '316439314',
            //     'email' => 'juan9@gmail.com',
            //     'tax_amount' => '18.8',
            //     'tax_name' => 'phantom',
            //     'currency' => 'Af',
            //     'address' => 'cl 95',
            //     'code' => '356861',
            // ],
        ]);
        User::factory()->create([
            'name' => 'Admin1',
            'email' => 'admin@email.com',
            'company_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('admin');
    }
}
