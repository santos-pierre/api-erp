<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandResource;
use App\Models\Command;
use App\Models\CommandStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateCommandController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = collect($request->all());

        if (!$data->keys()->contains('products') && !$data->keys()->contains('customer_id')) {
            return response()->json(['message' => "Wrong body"], 422);
        }

        $products = collect([]);
        collect($data->get('products'))->map(function ($item) use ($products) {
            $products->put($item['num_product'], ['quantity' => $item['quantity'], 'unit_price' => $item["unit_price"], 'TVA' => $item["TVA"]]);
        });

        $command_id = DB::transaction(function () use ($data, $products) {
            // Create Commands With the customer ID
            $newCommand = new Command([
                'customer_id' => $data->get("customer_id"),
                'status_id' => CommandStatus::defaultId()
            ]);

            $newCommand->save();
            // Attach all the products to the comand with their quantity and unit price
            $newCommand->products()->attach($products);

            return $newCommand->num_command;
        });

        if ($command_id) {
            return response()->json(new CommandResource(Command::find($command_id)));
        }

        return response()->json(['message' => "Something went wrong try later"], 422);
    }
}
