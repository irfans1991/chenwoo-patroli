<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    use HasFactory;
    protected $table = 'smartphones';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_phone',
        'name',
        'section',
        'smartphone',
        'number',
    ];
}
