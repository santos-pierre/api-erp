<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'num_commande' => $this->num_command,
            'customer' => new CustomerResource($this->customer),
            'status' => $this->status,
            'products' => ProductResource::collection($this->products),
            'command_price_TVA' => $this->get_command_price($this->products)->get('price_TVA'),
            'command_price_HTVA' => $this->get_command_price($this->products)->get('price_HTVA'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
            'deleted_at' => $this->deleted_at ? Carbon::parse($this->deleted_at)->format('d-m-Y') : null,
        ];
    }

    private function get_command_price($products)
    {
        $price_per_product = $products->map(function ($item) {
            return ['price_HTVA' =>  $item->pivot->unit_price * $item->pivot->quantity, "price_TVA" => price_TVA($item->pivot->unit_price, $item->pivot->TVA)* $item->pivot->quantity];
        });

        $command_price_TVA = $price_per_product->pluck('price_TVA')->sum();
        $command_price_HTVA = $price_per_product->pluck('price_HTVA')->sum();

        $command_price_array = collect([
            'price_HTVA' => $command_price_HTVA,
            'price_TVA' => $command_price_TVA
        ]);

        return $command_price_array;
    }
}
