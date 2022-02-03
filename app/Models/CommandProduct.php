<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommandProduct extends Pivot
{
    protected $table= 'command_product';

    protected $fillable = ["num_command", 'num_product',"quantity","unit_price"];
}
