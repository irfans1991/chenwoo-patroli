<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $table = "containers";
    protected $guarded = ['id'];
    protected $fillable = [
        'security',
        'driver',
        'police',
        'status_container',
        'company',
        'no_container',
        'no_seal',
        'type_container',
        'position',
        'volume',
        'before_temperature',
        'destination',
        'photo',
    ];
}
