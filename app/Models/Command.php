<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Command extends Model
{
    use HasFactory;

    protected $primaryKey = 'num_command';

    public $incrementing = false;

    protected $fillable = ["num_command", 'customer_id',"status_id"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function status()
    {
        return $this->belongsTo(CommandStatus::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'command_product', 'num_command_id', 'num_product_id')->using(CommandProduct::class)->withTimestamps();
    }
}
