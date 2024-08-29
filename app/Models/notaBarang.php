<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notaBarang extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nota',
        'pembeli',
        'jenisPembeli',
        'pembuat',
        'penimbang',
        'disetujui',
        'foto',
        'checked_by'
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

    public function dataJenisBarangJualan($id){
        $jenisBarang = Product::join('brg_keluars', 'products.id', '=', 'brg_keluars.product_id')
        ->where('brg_keluars.nota_barang_id', $id)
        ->get();
        
        return $jenisBarang;
    }
}
