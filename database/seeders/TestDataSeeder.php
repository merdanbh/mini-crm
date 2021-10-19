<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()
            ->hasEmployees(3)
            ->count(150)
            ->create();
    }
}
