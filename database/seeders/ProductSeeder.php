<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'num_product' => Uuid::uuid4(),
            'name' => 'Laravel Mug',
            'price' => 1000,
            'TVA' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'num_product' => Uuid::uuid4(),
            'name' => 'ReactJS Mug',
            'price' => 1000,
            'TVA' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'num_product' => Uuid::uuid4(),
            'name' => 'Svelte Mug',
            'price' => 1500,
            'TVA' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'num_product' => Uuid::uuid4(),
            'name' => 'Laravel T-Shirt',
            'price' => 3000,
            'TVA' => 21,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'num_product' => Uuid::uuid4(),
            'name' => 'ReactJS T-Shirt',
            'price' => 3000,
            'TVA' => 21,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'num_product' => Uuid::uuid4(),
            'name' => 'SVelte T-Shirt',
            'price' => 3000,
            'TVA' => 21,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
