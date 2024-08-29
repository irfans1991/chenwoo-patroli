<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'jenisBarang',
        'harga'
    ];

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if($model->getKey() == null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    public function brgKeluar(){
        return $this->hasMany(brgKeluar::class);
    }
}
