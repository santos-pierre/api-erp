<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CommandStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('command_statuses')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Unpaid',
        ]);
        DB::table('command_statuses')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Paid',
        ]);
        DB::table('command_statuses')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Delivery',
        ]);
        DB::table('command_statuses')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Done',
        ]);
        DB::table('command_statuses')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Pending',
        ]);
    }
}
