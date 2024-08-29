<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'messages';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'title',
        'security',
        'message',
        'feedback'

    ];
}
