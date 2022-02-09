<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CommandStatus extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ["status_name"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public static function defaultId()
    {
        return DB::table('command_statuses')->where('name', 'Pending')->get('id')->pluck("id")->first();
    }
}
