<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'documents';
    protected $fillable = [
        'id',
        'security',
        'company',
        'address',
        'document_type',
        'sender',
        'receiver',
        'status',
    ];
}
