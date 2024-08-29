<?php

namespace App\Exports;


use App\Models\notaBarang;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class notaBarangExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        $notaBarang = notaBarang::all();
        return view('brgKeluar._notaBarangKeluar', compact('notaBarang'));
    }
}
