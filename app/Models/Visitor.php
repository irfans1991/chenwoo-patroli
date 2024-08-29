<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table = "visitors";
    protected $guarded = ['id'];
    protected $fillable = [
        'document',
        'security',
        'email',
        'guest',
        'name',
        'idCard',
        'police',
        'company',
        'meet',
        'purpose',
        'info',
        'status',
        'photo',
    ];
}
