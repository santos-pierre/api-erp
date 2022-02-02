<?php

namespace Database\Seeders;

use App\Models\Address;
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
        \App\Models\Customer::factory()->has(Address::factory()->count(2), 'addresses')->count(5)->create();
    }
}
