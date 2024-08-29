<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $guarder = ['id'];
    protected $fillable = [
            'name',
            'username',
            'password',
            'level'
        ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function profile() 
    {
        return $this->hasOne(Profiles::class);
    }
}
