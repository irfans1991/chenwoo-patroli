<?php

namespace App\Exports;

use App\Models\Suppliers;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SupplierExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('supplier._exportSupplier',[
            'supplier' => Suppliers::all()
        ]);
    }
}
