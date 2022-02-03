<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'num_product';

    protected $fillable = ["num_product","name", "price", "TVA"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function commands()
    {
        return $this->belongsToMany(Command::class, 'command_product', 'num_product', 'num_command')->using(CommandProduct::class)->withTimestamps();
    }
}
