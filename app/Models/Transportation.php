<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;
    protected $table = 'transportations';
    protected $guarded = ['id'];
    protected $fillable = [
        'transport',
        'name',
        'driver',
        'condition',
        'destination',
        'status',
        'security',
        'before_speedometer',
        'after_speedometer',
        'fuel',
    ];
}
