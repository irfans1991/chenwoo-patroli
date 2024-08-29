<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $guarded = ['id'];
    protected $fillable = [
        'needs',
        'name',
        'section',
        'remark',
        'hrd',
        'status',
        'security',
        'departement',
    ];
}
