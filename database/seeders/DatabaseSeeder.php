<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Transport;
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
        $this->call([
            TransportSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
