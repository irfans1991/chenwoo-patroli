<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiMasuk extends Model
{
    use HasFactory;
    protected $table = "mutasi_masuks";
    protected $guarded = ['id'];
    protected $fillable = [
        'security',
        'type_mutasi',
        'supplier_name',
        'from',
        'supplier',
        'driver',
        'police',
        'total_items',
        'unit',
        'travel_permit',
        'remark',
        'nota'
    ];
}
