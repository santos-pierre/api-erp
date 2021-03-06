<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Address extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ["street_name","street_number", "zip_code", "city_name", "country", "customer_id"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
