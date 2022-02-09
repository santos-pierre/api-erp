<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\CommandStatus;
use App\Models\Customer;
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
        \App\Models\Customer::factory()->has(Address::factory()->count(2), 'addresses')->count(3)->create();
        $this->call([
            CommandStatusSeeder::class,
            ProductSeeder::class
        ]);
        \App\Models\Command::factory()->state([
            'customer_id' => Customer::all()->random()->first()->id,
            'status_id' => CommandStatus::all()->random()->first()->id
        ])->count(1)->create();

        $product = \App\Models\Product::all()->first();
        $command = \App\Models\Command::all()->first();
        $command->products()->attach($product, ['quantity' => 3, 'unit_price' => $product->price, 'TVA' => $product->TVA]);
    }
}
