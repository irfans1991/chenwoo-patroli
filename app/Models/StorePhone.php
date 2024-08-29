<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorePhone extends Model
{
    use HasFactory;
    protected $table = 'store_phones';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_phone',
        'name',
        'section',
        'smartphone',
        'number',
        'status',
    ];
}
