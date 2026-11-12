<?php

namespace Database\Seeders;

use App\Enums\MahallahGender;
use App\Enums\Role;
use App\Models\Mahallah;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with sample data. The Kulliyyah does not
     * provide real residence data, so everything here is for demonstration.
     */
    public function run(): void
    {
        $mahallahs = collect([
            ['name' => 'Mahallah Ali', 'code' => 'ALI', 'gender' => MahallahGender::Brothers],
            ['name' => 'Mahallah Bilal', 'code' => 'BIL', 'gender' => MahallahGender::Brothers],
            ['name' => 'Mahallah Zubair', 'code' => 'ZUB', 'gender' => MahallahGender::Brothers],
            ['name' => 'Mahallah Aminah', 'code' => 'AMI', 'gender' => MahallahGender::Sisters],
            ['name' => 'Mahallah Asiah', 'code' => 'ASI', 'gender' => MahallahGender::Sisters],
            ['name' => 'Mahallah Hafsa', 'code' => 'HAF', 'gender' => MahallahGender::Sisters],
        ])->map(fn (array $attributes) => Mahallah::create($attributes));

        // Demo accounts, one per role. All use the factory password "password".
        $aminah = $mahallahs->firstWhere('code', 'AMI');

        User::factory()->role(Role::Student, $aminah)->create([
            'name' => 'Demo Student',
            'email' => 'student@mymahallah.test',
        ]);

        User::factory()->role(Role::Staff, $aminah)->create([
            'name' => 'Demo Staff',
            'email' => 'staff@mymahallah.test',
        ]);

        User::factory()->role(Role::Officer)->create([
            'name' => 'Demo Officer',
            'email' => 'officer@mymahallah.test',
        ]);

        User::factory()->role(Role::SuperAdmin)->create([
            'name' => 'Demo Admin',
            'email' => 'admin@mymahallah.test',
        ]);
    }
}
