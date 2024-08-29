<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\brgKeluar;
use App\Models\Product;

class productOutExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('brgKeluar._productOutExport', [
            'data' => $this->dataJenisBarangJualan(),
        ]);
    }

    public function dataJenisBarangJualan(){
        $jenisBarang = Product::join('brg_keluars', 'products.id', '=', 'brg_keluars.product_id')
        ->get();
        
        return $jenisBarang;
    }
}
