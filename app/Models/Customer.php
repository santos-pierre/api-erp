<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Customer extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ["name","birth_date", "email", "phone_number"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function commands()
    {
        return $this->hasMany(Command::class);
    }
}
