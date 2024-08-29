<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brgKeluar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'product_id',
        'nota_barang_id',
        'qty',
        'unit'
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function($model){
            if($model->getKey() ==  null){
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function notaBarang(){
        return $this->belongsTo(notaBarang::class);
    }
}
