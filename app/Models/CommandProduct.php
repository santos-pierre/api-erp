<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommandProduct extends Pivot
{
    protected $table= 'command_product';

    protected $fillable = ["num_command_id", 'num_product_id',"quantity","unit_price", "TVA"];
}
