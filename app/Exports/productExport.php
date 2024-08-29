<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class productExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('product._productExport', [
            'product' => Product::all()
        ]);
    }
}
