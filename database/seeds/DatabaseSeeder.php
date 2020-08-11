<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subject;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Subject::create(['desc' => 'Reclamo']);
        Subject::create(['desc' => 'Solicitud']);
        Subject::create(['desc' => 'Queja']);

        User::create([
            'name' => 'Claudio',
            'email' => 'claudio@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
