<?php

namespace Database\Seeders;



use App\Models\Employee;
use Illuminate\Database\Seeder;
use Database\Seeders\EmployeeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([EmployeeSeeder::class]);
    }
}
