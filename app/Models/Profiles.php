<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'users_id',
        'tgl_lahir',
        'email',
        'alamat',
        'telp',
        'grub',
        'photo',
    ];

    public function users(){
        return $this->belongsTo(Users::class);
    }
}

